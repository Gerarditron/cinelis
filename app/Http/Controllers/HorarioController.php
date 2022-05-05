<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horario=Horario::all();
        return response()->json($horario, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'hora' => 'required',
            'formato' => 'required',
            'idPelicula' => 'required',
        ]);
        //create cine
        $horario = new Horario();
        $horario->hora = $request->hora;
        $horario->formato = $request->formato;
        $horario->idPelicula = $request->idPelicula;
        $horario->save();
        //return response
        return response()->json($horario, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        if(!$horario){
            return response()->json(['message' => 'Horario not found'], 404);
        }
        return response()->json($horario, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $horario = Horario::find($id);
        if(!$horario){
            return response()->json(['message' => 'Horario not found'], 404);
        }
        $horario->hora = $request->hora;
        $horario->formato = $request->formato;
        $horario->idPelicula = $request->idPelicula;
        $horario->save();
        return response()->json($horario, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horario = Horario::find($id);
        if(!$horario){
            return response()->json(['message' => 'Horario not found'], 404);
        }
        $horario->delete();
        return response()->json(['message' => 'Horario deleted'], 200);
    }
    
}
