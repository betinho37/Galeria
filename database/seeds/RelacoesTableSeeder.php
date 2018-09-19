<?php

use Illuminate\Database\Seeder;
use App\Relacao;

class RelacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        Relacao::create(array('nome' => 'Filho'));
        Relacao::create(array('nome' => 'Sobrinha'));
        Relacao::create(array('nome' => 'Sobrinha'));
        Relacao::create(array('nome' => 'Irmão'));
        Relacao::create(array('nome' => 'Irmã'));
        Relacao::create(array('nome' => 'Neto'));
        Relacao::create(array('nome' => 'Neta'));
        Relacao::create(array('nome' => 'Primo'));
        Relacao::create(array('nome' => 'Prima'));
        Relacao::create(array('nome' => 'Amigo'));     
        Relacao::create(array('nome' => 'Amiga'));        
   
    }
    
}
