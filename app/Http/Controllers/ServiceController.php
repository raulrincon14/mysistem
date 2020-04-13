<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;
use App\Provincia;
use App\Distrito;
use App\Services\Ruc\Sunat;
use App\Services\Dni\Dni;
use App\Services\Extras\ExchangeRate;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }
    public function dni($number)
    {
        $res = Dni::search($number);

        return $res;
    }
    public function ruc($number){
      $service = new Sunat();
       $res = $service->get($number);
       if ($res) {
          $idprovincia = Provincia::idByDescription($res->provincia);
              return [
                  'success' => true,
                  'data' => [
                      'name' => $res->razonSocial,
                      'trade_name' => $res->nombreComercial,
                      'address' => $res->direccion,
                      'phone' => implode(' / ', $res->telefonos),
                      'department' => ($res->departamento),
                      'department_id' => Departamento::idByDescription($res->departamento),
                      'province' => ($res->provincia),
                      'province_id' => $idprovincia,
                      'district' => ($res->distrito),
                      'district_id' => Distrito::idByDescription($res->distrito, $idprovincia),
                  ]
              ];
       }else {
             return [
                 'success' => false,
                 'message' => $service->getError()
             ];
       }
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
