<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dcompra extends Model
{
  protected $table = 'dcompra';
  // protected $primaryKey = 'idcompra';
  protected $fillable = ['cantidad','precio'];

  public function producto(){
    return $this->belongsTo('App\Producto');
  }

  public function compra(){
    return $this->belongsTo('App\Compra');
  }

  public function lote(){
    return $this->belongsTo('App\Lote');
  }

}
