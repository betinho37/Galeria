<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relacao extends Model

{	
	
	protected $table = "relacoes";
    protected $fillable = ['nome'];

	public static function listRelacao()
	{
		return static::orderBy('nome')->pluck('nome', 'id');
	} 
}
