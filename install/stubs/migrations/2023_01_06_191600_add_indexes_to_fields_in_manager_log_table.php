<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToFieldsInManagerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('manager_log', function (Blueprint $table) {
            $table->index(['internalKey', 'action', 'itemid', 'itemname', 'message', 'timestamp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('manager_log', function (Blueprint $table) {
            $table->dropIndex('internalKey');
            $table->dropIndex('action');
            $table->dropIndex('itemid');
            $table->dropIndex('itemname');
            $table->dropIndex('message');
            $table->dropIndex('timestamp');
        });
    }
}
