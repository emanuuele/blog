<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcoesPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'acao',
        'artigo_id',
        'usuario_id',
    ];
    protected $table = 'acoes_post';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id'); // ou 'user_id' dependendo do nome da coluna
    }
    public function artigo()
    {
        return $this->belongsTo(Artigo::class, 'artigo_id'); // ou 'post_id' dependendo do nome da coluna
    }
}
