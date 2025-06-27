@extends('layouts.admin.main')
@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Bank Regulation</h2>
            </div>
            <div class="col-auto ms-auto">
                <a href="{{ route('regulation.create') }}" class="btn btn-success">Upload Baru</a>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">

            @forelse ($regulations as $reg)
                <div class="col-md-3 col-sm-6">
                    <div class="card card-file shadow-sm border rounded">
                        <div class="card-body text-center p-3">
                            <div class="card-file__icon">
                                {!! getRegulationIcon($reg->type) !!}
                            </div>
                            <div class="card-file__name mt-2">
                                <strong>{{ $reg->title }}</strong><br>
                                <small>{{ strtoupper($reg->type) }}</small>
                            </div>
                            <div class="card-file__actions mt-2">
                                <a href="{{ asset($reg->file_path) }}" target="_blank" class="btn btn-sm btn-primary w-100 mb-1">Lihat</a>
                                <a href="{{ route('regulation.edit', $reg->id) }}" class="btn btn-sm btn-warning w-100 mb-1">Edit</a>
                                <form action="{{ route('regulation.destroy', $reg->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Hapus regulation ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Tidak ada regulation ditemukan.</p>
                </div>
            @endforelse

        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
.card-file__icon svg {
    width: 50px;
    height: 50px;
    margin-bottom: 10px;
}
.card-file:hover {
    background-color: #f8f9fc;
    border-color: #0b77e7;
}
</style>
@endsection