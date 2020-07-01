<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatCivilsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat__civils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('function');
            $table->string('address');
            $table->string('email');
            $table->string('tel');
            $table->string('linkedin')->nullable();
            $table->string('description');
            $table->string('birthday');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etat__civils');
    }
}
