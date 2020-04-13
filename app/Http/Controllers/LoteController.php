<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lote;

class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $buscar = $request -> buscar;
     if ($buscar=='') {
       $lote = Lote::orderBy('idlote')->paginate(10);
     }else {
       $lote = Lote::where('lote_nombre','like','%'. $buscar .'%')->orderBy('idlote')->paginate(10);
     }

     return [
       'pagination' => [
         'total'           => $lote->total(),
         'current_page'    => $lote->currentPage(),
         'per_page'        => $lote->perPage(),
         'last_page'       => $lote->lastPage(),
         'from'            => $lote->firstItem(),
         'to'              => $lote->lastItem(),
       ],
       'lote' => $lote
     ];
    }

    public function selectLote(Request $request){
        // if (!$request->ajax()) return redirect('/');
         $filtro = $request->filtro;
         $lotes = Lote::where('lote_nombre','like','%'. $filtro .'%')
         ->Where('lote_estado', '1')
         ->orderby('idlote','asc')->get();
         return ['lotes' => $lotes];
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
      $lote = new Lote();
      $lote->lote_nombre = $request->lote_nombre;
      $lote->lote_ven = $request->lote_ven;
      $lote->lote_estado = "1";
      $lote->save();
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
      $lote = Lote::findOrFail($request->idlote);
      $lote->lote_nombre = $request->lote_nombre;
      $lote->lote_ven = $request->lote_ven;
      $lote->save();
    }

    public function desactivar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $lote = Lote::findOrFail($request->idlote);
      $lote->lote_estado = '0';
      $lote->save();
    }

    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $lote = Lote::findOrFail($request->idlote);
      $lote->lote_estado = '1';
      $lote->save();
    }

}
