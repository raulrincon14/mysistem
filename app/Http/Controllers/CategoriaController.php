<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categoria = Categoria::all();
      return $categoria;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $categoria = new Categoria();
      $categoria->ca_nombre = $request->ca_nombre;
      $categoria->ca_desc = $request->ca_desc;
      $categoria->ca_estado = '1';
      $categoria->save();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $categoria = Categoria::finOrFail($request->idcategoria);
      $categoria->ca_nombre = $request->ca_nombre;
      $categoria->ca_desc = $request->ca_desc;
      $categoria->ca_estado = '1';
      $categoria->save();

    }

    public function desactivar(Request $request)
    {
      $categoria = Categoria::finOrFail($request->idcategoria);
      $categoria->ca_estado = '0';
      $categoria->save();
    }

    public function activar(Request $request)
    {
      $categoria = Categoria::finOrFail($request->idcategoria);
      $categoria->ca_estado = '1';
      $categoria->save();
    }


}
