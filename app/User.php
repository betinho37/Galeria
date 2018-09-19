<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'cep',
        'endereco',
        'telefone',
        'tipousuario',
        'estadoid',
        'relacaoid',
        'cidade'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     public static function listUser()
    {
        return static::orderBy('name')->pluck('name', 'id');
    }
    public function estado()
    {
        return $this->belongsTo('App\Estado', 'estadoid');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publicacoes()
    {
        return $this->hasMany(Publicacao::class, 'userid');
    }
}
