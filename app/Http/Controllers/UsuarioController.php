<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // if (!$request->ajax()) return redirect('/');
      $buscar = $request -> buscar;

      if ($buscar=='') {
        $usuario = Usuario::orderBy('idusuario')->paginate(10);
      }else {
        $usuario = Usuario::where('usu_nombre','like','%'. $buscar .'%')->orderBy('idusuario')->paginate(10);
      }

      return [
        'pagination' => [
          'total'           => $usuario->total(),
          'current_page'    => $usuario->currentPage(),
          'per_page'        => $usuario->perPage(),
          'last_page'       => $usuario->lastPage(),
          'from'            => $usuario->firstItem(),
          'to'              => $usuario->lastItem(),
        ],
        'usuario' => $usuario
      ];
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
       if (!$request->ajax()) return redirect('/');
       $usuario = new Usuario();
       $usuario->usu_nombre = $request->usu_nombre;
       $usuario->usu_doc = $request->usu_doc;
       $usuario->usu_numdoc = $request->usu_numdoc;
       $usuario->usu_ciudad = $request->usu_ciudad;
       $usuario->usu_direc = $request->usu_direc;
       $usuario->usu_cel = $request->usu_cel;
       $usuario->usu_desc = $request->usu_desc;
       $usuario->usu_nac = $request->usu_nac;
       $usuario->usu_usuario = $request->usu_usuario;
       $usuario->remember_token = $request->remember_token;
       $usuario->usu_pass = bcrypt($request->usu_pass);
       $usuario->usu_estado = "1";
       // $user->password = bcrypt($request->password);
       $usuario->save();

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
      $usuario = Usuario::findOrFail($request->idusuario);
      $usuario->usu_nombre = $request->usu_nombre;
      $usuario->usu_doc = $request->usu_doc;
      $usuario->usu_numdoc = $request->usu_numdoc;
      $usuario->usu_ciudad = $request->usu_ciudad;
      $usuario->usu_direc = $request->usu_direc;
      $usuario->usu_cel = $request->usu_cel;
      $usuario->usu_desc = $request->usu_desc;
      $usuario->usu_nac = $request->usu_nac;
      // $usuario->usu_usuario = $request->usu_usuario;
      // $usuario->remember_token = "";
      // $usuario->usu_pass = bcrypt($request->usu_pass);
      // $usuario->usu_estado = "1";
      // $user->password = bcrypt($request->password);
      $usuario->save();
    }

    public function desactivar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $usuario = Usuario::findOrFail($request->idusuario);
      $usuario->usu_estado = '0';
      $usuario->save();
    }

    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $usuario = Usuario::findOrFail($request->idusuario);
      $usuario->usu_estado = '1';
      $usuario->save();
    }
}
