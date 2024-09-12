<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();


            $table->string('descripcion', 1000);
            $table->string('descargo', 100);

            $table->date('fechaentrega');
            $table->string('fotoentrega', 45);

            $table->date('fechadevolucion');
            $table->string('fotodevolucion', 45);

            $table->unsignedBigInteger('personal_id');//prestador el que presta
            $table->foreign('personal_id')->references("id")->on("personals");

            $table->unsignedBigInteger('prestamista_id');
            $table->foreign('prestamista_id')->references("id")->on("personals");

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references("id")->on("users");

            $table->unsignedBigInteger('equipo_id');
            $table->foreign('equipo_id')->references("id")->on("equipos");

            $table->unsignedBigInteger('estado_id');//estado entrega
            $table->foreign('estado_id')->references("id")->on("estados");

            $table->unsignedBigInteger('estado_devolucion');
            $table->foreign('estado_devolucion')->references("id")->on("estados");



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
