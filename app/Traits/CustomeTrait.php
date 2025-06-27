<?php

namespace App\Traits;

use App\Models\PageColumn;
use App\Models\PageSection;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait CustomeTrait
{
    public function storePageColumns($data, $idSection = false)
    {
        try {

            DB::beginTransaction();
            if ($idSection) {
                PageColumn::where('section_id', $idSection)->delete();
            }

            $data['id_attribute'] = isset($data['id_attribute']) ? Str::slug($data['id_attribute']) : null;

            $pageSection                    = PageSection::with('page')->find($data['section_id']);
            $pageSection->name              = $data['name'];
            $pageSection->type_section      = $data['type_section'];
            $pageSection->id_attribute      = $data['id_attribute'];
            $pageSection->class_attribute   = isset($data['class_attribute']) ? json_encode($data['class_attribute']) : null;

            $classAtribute = isset($data['class_attribute']) ? $data['class_attribute'] : [];
            array_push($classAtribute, $pageSection->type_section);

            $htmlContent    = [];
            foreach ($data['with_size'] as $keyParent => $size) {
                $classParent        = isset($data['class_col'][$keyParent]) ? $data['class_col'][$keyParent] : [];

                $contentParent      = [
                    'ind' => isset($data['content'][$keyParent]) ? $data['content'][$keyParent] : null,
                    'en'  => isset($data['content_en'][$keyParent]) ? $data['content_en'][$keyParent] : null,
                    'mdr' => isset($data['content_ch'][$keyParent]) ? $data['content_ch'][$keyParent] : null,
                    'arb' => isset($data['content_ar'][$keyParent]) ? $data['content_ar'][$keyParent] : null,
                ];

                $col = is_null($size) || ($size == 0) ? 'col' : 'col-' . $size;
                $mergeArr = array_push($classParent, $col);
                $classColParent = implode(' ', $classParent);

                $columnParent = [
                    'section_id'    => $pageSection->id,
                    'col_size'      => $size,
                    'content'       => $contentParent['ind'],
                    'content_en'    => $contentParent['en'],
                    'content_ch'   => $contentParent['mdr'],
                    'content_ar'   => $contentParent['arb'],
                    'class_attribute' => isset($data['class_col'][$keyParent]) ? json_encode($data['class_col'][$keyParent]) : null
                ];

                $parent = PageColumn::create($columnParent);

                $htmlChild      = [];
                if (isset($data['with_size_child'][$keyParent])) {
                    foreach ($data['with_size_child'][$keyParent] as $keyChild => $child) {
                        foreach ($child as $size) {
                            $classChild        = isset($data['class_col_child'][$keyParent][$keyChild]) ? $data['class_col_child'][$keyParent][$keyChild] : [];
                            $contentChild      = [
                                'ind'   => isset($data['content_child'][$keyParent][$keyChild]) ? $data['content_child'][$keyParent][$keyChild] : null,
                                'en'    => isset($data['content_child_en'][$keyParent][$keyChild]) ? $data['content_child_en'][$keyParent][$keyChild] : null,
                                'mdr'   =>  isset($data['content_child_ch'][$keyParent][$keyChild]) ? $data['content_child_ch'][$keyParent][$keyChild] : null,
                                'arb'   =>  isset($data['content_child_ar'][$keyParent][$keyChild]) ? $data['content_child_ar'][$keyParent][$keyChild] : null,
                            ];

                            // Impode Class
                            $col = is_null($size) || ($size == 0) ? 'col' : 'col-' . $size;
                            $mergeArr = array_push($classChild, $col);
                            $classColChild = implode(' ', $classChild);

                            foreach ($this->language as $lang) {
                                $html =
                                    '<div class="' . $classColChild . '">' .
                                    $contentChild[$lang] .
                                    '</div>';

                                $htmlChild[$lang][] = $html;
                            }

                            $columnChild = [
                                'parent_id'     => $parent->id,
                                'section_id'    => $pageSection->id,
                                'col_size'      => $size,
                                'content'       => $contentChild['ind'],
                                'content_en'    => $contentChild['en'],
                                'content_ch'   => $contentChild['mdr'],
                                'content_ar'   => $contentChild['arb'],
                                'class_attribute' => isset($data['class_col_child'][$keyParent][$keyChild]) ? json_encode($data['class_col_child'][$keyParent][$keyChild]) : null
                            ];

                            $child = PageColumn::create($columnChild);
                        }
                    }
                }

                foreach ($this->language as $lang) {
                    $childItems = count($htmlChild) >= 1 ? $htmlChild[$lang] : [];
                    $html =
                        '<div class="' . $classColParent . '">' .
                        $contentParent[$lang] .
                        '<div class="row">' .
                        implode($childItems) .
                        '</div>' .
                        '</div>';

                    $htmlContent[$lang][] = $html;
                }
            }

            $contentFinal = [];
            foreach ($this->language as $lang) {
                $content =
                    '<div id="content">' .
                    '<div class="' .
                    implode(' ', $classAtribute) . ' ' . $lang . '" id="' . $data['id_attribute'] . '">' .
                    '<div class="row">' .
                    implode($htmlContent[$lang]) .
                    '</div>' .
                    '</div>' .
                    '</div>';

                $contentFinal[$lang] = $content;
            }

            $pageSection->content      = $contentFinal['ind'];
            $pageSection->content_en   = $contentFinal['en'];
            $pageSection->content_ch  = $contentFinal['mdr'];
            $pageSection->content_ar  = $contentFinal['arb'];
            $pageSection->save();

            DB::commit();
            return [
                'status' => true,
                'data'   => $pageSection
            ];
        } catch (\Throwable $e) {
            DB::rollBack();

            return [
                'status' => false,
                'data'   => $e->getMessage()
            ];
        }
    }
}
