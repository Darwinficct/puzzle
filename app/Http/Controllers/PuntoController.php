<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\puntaje;
use App\Models\partida;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PuntoController extends Controller
{
    public function index ()
    {
        return redirect('/');
    }
    

    public function store(Request $request)
    {
        

         DB::table('puntajes')->insert(['acierto'=> $request->acierto,'fallo'=>$request->fallo,'partida_name'=> $request->partida_name,'user_name'=>auth()->user()->name]);

        /*$puntos = new puntaje();
        $puntos->acierto = $request->acierto;
        $puntos->fallo = $request->fallo;
        $puntos->user_id = auth()->id();
        $puntos->partida_id = $request->partida_id;
        $puntos->save();*/
        return redirect()->to('/');
    }
}
