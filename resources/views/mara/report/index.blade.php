@extends('layouts.admin.main')
@section('content')

<!-- Meta CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <!-- Card Report -->
            <div class="card shadow-sm border rounded">
                <div class="card-body text-center">
                    <img src="{{ asset('screenshots/screenshot.png') }}" alt="Screenshot Report" id="report-screenshot"
                        class="img-fluid border rounded shadow-sm" style="max-height: 600px;">
                </div>
                {{-- <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm" onclick="openUploadModal()">Ganti Screenshot</button>
                </div> --}}
            </div>

        </div>
    </div>
</div>

<!-- Modal Upload -->
<div class="modal fade" id="uploadScreenshotModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="uploadForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="image" class="form-label">Pilih Screenshot Baru</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Untuk validasi CSRF di AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function openUploadModal() {
        $('#uploadScreenshotModal').modal('show');
    }

    $(document).ready(function () {
        $('#uploadForm').on('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this); // Ambil semua input dari form

            $.ajax({
                url: '{{ route("report.update-screenshot") }}',
                method: 'POST',
                formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        const timestamp = new Date().getTime();
                        $('#report-screenshot').attr('src',
                            '{{ asset("screenshots/screenshot.png") }}?v=' + timestamp);
                        $('#uploadScreenshotModal').modal('hide');
                        alert('Screenshot berhasil diperbarui.');
                    } else {
                        alert(response.message || 'Gagal mengganti screenshot.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    alert(
                        'Terjadi kesalahan saat mengunggah gambar.\nLihat console untuk detail.');
                }
            });
        });
    });
</script>
@endsection