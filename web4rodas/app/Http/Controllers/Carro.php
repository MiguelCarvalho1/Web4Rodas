<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carros;

class Carro extends Controller
{
    public function index(){
        $carro = Carros::all()->where("Disnponivel", "=", "1")->where("Indisponivel", "=", "0");;
        $carro_indisponivel = Carros::all()->where("Disnponivel", "=", "1")->where("Indisponivel", "=", "1");
        return view('carro', ['carro' => $carro, 
                    'carro_indisponivel' => $carro_indisponivel]);
    }
}
