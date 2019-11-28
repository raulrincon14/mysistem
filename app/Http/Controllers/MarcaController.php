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
    public function index(Request $request)
    {
      // if (!$request->ajax()) return redirect('/');
     // $marca = Marca::all();
     $buscar = $request -> buscar;
     // $marca = Marca::paginate(10);
     if ($buscar=='') {
       $marca = Marca::orderBy('idmarca')->paginate(3);
     }else {
       $marca = Marca::where('ma_nombre','like','%'. $buscar .'%')->orderBy('idmarca')->paginate(10);
     }

     return [
       'pagination' => [
         'total'           => $marca->total(),
         'current_page'    => $marca->currentPage(),
         'per_page'        => $marca->perPage(),
         'last_page'       => $marca->lastPage(),
         'from'            => $marca->firstItem(),
         'to'              => $marca->lastItem(),
       ],
       'marca' => $marca
     ];

    }

    public function selectMarca(Request $request){
      // if (!$request->ajax()) return redirect('/');
      $marca = Marca::where('ma_estado','=','1')
      ->select('idmarca','ma_nombre')->orderBy('idmarca')->get();
      return ['marca' => $marca];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
        $marca = new Marca();
        $marca->ma_nombre = $request->ma_nombre;
        $marca->ma_desc = $request->ma_desc;
        $marca->ma_estado = '1';
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
      if (!$request->ajax()) return redirect('/');
      $marca = Marca::findOrFail($request->idmarca);
      $marca->ma_nombre = $request->ma_nombre;
      $marca->ma_desc = $request->ma_desc;
      $marca->ma_estado = '1';
      $marca->save();
    }
    public function desactivar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $marca = Marca::findOrFail($request->idmarca);
      $marca->ma_estado = '0';
      $marca->save();

    }
    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $marca = Marca::findOrFail($request->idmarca);
      $marca->ma_estado = '1';
      $marca->save();

    }

}
