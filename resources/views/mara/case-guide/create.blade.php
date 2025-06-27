@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Tambah Panduan Kasus</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('case-guide.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah</h3>
                        </div>
                        <div class="card-body">

                            <!-- Title -->
                            <div class="mb-3">
                                <label class="form-label">Judul Panduan</label>
                                <input type="text"
                                    name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') }}"
                                    placeholder="Masukkan judul panduan">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Deskripsi (Opsional)</label>
                                <textarea name="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          rows="3"
                                          placeholder="Tambahkan deskripsi jika perlu...">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File Upload -->
                            <div class="mb-3">
                                <label class="form-label">File Modul</label>
                                <input type="file"
                                        name="file"
                                        class="form-control @error('file') is-invalid @enderror"
                                        required>
                                @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('case-guide.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Modul</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection