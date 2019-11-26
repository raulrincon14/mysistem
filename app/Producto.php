<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = 'producto';
  protected $primaryKey = 'idproducto';
  protected $fillable = ['pr_nombre','pr_desc','pr_precioc','pr_preciov','pr_estado','pr_cb','pr_stkmin','pr_meida','pr_igv'];

  public function categoria(){
    return $this->belongsTo('App\Categoria');
  }

  public function marca(){
    return $this->belongsTo('App\Marca');
  }

  public function tipo(){
    return $this->belongsTo('App\Tipo');
  }

  public function unidad(){
    return $this->belongsTo('App\Unidad');
  }
}
