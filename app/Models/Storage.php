<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $table='storage_account';
    protected $primaryKey='id';
    protected $fillable = [
        'id_user',
        'name_account',
        'detail_account',
       
    ];

}
