<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_tmplvar_contentvalues', function (Blueprint $table) {
            // get indexes
            $indexesFound = collect(DB::select('SHOW indexes FROM ' . DB::getTablePrefix() . $table->getTable()))
                ->pluck('Key_name')
                ->unique();

            // remove fulltext
            if ($indexesFound->contains('value_ft_idx')) {
                // миграция так не умеет, зато умеет DB
                DB::statement('DROP INDEX value_ft_idx ON ' . DB::getTablePrefix() . $table->getTable());
            }

            // reject PRIMARY and fulltext
            $indexesFound = $indexesFound->reject(function ($value, $key) {
                return in_array($value, ['PRIMARY', 'value_ft_idx']);
            });

            // remove indexes
            foreach ($indexesFound as $index_name) {
                $table->dropIndex($index_name);
            }
        });

        Schema::table('site_tmplvar_contentvalues', function (Blueprint $table) {
            // tmplvarid  = idx_tmplvarid
            $table->index('tmplvarid', 'idx_tmplvarid');
            // contentid = idx_contentid
            $table->index('contentid', 'idx_contentid');

            // tmplvarid + contentid = idx_tmplvarid_contentid
            $table->index(['tmplvarid', 'contentid'], 'idx_tmplvarid_contentid');

            // value(50) = idx_value_prefix
            // миграция так не умеет
            // $table->index('value(50)', 'idx_value_prefix');
            // зато умеет DB
            DB::statement('CREATE INDEX idx_value_prefix ON ' . DB::getTablePrefix() . $table->getTable() . ' (value(50))');

            // value = idx_value_ft
            $table->fulltext('value', 'idx_value_ft');

            // tmplvarid + contentid + value(50) = idx_tmplvarid_contentid_value
            // миграция так не умеет
            //$table->index(['tmplvarid', 'contentid', 'value'], 'idx_tmplvarid_contentid_value');
            // зато умеет DB
            DB::statement('CREATE INDEX idx_tmplvarid_contentid_value ON ' . DB::getTablePrefix() . $table->getTable() . ' (tmplvarid, contentid, value(50))');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_tmplvar_contentvalues', function (Blueprint $table) {
            // remove
            $table->dropIndex('idx_tmplvarid');
            $table->dropIndex('idx_contentid');
            $table->dropIndex('idx_tmplvarid_contentid');
            $table->dropIndex('idx_value_prefix');
            $table->dropIndex('idx_tmplvarid_contentid_value');

            // миграция так не умеет, зато умеет DB
            DB::statement('DROP INDEX idx_value_ft ON ' . DB::getTablePrefix() . $table->getTable());
        });

        Schema::table('site_tmplvar_contentvalues', function (Blueprint $table) {
            // restore as of 3.1.30
            $table->index(['tmplvarid', 'contentid'], 'ix_tvid_contentid');
            $table->index('tmplvarid', 'idx_tmplvarid');
            $table->index('contentid', 'idx_id');
            $table->fulltext('value', 'value_ft_idx');
        });
    }
};
