<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
  protected $table = 'lote';
  protected $primaryKey = 'idlote';
  protected $fillable = ['lote_nombre','lote_ven','lote_estado'];
  public $timestamps= false;
}
