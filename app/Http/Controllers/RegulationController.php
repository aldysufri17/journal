<?php

namespace App\Http\Controllers;

use App\Models\Regulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RegulationController extends Controller
{
    public function index()
    {
        $regulations = Regulation::latest()->paginate(12);
        return view('mara.regulation.index', compact('regulations'));
    }

    public function create()
    {
        return view('mara.regulation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,jpg,jpeg,png,doc,docx,ppt,pptx,xls,xlsx,txt|max:20480',
        ]);

        $file = $request->file('file');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Pastikan folder doc tersedia
        $folder = public_path('doc');
        if (!File::exists($folder)) {
            File::makeDirectory($folder, 0755, true);
        }

        // Simpan file
        $file->move($folder, $fileName);

        // Simpan ke database
        Regulation::create([
            'title' => $request->title,
            'file_path' => 'doc/' . $fileName,
            'type' => $file->getClientOriginalExtension(),
        ]);

        return redirect()->route('regulation.index')->with('success', 'Regulation berhasil diupload.');
    }

    public function edit($id)
    {
        $regulation = Regulation::findOrFail($id);
        return view('mara.regulation.update', compact('regulation'));
    }

    public function update(Request $request, $id)
    {
        $regulation = Regulation::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png,doc,docx,ppt,pptx,xls,xlsx,txt|max:20480',
        ]);

        $filePath = $regulation->file_path; // default sama jika tidak upload file baru

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if (File::exists(public_path($regulation->file_path))) {
                File::delete(public_path($regulation->file_path));
            }

            // Cek & buat folder jika diperlukan
            $folder = public_path('doc');
            if (!File::exists($folder)) {
                File::makeDirectory($folder, 0755, true);
            }

            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file baru
            $file->move($folder, $fileName);
            $filePath = 'doc/' . $fileName;
        }

        // Update data
        $regulation->update([
            'title' => $request->title,
            'file_path' => $filePath,
            'type' => $request->hasFile('file') ? $file->getClientOriginalExtension() : $regulation->type,
        ]);

        return redirect()->route('admin.regulation.index')->with('success', 'Regulation berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $regulation = Regulation::findOrFail($id);

        // Hapus file dari folder
        $filePath = public_path($regulation->file_path);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $regulation->delete();

        return back()->with('success', 'Regulation berhasil dihapus.');
    }
}
