<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LogAdmin extends Model {

    protected $table='logadmin';
    protected $primaryKey='id';
    protected $fillable = [
        'id_user',
        'task',
    ];
   
}

