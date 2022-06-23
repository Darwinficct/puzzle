<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partida;
use Illuminate\Support\Facades\Auth;

class PartidaController extends Controller
{
    public function index()
    {
        return redirect('/');
    }

    public function store(Request $request)
    {
        $datosPartida = new Partida();

        if($request->hasFile('featured'))
        {
            $file = $request->file('featured');
            $destinationPath = 'images/featureds/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('featured')->move($destinationPath, $filename);
            $datosPartida->featured = $destinationPath . $filename;
        }

        $datosPartida->name = $request->name;
        $datosPartida->user_id = auth()->id();
        $datosPartida->save();
        return redirect()->to('/');
    }
}
