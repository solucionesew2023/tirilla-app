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
        Schema::create('tirillatns', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('mes');
            $table->smallInteger('ano');
            $table->integer('detalleid');
            $table->integer('personalid');
            $table->string('codigo',15);
            $table->string('nombre',100);
            $table->string('nomconcepto',40);
            $table->smallInteger('conceptoid');
            $table->char('tipodc', 1);
            $table->smallInteger('cantidad');
            $table->integer('valor');
            $table->integer('saldo');
            $table->string('tex_adic');
            $table->integer('novedadid');
            $table->string('nombanco');
            $table->string('ctatrab');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tirillatns');
    }
};
