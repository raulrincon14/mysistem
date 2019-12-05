<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

      $buscar = $request -> buscar;
      if ($buscar=='') {
        $proveedor = Proveedor::orderBy('idproveedor')->paginate(10);
      }else {
        $proveedor = Proveedor::where('pro_nombre','like','%'. $buscar .'%')->orderBy('idproveedor')->paginate(10);
      }

      return [
        'pagination' => [
          'total'           => $proveedor->total(),
          'current_page'    => $proveedor->currentPage(),
          'per_page'        => $proveedor->perPage(),
          'last_page'       => $proveedor->lastPage(),
          'from'            => $proveedor->firstItem(),
          'to'              => $proveedor->lastItem(),
        ],
        'proveedor' => $proveedor
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
        $provedor = new Proveedor();
        $proveedor->pro_doc = $request->pro_doc;
        $proveedor->pro_docnum = $request->pro_docnum;
        $proveedor->pro_nombre = $request->pro_nombre;
        $proveedor->pro_razon = $request->pro_razon;
        $proveedor->pro_pais = $request->pro_pais;
        $proveedor->pro_departamento = $request->pro_departamento;
        $proveedor->pro_provincia = $request->pro_provincia;
        $proveedor->pro_distrito = $request->pro_distrito;
        $proveedor->pro_direccion = $request->pro_direccion;
        $proveedor->pro_telefono = $request->pro_telefono;
        $proveedor->pro_email = $request->pro_email;
        $proveedor->pro_web = $request->pro_web;
        $proveedor->ma_estado = '1';
        $proveedor->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
