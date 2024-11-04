<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\FornecedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PrincipalController::class , 'index'])->name('site.index');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function(){
        return 'clientes';
    })->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class , 'index'])->name('app.fornecedores');

    Route::get('/produtos', function(){
        return 'produtos';
    })->name('app.produtos');

});

Route::fallback(function(){
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index').'"> aqui</a> para retornar';
});