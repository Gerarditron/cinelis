<?php

namespace App\Http\Controllers;

use App\Models\Cine;
use Illuminate\Http\Request;

/**
 * Class CineController
 * @package App\Http\Controllers
 */
class CineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cines = Cine::paginate();

        return view('cine.index', compact('cines'))
            ->with('i', (request()->input('page', 1) - 1) * $cines->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cine = new Cine();
        return view('cine.create', compact('cine'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cine::$rules);

        $cine = Cine::create($request->all());

        return redirect()->route('cines.index')
            ->with('success', 'Cine created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cine = Cine::find($id);

        return view('cine.show', compact('cine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cine = Cine::find($id);

        return view('cine.edit', compact('cine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cine $cine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cine $cine)
    {
        request()->validate(Cine::$rules);

        $cine->update($request->all());

        return redirect()->route('cines.index')
            ->with('success', 'Cine updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cine = Cine::find($id)->delete();

        return redirect()->route('cines.index')
            ->with('success', 'Cine deleted successfully');
    }
}
