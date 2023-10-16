<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\IndexController::class, 'index'])->name('index');

Route::prefix('/clientes')->group(function(){
    Route::get('/',[\App\Http\Controllers\ClientesController::class, 'clientes'])->name('clientes');
    Route::get('/',[\App\Http\Controllers\ClientesController::class, 'listarClientes'])->name('clientes');
    Route::get('/cadastrocliente',[\App\Http\Controllers\ClientesController::class, 'cadastroclientes'])->name('clientes.cadastroclientes');
    Route::post('/cadastrocliente',[\App\Http\Controllers\ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/editcliente/{id_cliente}',[\App\Http\Controllers\ClientesController::class, 'editcliente'])->name('clientes.editcliente');
    Route::put('/editcliente/{id_cliente}',[\App\Http\Controllers\ClientesController::class, 'updatecliente'])->name('clientes.update');
    Route::delete('/{id_cliente}',[\App\Http\Controllers\ClientesController::class, 'deletecliente'])->name('clientes.delete');

});

Route::prefix('/pedidos')->group(function(){
    Route::get('/',[\App\Http\Controllers\PedidosController::class, 'pedidos'])->name('pedidos');
    Route::get('/cadastropedido',[\App\Http\Controllers\PedidosController::class, 'cadastropedido'])->name('pedidos.cadastropedido');
});

Route::prefix('/produtos')->group(function(){
    Route::get('/',[\App\Http\Controllers\ProdutosController::class, 'produtos'])->name('produtos');
    Route::get('/',[\App\Http\Controllers\ProdutosController::class, 'listarprodutos'])->name('produtos');
    Route::get('/cadastroproduto',[\App\Http\Controllers\ProdutosController::class, 'cadastroproduto'])->name('produtos.cadastroproduto');
    Route::post('/cadastroproduto',[\App\Http\Controllers\ProdutosController::class, 'store'])->name('produtos.store');
    Route::get('/editproduto/{id_produto}',[\App\Http\Controllers\ProdutosController::class, 'editprodutos'])->name('produtos.edit');
    Route::put('/editproduto/{id_produto}',[\App\Http\Controllers\ProdutosController::class, 'update'])->name('produtos.update');
    Route::delete('/{id_produto}',[\App\Http\Controllers\ProdutosController::class, 'delete'])->name('produtos.delete');



});