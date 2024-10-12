<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeActiveUsersPrimaryIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('active_users', function (Blueprint $table) {
            $table->dropPrimary()->primary(['sid', 'internalKey']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('active_users', function (Blueprint $table) {
            $table->dropPrimary()->primary('sid');
        });
    }
}
