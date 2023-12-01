<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Maternidade;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MaternidadeController extends Controller
{
  //
  public function index()
  {
    if (!session()->has("usuario")) {
      return redirect("services/login");
    }
    $fetchDados = Maternidade::all();
    //dd($fetchDados);
    return view("index", ["fetchDados" => $fetchDados]);
  }

 /*  public function editar($id, $nome, $valor)
  {
    return view("services.editar", ["editar", compact('id', 'nome', 'valor')]);
  } */

  //funcionando
  public function editar(string $id, string $nome, $valor){
    return view("services.editar", ['id' => $id, 'nome'=>$nome,'valor'=>$valor]);
    //return 'services.editar'.$id;
  }

  public function atualizar(Request $request, $id){

    $validateData = $request->validate([
      'nome' => 'required|string',
      'valor' => 'required|numeric',
    ]);

    $maternidade = Maternidade::findOrFail($id);

    $maternidade->update($validateData);

    return redirect()->route("index")->with('success', 'service update sucessfully');
  }

  //funcionando
  public function cadastro()
  {
    return view('services.cadastro');
  }

  public function cadastroProduto(Request $request)
  {
    if ($request->isMethod('post')) {
      $nome = $request->input('nome');
      $categoria = $request->input('categoria');
      $valor = $request->input('valor');

      DB::table('maternidades')->insert([
        'nome' => $nome,
        'categoria' => $categoria,
        'valor' => $valor
      ]);
    }
    return redirect()->route("index")->with('success', 'service update sucessfully');
  }

  //funcionando
  public function deletar(){
    $fetchDados = Maternidade::all();
    return view('services.deletar', ["fetchDados" => $fetchDados]);//o valor string é reconhecido pela view como uma $variavel. ex: 'ola'=>$fetchaDados será reconhecido como $ola no frontend.
    
  }

  public function deletarProduto(Request $request){
    
      $id = $request->input('id');
      /* $deleted = DB::table('maternidades')->where('id', '=', $id)->delete(); //retorna um número de linhas deletadas
      echo $deleted; */
      $deleted = Maternidade::destroyRecord($id);
        
        if(!$deleted){
          return redirect()->route('deletar')->with('error', 'Record not found or unable to delete');
        }
        return redirect()->route('index')->with('success', 'Record deleted successfully');
  }
  public function login()
  {
    return view('services.login');
  }
  public function verificaLogin(Request $request)
  {
    if ($request->isMethod('post')) {
      $credentials = $request->only('email', 'senha');
      $usuario = Usuario::verificaUsuario($credentials['email'], $credentials['senha']);

      if ($usuario) {
        Auth::login($usuario);
        session(['usuario' => $usuario]);
        return redirect()->route("index");
      } else {
        return redirect()->route("services.login")->with("error", "usuario não encontrado ou credenciais incorretas");
      }
    }
  }

  public function cadastroUsuario(){
    
    return view("services.cadastroUsuario");
  }

  public function processaCadastro(Request $request){

    $this->validate($request, [
      'nome' => 'required',
      'email' => 'required|email|unique:usuario',
      'senha' => 'required|min:6',
      'confirmaSenha' => 'required|same:senha',
    ]);
    if ($request->isMethod('post')) {
      $nome = $request->input('nome');
      $email = $request->input('email');
      $senha = $request->input('senha');
      $confirmaSenha = $request->input('confirmaSenha');
    }

    if ($senha == $confirmaSenha) {
      try {
        Usuario::cadastrarUsuario($nome, $email, $senha);
        return redirect()->route('index')->with('success', 'Usuario cadastrado com sucesso');//tirar o ponto quando resolver o sql error
      } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    } else {
      return redirect()->route("cadastroUsuario")->with("erro", 1);
    }

    /*$this->validate($request, [
        'nome' => 'required',
        'email' => 'required|email|unique:your_table_name',
        'senha' => 'required|min:6',
        'confirmaSenha' => 'required|same:senha',
      ]);*/
  }

 
}
