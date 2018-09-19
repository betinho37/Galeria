<?php

namespace App;
use App\Publicacao;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['nome'];

	public static function listCategoria()
	{
		return static::orderBy('id')->pluck('nome', 'id');
	}
}
