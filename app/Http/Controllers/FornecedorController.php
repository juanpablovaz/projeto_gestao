<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    //

    public function index () {

        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'S',
                'cnpj' => '',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'N',
                'cnpj' => 'ertge56e56',
                'ddd' => '32',
                'telefone' => '0000-0000'
                
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'N',
                'cnpj' => '55456456456',
                'ddd' => '85',
                'telefone' => '0000-0000'
            ],
            3 => [
                'nome' => 'Fornecedor 4',
                'status' => 'N',
                'cnpj' => 'x00000sa',
                'ddd' => '64',
                'telefone' => '0000-0000'
            ]

        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
