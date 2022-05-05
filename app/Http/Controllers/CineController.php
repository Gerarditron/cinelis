<?php

namespace App\Http\Controllers;

use App\Models\Cine;
use Illuminate\Http\Request;

class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cines = Cine::all();
        return response()->json($cines, 200);
    }
    public function store(Request $request){
        //validate request
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
        ]);
        //create cine
        $cine = new Cine();
        $cine->nombre = $request->nombre;
        $cine->ubicacion = $request->ubicacion;
        $cine->save();
        //return response
        return response()->json($cine, 201);
    }

    public function show($id){
        $cine = Cine::find($id);
        if(!$cine){
            return response()->json(['message' => 'Cine not found'], 404);
        }
        return response()->json($cine, 200);
    }

    public function update(Request $request, $id){
        $cine = Cine::find($id);
        if(!$cine){
            return response()->json(['message' => 'Cine not found'], 404);
        }
        $cine->nombre = $request->nombre;
        $cine->ubicacion = $request->ubicacion;
        $cine->save();
        return response()->json($cine, 200);
    }

    public function destroy($id){
        $cine = Cine::find($id);
        if(!$cine){
            return response()->json(['message' => 'Cine not found'], 404);
        }
        $cine->delete();
        return response()->json(['message' => 'Cine deleted'], 200);
    }

    public function getCinesInfo(){
        $cines = Cine::join('peliculas', 'cines.id', '=', 'peliculas.idCine')
        ->join('horarios', 'peliculas.id', '=', 'horarios.idPelicula')
        ->select('cines.id', 'cines.nombre', 'cines.ubicacion', 'peliculas.id as idPelicula', 'peliculas.nombre as nombrePelicula', 'horarios.id as idHorario', 'horarios.hora','horarios.formato')
        ->get();
        return response()->json($cines, 200);
    }
    
}
