<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productov;

class ProductovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $buscar = $request -> buscar;
       $productov = Productov::where('pr_nombre','like','%'. $buscar .'%')
       // ->limit(10);
       ->where('pr_nombre','like','%'. $buscar .'%')
       ->limit(10)
      ->paginate(10);
       return [
         'producto' => $productov
       ];
    }
    // public function buscar(Request $request){
    //    $buscar = $request -> buscar;
    //     $productov = Productov::where('pr_nombre','like','%'. $buscar .'%')
    //     ->limit(10);
    //     return  (string) $productov;
    // }

    public function buscar(Request $request, $number){
      // if (!$request->ajax()) return redirect('/');
      $productov = Productov::where('idproducto',$number)
                    ->orWhere('pr_cb', $number)
                    ->first();
      // $categoria = Categoria::where('ca_nombre','like','%'. $buscar .'%')->orderBy('idcategoria')->paginate(10);
          return ['producto' => $productov];
    }

}
