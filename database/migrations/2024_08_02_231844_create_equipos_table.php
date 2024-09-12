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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion',100);
            $table->string('codigo',100);
            $table->string('qr',45);
            $table->string('foto',45);

            $table->unsignedBigInteger('estado_id'); // modificar
            $table->foreign('estado_id')->references('id')->on('estados');

            $table->unsignedBigInteger('personal_id');
            $table->foreign('personal_id')->references('id')->on('personals');

            $table->date('fechadealta',45);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
