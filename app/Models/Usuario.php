<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'nome',
        'password',
        'email'
    ];
    protected $table = 'usuarios';
}
