<?php

use App\Http\Controllers\MaternidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;
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

//página principal do crud
Route::get('/', [MaternidadeController::class,"index"])->name("index");

Route::get("/services/teste", [TesteController::class,"teste"])->name("teste");

Route::get("/services/login", function(){
  return view("services.login");
});

Route::get("/services/cadastro", function(){
  return view("services.cadastro");
});

//Route::get("/services/editar/{id}/{nome}/{valor}", [MaternidadeController::class,"editar"])->name("services.editar");
Route::get("/services/editar/{id}/{nome}/{valor}", [MaternidadeController::class,"editar"])->name("editar");

Route::get("/services/deletar", [MaternidadeController::class, "deletar"])->name("deletar"); 

Route::delete("/services/deletarProduto", [MaternidadeController::class, "deletarProduto"])->name("deletarProduto");

Route::put("/atualizar/{id}", [MaternidadeController::class, "atualizar"])->name("atualizar");
//Route::resource("/services", MaternidadeController::class);

Route::post("/verificaLogin", [MaternidadeController::class, "verificaLogin"])->name("verificaLogin");

Route::get("/services/cadastroUsuario", [MaternidadeController::class, "cadastroUsuario"])->name("cadastroUsuario");

Route::post("/processaCadastro", [MaternidadeController::class,"processaCadastro"])->name("processaCadastro");

Route::post("/cadastroProduto", [MaternidadeController::class,"cadastroProduto"])->name("cadastroProduto");

Route::post("deletarProduto", [MaternidadeController::class,"deletarProduto"])->name("deletarProduto");

Route::get("/encerraSessao", function(){
  session()->flush();
  redirect()->route("services.login");
});


