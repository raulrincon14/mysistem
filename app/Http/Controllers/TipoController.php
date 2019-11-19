<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tipo = Tipo::all();
      return $tipo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $tipo = new Tipo();
      $tipo->ti_nombre = $request->ti_nombre;
      $tipo->ti_desc = $request->ti_desc;
      $tipo->ti_estado = '1';
      $tipo->save();
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
      $tipo = Tipo::findOrFail($request->idtipo);
      $tipo->ti_nombre = $request->ti_nombre;
      $tipo->ti_desc = $request->ti_desc;
      $tipo->ti_estado = '1';
      $tipo->save();
    }

    public function desactivar(Request $request)
    {
      $tipo = Tipo::findOrFail($request->idtipo);
      $tipo->ti_estado = '0';
      $tipo->save();

    }
    public function activar(Request $request)
    {
      $tipo = Tipo::findOrFail($request->idtipo);
      $tipo->ti_estado = '1';
      $tipo->save();

    }
}
