<div class="table-responsive">
    <table class="table card-table table-vcenter table-bordered">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th width="10%">Tiket Ref</th>
                <th width="35%">Konteks</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($journals as $journal)
            <tr>
                <td>{{ ($journals->currentpage()-1) * $journals->perpage() + $loop->index + 1 }}</td>
                <td><strong>{{ $journal->ticket_ref_number }}</strong></td>
                <td>{{ Str::limit($journal->context_problem, 50) }}</td>
                <td class="text-center">
                    @if ($journal->status == 'success')
                    <span class="badge bg-green-lt">Berhasil</span>
                    @elseif ($journal->status == 'failed')
                    <span class="badge bg-red-lt">Gagal</span>
                    @else
                    <span class="badge bg-yellow-lt">Sebagian</span>
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($journal->created_at)->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('journals.show', $journal->id) }}" class="btn btn-sm btn-info m-1">
                        Lihat
                    </a>
                    <button class="btn btn-sm btn-danger" onclick="deleteJournal(event, {{ $journal->id }})">
                        Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data jurnal ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="card-footer">
    {{ $journals->appends($_GET)->links() }}
</div>