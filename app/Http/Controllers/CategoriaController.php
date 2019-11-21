<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
// use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
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
      $categoria = Categoria::paginate(2);
      return [
        'pagination' => [
          'total'           => $categoria->total(),
          'current_page'    => $categoria->currentPage(),
          'per_page'        => $categoria->perPage(),
          'last_page'       => $categoria->lastPage(),
          'from'            => $categoria->firstItem(),
          'to'              => $categoria->lastItem(),
        ],
        'categoria' => $categoria
      ];
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
      if (!$request->ajax()) return redirect('/');
      $categoria = Categoria::findOrFail($request->idcategoria);
      $categoria->ca_nombre = $request->ca_nombre;
      $categoria->ca_desc = $request->ca_desc;
      $categoria->ca_estado = '1';
      $categoria->save();

    }

    public function desactivar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $categoria = Categoria::findOrFail($request->idcategoria);
      $categoria->ca_estado = '0';
      $categoria->save();
    }

    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $categoria = Categoria::findOrFail($request->idcategoria);
      $categoria->ca_estado = '1';
      $categoria->save();
    }


}
