<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
         $table->string('name', 50)->nullable()->change(); 
     });
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->string('username');            
            $table->string('phone')->nullable();            
            $table->string('image')->default('default.jpg');             
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
        Schema::dropIfExists('profile');
    }
}
