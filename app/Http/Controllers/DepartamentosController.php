<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Provincia;
use App\Distrito;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
      // $provincias = Provincia::where('departamento_iddepartamento',2)
      //               ->get();
      // return ['provincias' => $provincias];
                    // ->orderBy('vincia_nombre');
        // $departamentos = Departamento::all();
        //     return ['departamentos' => $departamentos];
        // return $departamentos;
    }

    public function Departamentos(Request $request){
      if (!$request->ajax()) return redirect('/');
      $departamentos = Departamento::all();
          return ['departamentos' => $departamentos];
    }

    public function Provincias(Request $request, $number){
      if (!$request->ajax()) return redirect('/');
      $provincias = Provincia::where('departamento_iddepartamento',$number)
                    ->get();
      // $categoria = Categoria::where('ca_nombre','like','%'. $buscar .'%')->orderBy('idcategoria')->paginate(10);
          return ['provincias' => $provincias];
    }
    public function Distritos(Request $request, $number){
      if (!$request->ajax()) return redirect('/');
      $distritos = Distrito::where('provincia_idprovincia',$number)
                    ->get();
      // $categoria = Categoria::where('ca_nombre','like','%'. $buscar .'%')->orderBy('idcategoria')->paginate(10);
          return ['distritos' => $distritos];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
