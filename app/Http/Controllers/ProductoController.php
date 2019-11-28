<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      // if (!$request->ajax()) return redirect('/');
     // $buscar = '';
     $buscar = $request -> buscar;
     if ($buscar=='') {
       $producto = Producto::join('categoria','producto.categoria_idcategoria','=','idcategoria')
       ->join('marca','producto.marca_idmarca','=','idmarca')
       ->join('tipo','producto.tipo_idtipo','=','idtipo')
       ->join('unidad','producto.unidad_idunidad','=','idunidad')
       ->select('producto.idproducto','categoria.idcategoria','marca.idmarca','marca.ma_nombre','tipo.idtipo','tipo.ti_nombre','unidad.idunidad','unidad.u_nombre',
       'producto.pr_nombre','categoria.ca_nombre','producto.pr_desc','producto.pr_precioc','producto.pr_preciov','producto.pr_cb','producto.pr_medida',
       'producto.pr_estado','producto.pr_stkmin','pr_igv')
        ->orderBy('idproducto')->paginate(10);
     }else {
       $producto = Producto::join('categoria','producto.categoria_idcategoria','=','idcategoria')
       ->join('marca','producto.marca_idmarca','=','idmarca')
       ->join('tipo','producto.tipo_idtipo','=','idtipo')
       ->join('unidad','producto.unidad_idunidad','=','idunidad')
       ->select('producto.idproducto','categoria.idcategoria','marca.idmarca','marca.ma_nombre','tipo.idtipo','tipo.ti_nombre','unidad.idunidad','unidad.u_nombre',
       'producto.pr_nombre','categoria.ca_nombre','producto.pr_desc','producto.pr_precioc','producto.pr_preciov','producto.pr_cb','producto.pr_medida',
       'producto.pr_estado','producto.pr_stkmin','pr_igv')
        ->where('pr_nombre','like','%'. $buscar .'%')
        ->orderBy('idproducto')->paginate(10);
     }

     return [
       'pagination' => [
         'total'           => $producto->total(),
         'current_page'    => $producto->currentPage(),
         'per_page'        => $producto->perPage(),
         'last_page'       => $producto->lastPage(),
         'from'            => $producto->firstItem(),
         'to'              => $producto->lastItem(),
       ],
       'producto' => $producto
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
      $producto = new Producto();
      $producto->pr_nombre = $request->pr_nombre;
      $producto->pr_desc = $request->pr_desc;
      $producto->pr_precioc = $request->pr_precioc;
      $producto->pr_preciov = $request->pr_preciov;
      $producto->pr_estado = '1';
      $producto->pr_cb = $request->pr_cb;
      $producto->pr_stkmin = $request->pr_stkmin;
      $producto->pr_medida = $request->pr_medida;
      $producto->pr_igv = $request->pr_igv;
      $producto->categoria_idcategoria = $request->idcategoria;
      $producto->marca_idmarca = $request->idmarca;
      $producto->tipo_idtipo = $request->idtipo;
      $producto->unidad_idunidad = $request->idunidad;
      $producto->save();
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
      // if (!$request->ajax()) return redirect('/');

      // $producto = Producto::findOrFail('$request->idproducto');
      // $producto = Producto::findOrFail('26');
      // $producto->pr_nombre = $request->pr_nombre;
      // $producto->save();
      // if (!$request->ajax()) return redirect('/');
      $producto =  Producto::findOrFail($request->idproducto);

      $producto->pr_nombre = $request->pr_nombre;
      $producto->pr_desc = $request->pr_desc;
      $producto->pr_precioc = $request->pr_precioc;
      $producto->pr_preciov = $request->pr_preciov;
      $producto->pr_estado = '1';
      $producto->pr_cb = $request->pr_cb;
      $producto->pr_stkmin = $request->pr_stkmin;
      $producto->pr_medida = $request->pr_medida;
      $producto->pr_igv = $request->pr_igv;
      $producto->categoria_idcategoria = $request->idcategoria;
      $producto->marca_idmarca = $request->idmarca;
      $producto->tipo_idtipo = $request->idtipo;
      $producto->unidad_idunidad = $request->idunidad;
      $producto->save();
    }

    public function desactivar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $producto = Producto::findOrFail($request->idproducto);
      $producto->pr_estado = '0';
      $producto->save();
    }

    public function activar(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      $producto = Producto::findOrFail($request->idproducto);
      $producto->pr_estado = '1';
      $producto->save();
    }
}
