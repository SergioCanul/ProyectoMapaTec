<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
class MenuAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $departamento = Departamento::select('departamentos.id','departamentos.nombreDepartamento','departamentos.idedificio_fk','edificios.nombreEdificio','departamentos.encargado','departamentos.puestoTrabajo','departamentos.correo')
        ->join('edificios','idedificio_fk','=','edificios.id')
        ->where('departamentos.id','=',$id)->first();
        return view('menuadmin.show',compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
