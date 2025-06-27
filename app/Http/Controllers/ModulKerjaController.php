<?php

namespace App\Http\Controllers;

use App\Models\ModulKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ModulKerjaController extends Controller
{
    public function index()
    {
        $moduls = ModulKerja::latest()->paginate(12);
        return view('mara.modul.index', compact('moduls'));
    }

    public function create()
    {
        return view('mara.modul.create');
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

        ModulKerja::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'type' => $file->getClientOriginalExtension(),
        ]);

        return redirect()->route('modul.index')->with('success', 'Modul berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $modul = ModulKerja::findOrFail($id);
        return view('mara.modul.update', compact('modul'));
    }

    public function update(Request $request, $id)
    {
        $modul = ModulKerja::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx,txt,jpg,jpeg,png|max:20480',
        ]);

        $filePath = $modul->file_path;
        $type = $modul->type;

        if ($request->hasFile('file')) {
            if (File::exists(public_path($modul->file_path))) {
                File::delete(public_path($modul->file_path));
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

        $modul->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'type' => $type,
        ]);

        return redirect()->route('modul.index')->with('success', 'Modul berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $modul = ModulKerja::findOrFail($id);

        if (File::exists(public_path($modul->file_path))) {
            File::delete(public_path($modul->file_path));
        }

        $modul->delete();

        return back()->with('success', 'Modul berhasil dihapus.');
    }
}
