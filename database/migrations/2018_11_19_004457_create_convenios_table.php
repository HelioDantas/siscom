<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nome');
            $table->date('adesao');
            $table->string('banco');
            $table->string('agencia');
            $table->string('conta');
            $table->string('status');
            $table->rememberToken();
            $table->timestamp();
    });
    
    }
}