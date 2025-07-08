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
        Schema::create('acoes_post', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->foreignId('artigo_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->enum('acao', ['curtida', 'salvamento']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acoes_post');
    }
};
