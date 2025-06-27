<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    public function index()
    {
        return view('mara.report.index');
    }

    public function updateScreenshot(Request $request)
    {
        try {
            // Validasi file upload
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Pastikan folder screenshots tersedia
            $folder = public_path('screenshots');
            if (!File::exists($folder)) {
                if (!File::makeDirectory($folder, 0755, true)) {
                    throw new \Exception("Gagal membuat folder: $folder");
                }
            }

            // Hapus file lama jika ada
            $oldFilePath = public_path('screenshots/screenshot.png');
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }

            // Ambil file dari request
            $file = $request->file('image');

            // Pindahkan ke folder tujuan
            $file->move($folder, 'screenshot.png');

            return response()->json([
                'success' => true,
                'message' => 'File berhasil diupload.'
            ]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error("Error Upload Screenshot: " . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}