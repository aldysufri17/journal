@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Edit Panduan Kasus</h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('case-guide.update', $case->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit</h3>
                        </div>
                        <div class="card-body">

                            <!-- Title -->
                            <div class="mb-3">
                                <label class="form-label">Judul Panduan</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $case->title) }}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Deskripsi (Opsional)</label>
                                <textarea name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    rows="3">{{ old('description', $case->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Current File or URL -->
                            <div class="mb-3">
                                <label class="form-label">File/URL Saat Ini</label><br>
                                @if ($case->type === 'url')
                                <a href="{{ $case->url }}" target="_blank">
                                    {{ $case->title }} (Link Eksternal)
                                </a>
                                @else
                                <a href="{{ asset($case->file_path) }}" target="_blank">
                                    {{ $case->title }} ({{ strtoupper($case->type) }})
                                </a>
                                @endif
                            </div>

                            <!-- New File Upload or URL Input -->
                            <div class="mb-3">
                                <label class="form-label">Ganti dengan File atau URL</label>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <input type="file" name="file" id="editFileInput"
                                            class="form-control @error('file') is-invalid @enderror @error('url') is-invalid @enderror">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="url" name="url" id="editUrlInput"
                                            class="form-control @error('file') is-invalid @enderror @error('url') is-invalid @enderror"
                                            placeholder="https://example.com/file.pdf " value="{{ old('url') }}">
                                    </div>
                                </div>
                                <small class="text-muted d-block mt-1">Pilih salah satu: upload file atau masukkan URL
                                    eksternal.</small>
                                @error('file')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                @error('url')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('case-guide.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('editFileInput');
        const urlInput = document.getElementById('editUrlInput');

        if (fileInput && urlInput) {
            fileInput.addEventListener('change', function () {
                if (fileInput.files.length > 0) {
                    urlInput.disabled = true;
                } else {
                    urlInput.disabled = false;
                }
            });

            urlInput.addEventListener('input', function () {
                if (urlInput.value.trim() !== '') {
                    fileInput.disabled = true;
                } else {
                    fileInput.disabled = false;
                }
            });
        }
    });
</script>
@endsection