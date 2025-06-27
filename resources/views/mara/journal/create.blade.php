@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Add Journal
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <form id="form-add-cat" action="{{ route('journals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

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
                                    name="ticket_ref_number" value="{{ old('ticket_ref_number') }}"
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
                                    placeholder="Deskripsikan masalah dari user...">{{ old('context_problem') }}</textarea>
                                @error('context_problem')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Steps Resolution -->
                            <div class="mb-3">
                                <label class="form-label">Langkah Penyelesaian</label>
                                <textarea name="steps_resolution"
                                    class="editor-tinymce form-control @error('steps_resolution') is-invalid @enderror"
                                    rows="5"
                                    placeholder="Catat langkah-langkah penyelesaian...">{{ old('steps_resolution') }}</textarea>
                                @error('steps_resolution')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Challenges -->
                            <div class="mb-3">
                                <label class="form-label">Hambatan / Kesulitan</label>
                                <textarea name="challenges"
                                    class="form-control @error('challenges') is-invalid @enderror" rows="3"
                                    placeholder="Apa kendala yang ditemui?">{{ old('challenges') }}</textarea>
                                @error('challenges')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Solutions -->
                            <div class="mb-3">
                                <label class="form-label">Solusi Alternatif</label>
                                <textarea name="solutions" class="form-control @error('solutions') is-invalid @enderror"
                                    rows="3"
                                    placeholder="Solusi tambahan jika gagal...">{{ old('solutions') }}</textarea>
                                @error('solutions')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Final Result -->
                            <div class="mb-3">
                                <label class="form-label">Hasil Akhir</label>
                                <textarea name="final_result"
                                    class="editor-tinymce form-control @error('final_result') is-invalid @enderror" rows="3"
                                    placeholder="Hasil akhir penanganan tiket">{{ old('final_result') }}</textarea>
                                @error('final_result')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Lessons Learned -->
                            <div class="mb-3">
                                <label class="form-label">Pelajaran & Tips</label>
                                <textarea name="lessons_learned"
                                    class="form-control @error('lessons_learned') is-invalid @enderror" rows="3"
                                    placeholder="Apa pelajarannya?">{{ old('lessons_learned') }}</textarea>
                                @error('lessons_learned')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label class="form-label">Status Akhir</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="success" {{ old('status') == 'success' ? 'selected' : '' }}>Berhasil
                                    </option>
                                    <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Gagal
                                    </option>
                                    <option value="partial" {{ old('status') == 'partial' ? 'selected' : '' }}>Sebagian
                                        Berhasil</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="card mt-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <a href="{{ route('journals.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary btn-submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
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
<script src="{{ asset('admin-theme/js/jquery.cropit.js') }}"></script>
<script>
    $(function () {
        var imageData = $('.image-editor').cropit({
            allowDragNDrop: false,
            $preview: $('.cropit-preview'),
            imageBackground: true,
            imageBackgroundBorderWidth: 15,
        });

        // var extension = getImageExtension(imageData);
        console.log('Ekstensi gambar:', extension);

        var price = $('#price');
        // ready
        var n1 = parseInt(price.val().replace(/\D/g, ''), 10);
        if (isNaN(n1)) {
            n1 = 0;
        }
        price.val(n1.toLocaleString(['ban', 'id']));

        // key up
        price.keyup(function (e) {
            var value = $(this).val();
            var n = parseInt(value.replace(/\D/g, ''), 10);
            if (isNaN(n)) {
                n = 0;
            }
            price.val(n.toLocaleString(['ban', 'id']));
        });
    });

    function getImageExtension(imageData) {
        // Jika menggunakan URL gambar
        // var extension = imageData.split('.').pop();

        // Jika menggunakan base64 gambar
        var extension = imageData.substring("data:image/".length, imageData.indexOf(";base64"));

        return extension;
    }

    function validateForm() {
        var imageData = $('.image-editor').cropit(
            'export', {
                type: 'image/jpeg',
                quality: 1,
                originalSize: true
            });
        $('.hidden-image-data').val(imageData);
    }
</script>
@endsection