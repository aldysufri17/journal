<div class="row row-cards p-4">
    @forelse ($journals as $journal)
    <div class="col-md-6 col-lg-4 mb-4 d-flex">
        <div class="card shadow-sm border rounded w-100 fixed-card-size">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ $journal->ticket_ref_number }}</h5>
                <div>
                    @if ($journal->status == 'success')
                    <span class="badge bg-green-lt"><i class="fas fa-check-circle me-2"></i> Berhasil</span>
                    @elseif ($journal->status == 'failed')
                    <span class="badge bg-red-lt"><i class="fas fa-times-circle me-2"></i> Gagal</span>
                    @else
                    <span class="badge bg-yellow-lt"><i class="fas fa-exclamation-triangle me-2"></i> Sebagian</span>
                    @endif
                </div>
            </div>
            <div class="card-body d-flex flex-column">
                <p class="mb-2 card-text-truncate">
                    <strong>Konteks:</strong><br>
                    {{ Str::limit($journal->context_problem, 100) }}
                </p>
                <p class="mt-auto card-date">
                    <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($journal->created_at)->format('d M Y H:i') }}
                </p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('journals.show', $journal->id) }}" class="btn btn-sm btn-info m-1">
                    Lihat
                </a>
                <button class="btn btn-sm btn-danger" onclick="deleteJournal(event, {{ $journal->id }})">
                    Hapus
                </button>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center">
        <p>Tidak ada data jurnal ditemukan.</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-4">
    {{ $journals->appends($_GET)->links() }}
</div>