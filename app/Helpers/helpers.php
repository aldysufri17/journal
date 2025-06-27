<?php

use Illuminate\Support\Facades\App;

if (!function_exists('currency')) {
    function currency($value)
    {
        $result = number_format($value, 0, ",", ".");
        return "Rp. " . $result;
    }
}

if (!function_exists('setProperty')) {
    function setProperty($data, $key)
    {
        $key = $key . (App::getLocale() == 'id' ? '' : '_' . app()->getLocale());
        return $data[$key];
    }
}

if (!function_exists('getRegulationIcon')) {
    function getRegulationIcon($type)
    {
        $type = strtolower($type);
        switch ($type) {
            case 'pdf':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e63946" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v15a2 2 0 0 1 -2 2h-2" /><path d="M17 17v.01" /><path d="M13 17v.01" /><path d="M9 17h-.01" /><path d="M9 13h.01" /><path d="M13 13v.01" /></svg>';
            case 'doc':
            case 'docx':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-doc" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4361ee" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>';
            case 'xls':
            case 'xlsx':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-xls" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4cc9f0" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2z" /><path d="M10 15l2 -3l2 3" /><path d="M10 12l2 3l2 -3" /></svg>';
            case 'ppt':
            case 'pptx':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-ppt" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f72585" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2z" /><circle cx="12" cy="14" r="3" /><path d="M10 18l-2 3l-2 -3" /></svg>';
            case 'txt':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-text" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4361ee" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 9h1" /><path d="M9 13h6" /><path d="M9 17h6" /></svg>';
            default:
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#666" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /></svg>';
        }
    }
}

if (!function_exists('getModulIcon')) {
    function getModulIcon($type)
    {
        $type = strtolower($type);

        switch ($type) {
            case 'pdf':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-pdf" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#e63946" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8v-3a2 2 0 0 1 2 -2h7l5 5v15a2 2 0 0 1 -2 2h-2" /><path d="M17 17v.01" /><path d="M13 17v.01" /><path d="M9 17h-.01" /><path d="M9 13h.01" /><path d="M13 13v.01" /></svg>';

            case 'doc':
            case 'docx':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-type-doc" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4361ee" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2z" /><path d="M9 12h6" /><path d="M9 16h6" /></svg>';

            case 'xls':
            case 'xlsx':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-spreadsheet" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#4CAF50" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 8h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2z" /><path d="M9 12v6" /><path d="M12 12v6" /><path d="M15 12v6" /><path d="M9 15h6" /></svg>';

            case 'url':
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#f77f00" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" /><path d="M3.6 9h16.8" /><path d="M3.6 15h16.8" /><path d="M12 3v18" /></svg>';

            default:
                return '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#666" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /></svg>';
        }
    }
}
