<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teste;

class TesteController extends Controller
{
    //
    /* public function teste(){
        $teste = Teste::all();
        return view("teste",['teste'=>$teste]);
    } */
    public function teste(){
        //$teste = Teste::all();
        return view("services.teste");
    }
}
