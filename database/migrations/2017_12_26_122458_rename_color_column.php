<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('categories', function($t) {
                $t->renameColumn('color', 'color_code');
        });
    }
    public function down()
    {
        Schema::table('categories', function($t) {
                $t->renameColumn('color_code', 'color');
        });
    }

}
