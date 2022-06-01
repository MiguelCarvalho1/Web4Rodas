<?php

namespace App\Http\Controllers;
use App\Models\Agendamentos;

use Illuminate\Http\Request;

class Agendamento extends Controller
{
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Agendamentos::whereDate('start', '>=', $request->dataincio)
                       ->whereDate('end',   '<=', $request->datafim)
                       ->get(['id', 'title', 'start', 'end']);
  
             return response()->json($data);
        }
  
        return view('Calendario');
    }

    public function ajax(Request $request)
    {
 
        switch ($request->type) {
           case 'add':
              $agendamentos = Agendamentos::create([
                  'title' => $request->descricao,
                  'start' => $request->dataincio,
                  'end' => $request->datafim
              ]);
              return response()->json($agendamentos);
             break;
  
           case 'update':
              $agendamentos = Agendamentos::find($request->id)->update([
                'title' => $request->descricao,
                'start' => $request->dataincio,
                'end' => $request->datafim
              ]);
 
              return response()->json($agendamentos);
             break;
  
           case 'delete':
              $event = Agendamentos::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
            }
        }

}
