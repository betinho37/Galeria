<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(array('nome' => 'Livro'));
        Categoria::create(array('nome' => 'Pintura'));
        Categoria::create(array('nome' => 'Gravura'));      
    }
}
