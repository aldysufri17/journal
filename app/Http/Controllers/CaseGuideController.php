<?php

namespace App\Http\Controllers;

use App\Models\CaseGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,jpg,jpeg,png|max:20480',
        ]);

        $folder = public_path('doc');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = 'doc/' . $fileName;

        $file->move(public_path('doc'), $fileName);

        CaseGuide::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'type' => $file->getClientOriginalExtension(),
        ]);

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

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,jpg,jpeg,png|max:20480',
        ]);

        $filePath = $case->file_path;
        $type = $case->type;

        if ($request->hasFile('file')) {
            if (File::exists(public_path($case->file_path))) {
                File::delete(public_path($case->file_path));
            }

            $folder = public_path('doc');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'doc/' . $fileName;
            $type = $file->getClientOriginalExtension();

            $file->move(public_path('doc'), $fileName);
        }

        $case->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
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
