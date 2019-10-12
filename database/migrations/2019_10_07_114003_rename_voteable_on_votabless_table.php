<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameVoteableOnVotablessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votables', function (Blueprint $table) {
            $table->renameColumn('votabel_id','votable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votables', function (Blueprint $table) {
            $table->renameColumn('votable_id','votabel_id');
        });
    }
}
