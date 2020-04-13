<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
  protected $table = 'compra';
  protected $primaryKey = 'idcompra';
  protected $fillable = ['com_fecha','com_com','com_numcom','com_desc','com_moneda','com_estado'];

  public function proveedor(){
    return $this->belongsTo('App\Proveedor');
  }

  public function usuario(){
    return $this->belongsTo('App\Usuario');
  }
}
