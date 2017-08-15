<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'id_empresa', 'id_tipo_usuario'
    ];
}
