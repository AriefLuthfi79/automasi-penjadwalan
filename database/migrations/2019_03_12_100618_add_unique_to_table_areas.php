<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueToTableAreas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas', function (Blueprint $table) {
            $table->unique('code_area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('areas', function (Blueprint $table) {
            $schema = Schema::getConnection()->getDoctrineSchemaManager();
            $doctrineTable = $schema->listTableDetails('areas');

            if ($doctrineTable->hasIndex('code_area')) {
                $table->dropIndex('code_area');
            }
        });
    }
}
