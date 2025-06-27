<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketJournal extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_ref_number',
        'context_problem',
        'steps_resolution',
        'challenges',
        'solutions',
        'final_result',
        'lessons_learned',
        'status',
    ];
}
