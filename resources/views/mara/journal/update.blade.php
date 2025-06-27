@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Edit Journal
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <form action="{{ route('journals.update', $journal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Data Jurnal Tiket</h3>
                        </div>
                        <div class="card-body">

                            <!-- Ticket Reference Number -->
                            <div class="mb-3">
                                <label class="form-label">Nomor Referensi Tiket</label>
                                <input type="text" class="form-control @error('ticket_ref_number') is-invalid @enderror"
                                    name="ticket_ref_number"
                                    value="{{ old('ticket_ref_number', $journal->ticket_ref_number) }}"
                                    placeholder="Masukkan nomor tiket" autocomplete="off">
                                @error('ticket_ref_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Context of Problem -->
                            <div class="mb-3">
                                <label class="form-label">Konteks Masalah</label>
                                <textarea name="context_problem"
                                    class="form-control @error('context_problem') is-invalid @enderror" rows="3"
                                    placeholder="Deskripsikan masalah dari user...">{{ old('context_problem', $journal->context_problem) }}</textarea>
                                @error('context_problem')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Steps Resolution -->
                            <div class="mb-3">
                                <label class="form-label">Langkah Penyelesaian</label>
                                <textarea name="steps_resolution"
                                    class="editor-tinymce form-control @error('steps_resolution') is-invalid @enderror" rows="5"
                                    placeholder="Catat langkah-langkah penyelesaian...">{{ old('steps_resolution', $journal->steps_resolution) }}</textarea>
                                @error('steps_resolution')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Challenges -->
                            <div class="mb-3">
                                <label class="form-label">Hambatan / Kesulitan</label>
                                <textarea name="challenges"
                                    class="form-control @error('challenges') is-invalid @enderror" rows="3"
                                    placeholder="Apa kendala yang ditemui?">{{ old('challenges', $journal->challenges) }}</textarea>
                                @error('challenges')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Solutions -->
                            <div class="mb-3">
                                <label class="form-label">Solusi Alternatif</label>
                                <textarea name="solutions" class="form-control @error('solutions') is-invalid @enderror"
                                    rows="3"
                                    placeholder="Solusi tambahan jika gagal...">{{ old('solutions', $journal->solutions) }}</textarea>
                                @error('solutions')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Final Result -->
                            <div class="mb-3">
                                <label class="form-label">Hasil Akhir</label>
                                <textarea name="final_result"
                                    class="editor-tinymce form-control @error('final_result') is-invalid @enderror" rows="3"
                                    placeholder="Hasil akhir penanganan tiket">{{ old('final_result', $journal->final_result) }}</textarea>
                                @error('final_result')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Lessons Learned -->
                            <div class="mb-3">
                                <label class="form-label">Pelajaran & Tips</label>
                                <textarea name="lessons_learned"
                                    class="form-control @error('lessons_learned') is-invalid @enderror" rows="3"
                                    placeholder="Apa pelajarannya?">{{ old('lessons_learned', $journal->lessons_learned) }}</textarea>
                                @error('lessons_learned')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label class="form-label">Status Akhir</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="success"
                                        {{ old('status', $journal->status) == 'success' ? 'selected' : '' }}>
                                        Berhasil</option>
                                    <option value="failed"
                                        {{ old('status', $journal->status) == 'failed' ? 'selected' : '' }}>Gagal
                                    </option>
                                    <option value="partial"
                                        {{ old('status', $journal->status) == 'partial' ? 'selected' : '' }}>
                                        Sebagian Berhasil</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('journals.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('styles')
<style>
    .cropit-preview {
        width: 300px;
        height: 200px;
        margin: auto;
        margin-top: 10px;
        margin-bottom: 10px;
        cursor: move;
        border: 1px solid #ccc;
        border-radius: 3px;
        background-color: #f8f8f8;
        background-size: cover;
    }

    .cropit-preview img {
        max-width: none;
    }

    .cropit-preview-background {
        opacity: .2;
        cursor: auto;
    }

    .image-size-label {
        margin-top: 0.6rem;
    }

    .cropit-image-input {
        /* Use relative position to prevent from being covered by image background */
        position: relative;
        z-index: 10;
    }
</style>
@endsection
@section('scripts')
@endsection