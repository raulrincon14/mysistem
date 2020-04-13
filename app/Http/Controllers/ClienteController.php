<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      if (!$request->ajax()) return redirect('/');
      $buscar = $request -> buscar;
      if ($buscar=='') {
        $cliente = Cliente::orderBy('idcliente')->paginate(10);
      }else {
        $cliente = Cliente::where('cli_nombre','like','%'. $buscar .'%')->orderBy('idcliente')->paginate(10);
      }

      return [
        'pagination' => [
          'total'           => $cliente->total(),
          'current_page'    => $cliente->currentPage(),
          'per_page'        => $cliente->perPage(),
          'last_page'       => $cliente->lastPage(),
          'from'            => $cliente->firstItem(),
          'to'              => $cliente->lastItem(),
        ],
        'cliente' => $cliente
      ];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      // if (!$request->ajax()) return redirect('/');
        $cliente = new Cliente();
        $cliente->cli_doc = $request->cli_doc;
        $cliente->cli_docnum = $request->cli_docnum;
        $cliente->cli_nombre = $request->cli_nombre;
        $cliente->cli_razon = $request->cli_razon;
        $cliente->cli_pais = $request->cli_pais;
        $cliente->cli_departamento = $request->cli_departamento;
        $cliente->cli_provincia = $request->cli_provincia;
        $cliente->cli_distrito = $request->cli_distrito;
        $cliente->cli_direccion = $request->cli_direccion;
        $cliente->cli_telefono = $request->cli_telefono;
        $cliente->cli_email = $request->cli_email;
        $cliente->cli_web = $request->cli_web;
        $cliente->cli_estado = '1';
        $cliente->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
      $cliente = Cliente::findOrFail($request->idcliente);
      $cliente->cli_doc = $request->cli_doc;
      $cliente->cli_docnum = $request->cli_docnum;
      $cliente->cli_nombre = $request->cli_nombre;
      $cliente->cli_razon = $request->cli_razon;
      $cliente->cli_pais = $request->cli_pais;
      $cliente->cli_departamento = $request->cli_departamento;
      $cliente->cli_provincia = $request->cli_provincia;
      $cliente->cli_distrito = $request->cli_distrito;
      $cliente->cli_direccion = $request->cli_direccion;
      $cliente->cli_telefono = $request->cli_telefono;
      $cliente->cli_email = $request->cli_email;
      $cliente->cli_web = $request->cli_web;
      $cliente->cli_estado = '1';
      $cliente->save();
    }

    public function desactivar(Request $request){
      if (!$request->ajax()) return redirect('/');
      $cliente = Cliente::findOrFail($request->idcliente);
      $cliente->cli_estado = '0';
      $cliente->save();
    }

    public function activar(Request $request){
      if (!$request->ajax()) return redirect('/');
      $cliente = Cliente::findOrFail($request->idcliente);
      $cliente->cli_estado = '1';
      $cliente->save();
    }

// DB::table('planespago')->where('idCiclo', $idCiclo)->exists();
    public function repetido(Request $request, $rt){
      // if (!$request->ajax()) return redirect('/');
      // $aver=0;

      // if (!$request->ajax()) return redirect('/');
      // $cliente = Cliente::findOrFail($request->idcliente);
      // $record = new PersonResource(Person::findOrFail($id));
      //
      //   return $record;
      if ($cliente = Cliente::where('cli_docnum',$rt)->exists()) {
        return ['respuestan' => "si"];
        // code...
      // echo  $aver = 1;
      // echo "si";
        // $aver1="si";
      }else {
      // echo  $aver = 0;
      // echo "no";
      return ['respuestan' => "no"];
      }
// echo $aver1;
      // return $cliente;
      // $cliente->cli_estado = '1';
      // $cliente->save();
    }
}
