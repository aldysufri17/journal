<?php

namespace App\Http\Controllers;

use App\Models\CaseGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class CaseGuideController extends Controller
{
    public function index()
    {
        $cases = CaseGuide::latest()->paginate(12);
        return view('mara.case-guide.index', compact('cases'));
    }

    public function create()
    {
        return view('mara.case-guide.create');
    }

    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,jpg,jpeg,png',
                'max:20480', // 20MB
                Rule::requiredIf(fn() => !$request->url),
            ],
            'url' => [
                'nullable',
                'url',
                Rule::requiredIf(fn() => !$request->hasFile('file')),
            ],
        ]);

        $caseGuideData = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => null,
            'file_path' => null,
            'url' => null,
        ];

        // Jika upload file
        if ($request->hasFile('file')) {
            $folder = public_path('doc');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'doc/' . $fileName;

            $file->move(public_path('doc'), $fileName);

            $caseGuideData['file_path'] = $filePath;
            $caseGuideData['type'] = $file->getClientOriginalExtension();
        }

        // Jika input URL
        if ($request->filled('url')) {
            $caseGuideData['url'] = $request->url;
            $caseGuideData['type'] = 'url';
        }

        CaseGuide::create($caseGuideData);

        return redirect()->route('case-guide.index')->with('success', 'Panduan Kasus berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $case = CaseGuide::findOrFail($id);
        return view('mara.case-guide.update', compact('case'));
    }

    public function update(Request $request, $id)
    {
        $case = CaseGuide::findOrFail($id);

        // Validasi: hanya boleh salah satu antara file atau url
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,jpg,jpeg,png',
                'max:20480',
                Rule::requiredIf(fn() => $request->filled('url')),
            ],
            'url' => [
                'nullable',
                'url',
                Rule::requiredIf(fn() => $request->hasFile('file')),
            ],
        ]);

        // Simpan path dan type awal (akan diganti jika ada file/url baru)
        $filePath = $case->file_path;
        $type = $case->type;
        $url = $case->url;

        // Jika upload file baru
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($case->file_path && File::exists(public_path($case->file_path))) {
                File::delete(public_path($case->file_path));
            }

            // Buat folder jika belum ada
            $folder = public_path('doc');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            // Simpan file baru
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'doc/' . $fileName;
            $type = $file->getClientOriginalExtension();

            $file->move(public_path('doc'), $fileName);

            // Reset URL karena pilih file
            $url = null;
        }

        // Jika input URL baru
        if ($request->filled('url')) {
            // Hapus file lama jika ada
            if ($case->file_path && File::exists(public_path($case->file_path))) {
                File::delete(public_path($case->file_path));
            }

            // Simpan URL dan set type sebagai 'url'
            $url = $request->url;
            $filePath = null;
            $type = 'url';
        }

        // Update data
        $case->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'url' => $url,
            'type' => $type,
        ]);

        return redirect()->route('case-guide.index')->with('success', 'Panduan Kasus berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $case = CaseGuide::findOrFail($id);

        if (File::exists(public_path($case->file_path))) {
            File::delete(public_path($case->file_path));
        }

        $case->delete();

        return back()->with('success', 'Panduan Kasus berhasil dihapus.');
    }
}
