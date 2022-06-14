<?php

namespace App\Http\Controllers;
use App\Models\Motorista;

use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    public function motorista(){
        $motorista= Motorista::paginate(4);

      /*  $tipomotorista = motorista::where('descricao_tipo',$motorista->cartacondu)->toArray();
      $tipo = motorista::where('cartacondu', $motorista->cartacondu)->get();*/

    return view('motorista/motorista', ['motorista' => $motorista]);
    }


        /*  Função responsável por renderizar a view Criar Notícia.*/
        public function criar_motorista(){
            return view('motorista/criar_motorista');
        }
    
        /*  Função responsável por enviar os dados para a Tabela "motorista".
            A variável $motorista é uma nova motorista. "motorista" é o Model.
            Preenche todos os campos da tabela "motorista" com os valores que vem no request
            Faz o save() para enviar os dados.
            Redireciona para a view "motorista-motorista" onde apresenta uma mensagem de sucesso.*/
        public function store(Request $request){
            $motorista = new Motorista;
    
            $motorista -> nome = $request->nome;
            $motorista -> nif= $request->nif;
            $motorista -> telefone = $request->telefone;
            $motorista -> email = $request->email; 
            $motorista -> cartacondu = $request->cartacondu;

          
           
    
    
            $motorista->save();
    
            return redirect('/motorista/motorista')->with('msg', 'motorista criado com sucesso!');
        }
    

    /*  Função para abrir a view motoristas, onde é passado um $id como parâmetro.
        A variável $motorista guarda a motorista com o $id passado como parâmetro.
        Retorna a view "motoristas - Editar ".*/

    public function editar_motorista($id){
        $motorista = Motorista::findOrFail($id);
        return view('motorista/editar_motorista', ['motorista' => $motorista]);
    }

     /*  Função para atualizar os dados da motorista.
        A variável $data guarda todos os valores passados no request.
        É atualizada a motorista com o $id passado através do request.
        Retorna a view "motoristas-motorista" onde apresenta uma mensagem de sucesso.*/

    public function atualizar_motorista(Request $request){

        $data = $request->all();

        Motorista::findOrFail($request->id)->update($data);
        return redirect('motorista/motorista')->with('msg', 'motorista atualizado com sucesso!');

    }

     /*  Função para apagar a motorista.
        É apagado o motorista com o $id passado pelo request.
        Retorna a view "motoristas-motorista" onde apresenta uma mensagem de sucesso.*/
        public function apagar_motorista($id){
            Motorista::findOrFail($id)->delete();
            return redirect('motorista/motorista')->with('msg', 'Motorista apagado com sucesso!');
        }
}
