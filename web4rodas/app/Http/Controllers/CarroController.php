<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carros;
use \Illuminate\Support\Facades\DB;
use App\Models\Veiculo;


class CarroController extends Controller
{
    public function index(){
        $carro= Carros::paginate(4);

        $tipo = DB::table('tipo_veiculo')
        ->select('descricao_tipo')
        ->get();


    return view('veiculo/carro', ['carros' => $carro, 'tipos'=>$tipo]);
    }


        /*  Função responsável por renderizar a view Criar Carro.*/
        public function criar_carro(){

            $tipo = DB::table('tipo_veiculo')
            ->select('id','descricao_tipo')
            ->get();

            return view('veiculo/criar_carro' , ['tipos'=> $tipo]);
        }
    
        /*  Função responsável por enviar os dados para a Tabela "carro".
            A variável $carro é uma nova carro. "carro" é o Model.
            Preenche todos os campos da tabela "carro" com os valores que vem no request
            Faz o save() para enviar os dados.
            Redireciona para a view "Veiculo-carro" onde apresenta uma mensagem de sucesso.*/
        public function store(Request $request){
            $carro = new Carros;
    
            $carro -> marca = $request->marca;
            $carro -> modelo= $request->modelo;
            $carro -> matricula = $request->matricula;
            $carro -> lotacao = $request->lotacao;
            $carro -> tipo_id = $request->tipo_id;

          
           
    
    
            $carro->save();
    
            return redirect('/veiculo/carro')->with('msg', 'Carro criado com sucesso!');
        }
    

    /*  Função para abrir a view Veiculos, onde é passado um $id como parâmetro.
        A variável $carro guarda a carro com o $id passado como parâmetro.
        Retorna a view "Veiculos - Editar ".*/

    public function editar_carro($id){
        $carro = carros::findOrFail($id);

        $tipo = DB::table('tipo_veiculo')
        ->select('id','descricao_tipo')
        ->get();

        return view('veiculo/editar_carro', ['carros' => $carro, 'tipos'=>$tipo]);
    }

     /*  Função para atualizar os dados da Carro.
        A variável $data guarda todos os valores passados no request.
        É atualizada a Carro com o $id passado através do request.
        Retorna a view "Veiculos-Carro" onde apresenta uma mensagem de sucesso.*/

    public function atualizar_carro(Request $request){

        $data = $request->all();

        Carros::findOrFail($request->id)->update($data);
        return redirect('veiculo/carro')->with('msg', 'Carro atualizado com sucesso!');

    }

     /*  Função para apagar a carro.
        É apagado o carro com o $id passado pelo request.
        Retorna a view "Veiculos-Carro" onde apresenta uma mensagem de sucesso.*/
        public function apagar_carro($id){
            Carros::findOrFail($id)->delete();
            return redirect('veiculo/carro')->with('msg', 'Carro apagado com sucesso!');
        }



}
