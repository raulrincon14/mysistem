<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $unidad = Unidad::all();
      return $unidad;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $unidad = new Unidad();
      $unidad->u_nombre = $request->u_nombre;
      $unidad->u_abre = $request->u_abre;
      $unidad->u_estado = '1';
      $unidad->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $unidad = Marca::findOrFail($request->idunidad);
      $unidad->u_nombre = $request->u_nombre;
      $unidad->u_abre = $request->u_abre;
      $unidad->u_estado = '1';
      $unidad->save();
    }

    public function desactivar(Request $request)
    {
      $unidad = Unidad::findOrFail($request->idunidad);
      $unidad->u_estado = '0';
      $unidad->save();

    }
    public function activar(Request $request)
    {
      $unidad = Tipo::findOrFail($request->idunidad);
      $unidad->u_estado = '1';
      $unidad->save();

    }
}
