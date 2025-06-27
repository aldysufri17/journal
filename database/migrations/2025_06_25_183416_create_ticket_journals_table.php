<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_type_id');
            $table->string('ticket_ref_number');
            $table->text('context_problem');
            $table->longText('steps_resolution'); // bisa simpan JSON atau HTML
            $table->text('challenges')->nullable();
            $table->text('solutions')->nullable();
            $table->text('final_result');
            $table->text('lessons_learned');
            $table->enum('status', ['success', 'failed', 'partial']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_journals');
    }
}
