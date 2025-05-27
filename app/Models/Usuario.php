<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Model implements JWTSubject
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nome',
        'password',
        'email'
    ];
    protected $table = 'usuarios';

    // métodos obrigatórios da interface
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
