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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->text('descripcion');
            $table->string('isbn')->unique();
            $table->unsignedBigInteger('editorial_id');
            $table->foreign('editorial_id')
            ->references('id')
            ->on('editoriales')
            ->onDelete('cascade');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('autor_id')
            ->references('id')
            ->on('autores')
            ->onDelete('cascade');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias')
            ->onDelete('cascade');
            $table->string('edicion')->nullable();
            $table->year('anio_publicacion')->nullable();
            $table->string('idioma');
            $table->integer('stock');
            $table->date('fecha_adquisicion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
