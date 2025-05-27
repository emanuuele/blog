<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->text('conteudo');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->unsignedInteger('curtidas')->default(0);
            $table->unsignedInteger('comentarios')->default(0);
            $table->unsignedInteger('salvamentos')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigos');
    }
};
