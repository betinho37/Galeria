<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 150);
            $table->string('telefone', 18);
            $table->string('cidade', 45);
            $table->integer('tipousuario')->default(1);
            $table->integer('estadoid')->unsigned();
            $table->foreign('estadoid')->references('id')->on('estados')->onDelete('cascade');
            $table->integer('relacaoid')->unsigned()->nullable();
            $table->foreign('relacaoid')->references('id')->on('relacoes')->onDelete('cascade');


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
