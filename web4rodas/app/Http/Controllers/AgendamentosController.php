<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamentos;

class AgendamentosController extends Controller
{
    public function index(){
    return view('agendar');
    }
    
    
     /*  Função responsável por renderizar a view Criar Notícia.*/
      function criar_agendamento(){
        return view('agendar');
    }
    
    
    /*  Função responsável por enviar os dados para a Tabela "carro".
        A variável $carro é uma nova carro. "carro" é o Model.
        Preenche todos os campos da tabela "carro" com os valores que vem no request
        Faz o save() para enviar os dados.
        Redireciona para a view "Veiculo-carro" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $agendamento = new Agendamentos();
    
        $agendamento -> data_inicio = $request->data_inicio;
        $agendamento -> data_fim= $request->data_fim;
        $agendamento -> descricao = $request->descricao;
        //$agendamento -> condutor = $request->condutor;
        //$agendamento -> veiculo = $request->veiculo;
    
      
       
    
    
        $agendamento->save();
    
        return redirect('/agendar')->with('msg', 'Agendamento criado com sucesso!');
    }
    
    
    
    
    
    
    
    
    
    }



