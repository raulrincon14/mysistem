<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  protected $table = 'users';
  protected $primaryKey = 'idusuario';
  protected $fillable = ['usu_nombre','usu_doc','usu_numdoc','usu_ciudad','usu_direc','usu_cel','usu_desc','usu_nac','usu_usuario','remember_token','usu_pass','usu_estado'];

  protected $hidden = [
      'usu_pass', 'remember_token',
  ];

  public $timestamps= false;
}
