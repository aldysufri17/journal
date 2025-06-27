<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUrlToCaseGuidesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('case_guides', function (Blueprint $table) {
            $table->string('url')->nullable()->after('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('case_guides', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
