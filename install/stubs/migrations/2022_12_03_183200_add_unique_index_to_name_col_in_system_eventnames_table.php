<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUniqueIndexToNameColInSystemEventnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = EvolutionCMS()->getDatabase()->getFullTableName('system_eventnames');
        DB::delete("delete t1 FROM {$table} t1
            INNER  JOIN {$table} t2
            WHERE  t1.id < t2.id AND  t1.name = t2.name
        ");
        Schema::table('system_eventnames', function (Blueprint $table) {
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_eventnames', function (Blueprint $table) {
            $table->dropUnique('name');
        });
    }
}
