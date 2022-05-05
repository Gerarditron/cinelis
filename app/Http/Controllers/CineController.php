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
        $cines = Cine::all();
        $cinesInfo = [];
        foreach($cines as $cine){
            $cinesInfo[] = [
                'idCine' => $cine->idCine,
                'nombre' => $cine->nombre,
                'ubicacion' => $cine->ubicacion,
                'peliculas' => $cine->peliculas()->count(),
            ];
        }
        return response()->json($cinesInfo, 200);
    }
    
}
