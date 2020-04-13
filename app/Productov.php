<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productov extends Model
{
      protected $table = 'vproducto';
      protected $primaryKey = 'idproducto';
      protected $fillable = ['pr_nombre','pr_desc','pr_precioc','pr_preciov','pr_estado','pr_cb','pr_stkmin','pr_meida','pr_igv',
      'idcategoria','ca_nombre','ca_estado','idmarca','idmarca','ma_nombre','ma_estado','idtipo','ti_nombre','ti_estado','idunidad','u_nombre',
      'u_abre','u_estado'];
}
