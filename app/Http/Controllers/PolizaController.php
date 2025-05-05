<?php

namespace App\Http\Controllers;

use App\Models\Poliza;
use Illuminate\Http\Request;

class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \App\Models\Poliza::all();
    }

    public function store(Request $request)
    {
        $poliza = Poliza::create($request->all());
        return response()->json($poliza, 201);
    }

    public function show($id)
    {
        return Poliza::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $poliza = Poliza::findOrFail($id);
        $poliza->update($request->all());
        return response()->json($poliza, 200);
    }

    public function destroy($id)
    {
        Poliza::destroy($id);
        return response()->json(null, 204);
    }
}
