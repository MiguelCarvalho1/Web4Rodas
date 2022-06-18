<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario;
use App\Models\Agendamentos;
class CalendarioController extends Controller
{
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {

            $data = Agendamentos::get(['id', 'nome', 'data_inicio', 'data_fim']);

            
        return view('/calendario', ['agendamentos' => $data]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     
    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }*/
}
