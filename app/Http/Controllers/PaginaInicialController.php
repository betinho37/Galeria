<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PublicacaoController;
use App\Publicacao;

class PaginaInicialController extends Controller
{
    private $publicacao;


    public function __construct(Publicacao $publicacao)
    {
        $this->publicacao = $publicacao;
    }



    
    
    
}
