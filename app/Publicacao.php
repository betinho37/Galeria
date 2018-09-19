<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;


class Publicacao extends Model
{
    protected $table = 'publicacoes';


    protected $fillable = [
        'nome',
        'titulo',
        'descricao',
        'arquivo',
        'pdf',
        'tipousuario',
        'userid',
        'situacao',
        'categoriaid'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
    public function getUrlPath()
{
    return Storage::url($this->path);
}




}
