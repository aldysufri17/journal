<?php

namespace App\Http\Controllers;

use App\Models\TicketJournal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketJournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $show = $request->show ?? 10;
            $journals = new TicketJournal();

            if ($request->search) {
                $journals = $journals->where('title', 'like', '%' . $request->search . '%');
            }

            $journals = $journals->paginate($show);
            return view('mara.journal.includes.list', compact('journals'));
        }

        // Hitung statistik untuk card
        $totalJournals = TicketJournal::count();

        $successCount = TicketJournal::where('status', 'success')->count();
        $successRate = $totalJournals > 0 ? round(($successCount / $totalJournals) * 100, 1) : 0;

        return view('mara.journal.index', compact(
            'totalJournals',
            'successRate'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mara.journal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'ticket_ref_number' => 'required|string|max:255',
            'context_problem' => 'required|string',
            'steps_resolution' => 'required|string',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'final_result' => 'required|string',
            'lessons_learned' => 'required|string',
            'status' => 'required|in:success,failed,partial',
        ]);

        // Tambahkan agent_id dari user yang login
        $validated['agent_id'] = auth()->id();

        // Simpan ke database
        TicketJournal::create($validated);

        // Redirect dengan pesan sukses
        return redirect()->route('journals.index')->with('success', 'Jurnal tiket berhasil disimpan.');
    }

    public function edit($id)
    {
        $journal = TicketJournal::findOrFail($id);
        return view('mara.journal.update', compact('journal'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'ticket_ref_number' => 'required|string|max:255',
            'context_problem' => 'required|string',
            'steps_resolution' => 'required|string',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'final_result' => 'required|string',
            'lessons_learned' => 'required|string',
            'status' => 'required|in:success,failed,partial',
        ]);

        $journal = TicketJournal::findOrFail($id);
        $journal->update($validated);

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil diperbarui.');
    }

    public function show($id)
    {
        $journal = TicketJournal::findOrFail($id);
        return view('mara.journal.includes.show', compact('journal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $journal = TicketJournal::findOrFail($id);
            $journal->delete();

            return response()->json([
                'status' => true,
                'message' => 'Jurnal berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus jurnal: ' . $e->getMessage()
            ]);
        }
    }

    public function stats()
    {
        $data = TicketJournal::select('ticket_type_id', DB::raw('count(*) as total'))
            ->groupBy('ticket_type_id')
            ->get();

        $types = TicketType::whereIn('id', $data->pluck('ticket_type_id'))->pluck('name', 'id');

        $labels = [];
        $counts = [];

        foreach ($data as $row) {
            $labels[] = $types[$row->ticket_type_id] ?? 'Unknown';
            $counts[] = $row->total;
        }

        return view('admin.ticket-journal.stats', compact('labels', 'counts'));
    }
}
