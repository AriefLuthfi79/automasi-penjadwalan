<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueToTableDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('days', function (Blueprint $table) {
            $table->unique('code_day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('days', function (Blueprint $table) {
            $schema = Schema::getConnection()->getDoctrineSchemaManager();
            $doctrineTable = $schema->listTableDetails('days');

            if ($doctrineTable->hasIndex('code_day')) {
                $table->dropIndex('code_day');
            }
        });
    }
}
