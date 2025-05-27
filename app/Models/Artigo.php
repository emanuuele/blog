<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'conteudo',
        'usuario_id',
        'curtidas',
        'comentarios',
        'salvamentos'
    ];
    protected $table = 'artigos';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id'); // ou 'user_id' dependendo do nome da coluna
    }
}
