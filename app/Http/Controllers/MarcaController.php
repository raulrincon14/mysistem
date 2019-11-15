<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca = Marca::all();
        return $marca;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Marca();
        $marca->ma_nombre = $request->nombre;
        $marca->ma_desc = $request->desc
        $marca->ma_estado= '1';
        $marca->save();
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
      $marca = Marca::findOrFail($request->idmarca);
      $marca->ma_nombre = $request->nombre;
      $marca->ma_desc = $request->desc
      $marca->ma_estado= '1';
      $marca->save();
    }
    public function desactivar(Request $request)
    {
      $marca = Marca::findOrFail($request->idmarca);
      $marca->ma_estado= '0';
      $marca->save();
    }
    public function activar(Request $request)
    {
      $marca = Marca::findOrFail($request->idmarca);
      $marca->ma_estado= '1';
      $marca->save();
    }

}
