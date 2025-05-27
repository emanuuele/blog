<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'conteudo',
        'usuario_id',
        'artigo_id'
    ];
    protected $table = 'comentarios';

    // App\Models\Comentario.php

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
