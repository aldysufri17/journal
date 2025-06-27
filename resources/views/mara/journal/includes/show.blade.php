@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Career Detail
                </h2>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-fluid">
        <div class="row row-cards">
            <div class="col-12">
                <div class="container">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">

                            <table class="table table-borderless mb-4">
                                <tr>
                                    <th>Nomor Referensi</th>
                                    <td><strong>{{ $journal->ticket_ref_number }}</strong></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($journal->status == 'success')
                                        <span class="badge bg-success">Berhasil</span>
                                        @elseif ($journal->status == 'failed')
                                        <span class="badge bg-danger">Gagal</span>
                                        @else
                                        <span class="badge bg-warning">Sebagian Berhasil</span>
                                        @endif
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th>Dibuat Oleh</th>
                                    <td>{{ $journal->agent->name ?? 'Tidak ditemukan' }}</td>
                                </tr> --}}
                                <tr>
                                    <th>Tanggal Dibuat</th>
                                    <td>{{ \Carbon\Carbon::parse($journal->created_at)->format('d M Y H:i') }}
                                    </td>
                                </tr>
                            </table>

                            <!-- Konten Utama -->
                            <div class="journal-section mt-4">
                                <h5 class="mb-3">Konteks Masalah</h5>
                                <div class="journal-content">
                                    {!! $journal->context_problem !!}
                                </div>
                            </div>

                            <div class="journal-section mt-4">
                                <h5 class="mb-3">Langkah Penyelesaian</h5>
                                <div class="journal-content">
                                    {!! $journal->steps_resolution !!}
                                </div>
                            </div>

                            <div class="journal-section mt-4">
                                <h5 class="mb-3">Hambatan / Kesulitan</h5>
                                <div class="journal-content">
                                    {!! $journal->challenges !!}
                                </div>
                            </div>

                            <div class="journal-section mt-4">
                                <h5 class="mb-3">Solusi Alternatif</h5>
                                <div class="journal-content">
                                    {!! $journal->solutions !!}
                                </div>
                            </div>

                            <div class="journal-section mt-4">
                                <h5 class="mb-3">Hasil Akhir</h5>
                                <div class="journal-content">
                                    {!! $journal->final_result !!}
                                </div>
                            </div>

                            <div class="journal-section mt-4">
                                <h5 class="mb-3">Pelajaran & Tips</h5>
                                <div class="journal-content">
                                    {!! $journal->lessons_learned !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <a href="{{ route('journals.edit', $journal->id) }}" class="btn btn-warning me-2">Edit</a>
                        <a href="{{ route('journals.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('styles')
<style>
.journal-section h5 {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.75rem;
}

.journal-content {
    line-height: 1.8;
    font-size: 1rem;
    color: #333;
    background-color: #f9f9f9;
    padding: 1.5rem;
    border-radius: 8px;
    border-left: 4px solid #0b77e7;
    white-space: normal;
    word-wrap: break-word;
}

.journal-content h1,
.journal-content h2,
.journal-content h3 {
    margin-top: 1.5rem;
    margin-bottom: 0.75rem;
    color: #2c3e50;
    border-bottom: 1px solid #eee;
    padding-bottom: 0.3rem;
}

.journal-content p {
    margin-bottom: 1rem;
}

.journal-content ol,
.journal-content ul {
    padding-left: 1.5rem;
    margin-bottom: 1rem;
}

.journal-content li {
    margin-bottom: 0.5rem;
}

.journal-content code {
    background-color: #eee;
    padding: 2px 6px;
    border-radius: 4px;
    font-family: monospace;
}

.journal-content pre {
    background-color: #2d2d2d;
    color: #f8f8f2;
    padding: 10px;
    overflow-x: auto;
    border-radius: 6px;
}
</style>
@endsection