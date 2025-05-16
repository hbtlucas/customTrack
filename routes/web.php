<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\RelatoriosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rota raiz do Breeze (página welcome)
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de autenticação do Breeze (login, register, logout, etc.)
require __DIR__.'/auth.php';

// Rota de dashboard do Breeze, protegida por autenticação
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas protegidas por autenticação
Route::middleware('auth')->group(function () {
    // Rotas de perfil do Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas do CRUD de clientes
    Route::prefix('/clientes')->group(function () {
        Route::get('/', [ClientesController::class, 'listarClientes'])->name('clientes');
        Route::get('/search', [ClientesController::class, 'search'])->name('clientes.search');
        Route::get('/cadastrocliente', [ClientesController::class, 'cadastroclientes'])->name('clientes.cadastroclientes');
        Route::post('/cadastrocliente', [ClientesController::class, 'store'])->name('clientes.store');
        Route::get('/editcliente/{id_cliente}', [ClientesController::class, 'editcliente'])->name('clientes.editcliente');
        Route::put('/editcliente/{id_cliente}', [ClientesController::class, 'updatecliente'])->name('clientes.update');
        Route::delete('/{id_cliente}', [ClientesController::class, 'deletecliente'])->name('clientes.delete');
    });

    // Rotas do CRUD de pedidos
    Route::prefix('/pedidos')->group(function () {
        Route::get('/', [PedidosController::class, 'listarpedidos'])->name('pedidos');
        Route::get('/search', [PedidosController::class, 'search'])->name('pedidos.search');
        Route::get('/cadastropedido', [PedidosController::class, 'cadastropedido'])->name('pedidos.cadastropedido');
        Route::post('/cadastropedido', [PedidosController::class, 'store'])->name('pedidos.store');
        Route::get('/editpedido/{id_pedido}', [PedidosController::class, 'edit'])->name('pedidos.edit');
        Route::put('/editpedido/{id_pedido}', [PedidosController::class, 'update'])->name('pedidos.update');
        Route::delete('/{id_pedido}', [PedidosController::class, 'delete'])->name('pedidos.delete');
    });

    // Rotas do CRUD de produtos
    Route::prefix('/produtos')->group(function () {
        Route::get('/', [ProdutosController::class, 'listarprodutos'])->name('produtos');
        Route::get('/search', [ProdutosController::class, 'search'])->name('produtos.search');
        Route::get('/cadastroproduto', [ProdutosController::class, 'cadastroproduto'])->name('produtos.cadastroproduto');
        Route::post('/cadastroproduto', [ProdutosController::class, 'store'])->name('produtos.store');
        Route::get('/editproduto/{id_produto}', [ProdutosController::class, 'editprodutos'])->name('produtos.edit');
        Route::put('/editproduto/{id_produto}', [ProdutosController::class, 'update'])->name('produtos.update');
        Route::delete('/{id_produto}', [ProdutosController::class, 'delete'])->name('produtos.delete');
    });

    // Rotas do CRUD de relatórios
    Route::prefix('/relatorios')->group(function () {
        Route::get('/', [RelatoriosController::class, 'listar'])->name('relatorios');
        Route::get('/cadastrorelatorio', [RelatoriosController::class, 'cadastro'])->name('relatorios.cadastro');
        Route::post('/cadastrorelatorio', [RelatoriosController::class, 'store'])->name('relatorios.store');
        Route::get('/editrelatorio/{id}', [RelatoriosController::class, 'edit'])->name('relatorios.edit');
        Route::put('/editrelatorio/{id}', [RelatoriosController::class, 'update'])->name('relatorios.update');
        Route::delete('/{id}', [RelatoriosController::class, 'delete'])->name('relatorios.delete');
    });
});