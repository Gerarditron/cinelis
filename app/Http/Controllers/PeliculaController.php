<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        return response()->json($peliculas, 200);
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
            'idCine' => 'required',
            'nombre' => 'required',
            'duracion' => 'required',
            'categoria' => 'required',
            'imagenURL' => 'required',
            'sinopsis' => 'required',
        ]);
        //create pelicula
        $pelicula = new Pelicula();
        $pelicula->idCine = $request->idCine;
        $pelicula->nombre = $request->nombre;
        $pelicula->duracion = $request->duracion;
        $pelicula->categoria = $request->categoria;
        $pelicula->imagenURL = $request->imagenURL;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->save();
        //return response
        return response()->json($pelicula, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);
        if(!$pelicula){
            return response()->json(['message' => 'Pelicula not found'], 404);
        }
        return response()->json($pelicula, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelicula = Pelicula::find($id);
        if(!$pelicula){
            return response()->json(['message' => 'Pelicula not found'], 404);
        }
        //validate request
        $request->validate([
            'idCine' => 'required',
            'nombre' => 'required',
            'duracion' => 'required',
            'categoria' => 'required',
            'imagenURL' => 'required',
            'sinopsis' => 'required',
        ]);
        //update pelicula
        $pelicula->idCine = $request->idCine;
        $pelicula->nombre = $request->nombre;
        $pelicula->duracion = $request->duracion;
        $pelicula->categoria = $request->categoria;
        $pelicula->imagenURL = $request->imagenURL;
        $pelicula->sinopsis = $request->sinopsis;
        $pelicula->save();
        //return response
        return response()->json($pelicula, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        if(!$pelicula){
            return response()->json(['message' => 'Pelicula not found'], 404);
        }
        $pelicula->delete();
        return response()->json(['message' => 'Pelicula deleted'], 200);
    }
    
}
