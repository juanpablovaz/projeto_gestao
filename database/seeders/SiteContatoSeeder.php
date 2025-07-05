<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
         $contato = new SiteContato();

        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 99999-5565';
        $contato->email = 'contato@sistemasg.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem vindo ao sistema Super Gestao';
         */
        
         \App\Models\SiteContato::factory()->count(100)->create();
        
    }
}
