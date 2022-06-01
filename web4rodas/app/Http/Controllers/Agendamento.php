<?php

namespace App\Http\Controllers;
use App\Models\Agendamentos;

use Illuminate\Http\Request;

class Agendamento  extends Controller
{
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Agendamentos::whereDate('data_incio', '>=', $request->data_incio)
                       ->whereDate('data_fim',   '<=', $request->data_fim)
                       ->get(['id', 'descricao', 'data_incio', 'data_fim']);
  
             return response()->json($data);
        }
  
        return view('Calendario');
    }

    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $agendamentos = Agendamentos::create([
                  'descricao' => $request->descricao,
                  'data_incio' => $request->data_incio,
                  'data_fim' => $request->data_fim
              ]);
              return response()->json($agendamentos);
             break;
  
           case 'update':
              $agendamentos = Agendamentos::find($request->id)->update([
                'descricao' => $request->descricao,
                'data_incio' => $request->data_incio,
                'data_fim' => $request->data_fim
              ]);
 
              return response()->json($agendamentos);
             break;
  
           case 'delete':
              $agendamentos = Agendamentos::find($request->id)->delete();
  
              return response()->json($agendamentos);
             break;
             
           default:
             # code...
             break;
            }
        }

}
