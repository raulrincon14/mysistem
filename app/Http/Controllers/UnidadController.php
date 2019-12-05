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
    public function index(Request $request)
    {
      // if (!$request->ajax()) return redirect('/');
     // $categoria = Categoria::all();
     $buscar = $request -> buscar;
     // $categoria = Categoria::paginate(10);
     if ($buscar=='') {
       $unidad = Unidad::orderBy('idunidad')->paginate(10);
     }else {
       $unidad = Unidad::where('u_nombre','like','%'. $buscar .'%')->orderBy('idunidad')->paginate(3);
     }

     return [
       'pagination' => [
         'total'           => $unidad->total(),
         'current_page'    => $unidad->currentPage(),
         'per_page'        => $unidad->perPage(),
         'last_page'       => $unidad->lastPage(),
         'from'            => $unidad->firstItem(),
         'to'              => $unidad->lastItem(),
       ],
       'unidad' => $unidad
     ];
    }

    public function selectUnidad(Request $request){
      // if (!$request->ajax()) return redirect('/');
      $unidad = Unidad::where('u_estado','=','1')
      ->select('idunidad','u_nombre')->orderBy('idunidad')->get();
      return ['unidad' => $unidad];
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
    public function update(Request $request)
    {
      $unidad = Unidad::findOrFail($request->idunidad);
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
      $unidad = Unidad::findOrFail($request->idunidad);
      $unidad->u_estado = '1';
      $unidad->save();

    }
}
