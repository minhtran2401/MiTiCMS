<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OSsystem extends Model
{
    protected $table='os_vps';
    protected $primaryKey='id';
    protected $fillable = [
        'name_os',
    ];
    
   
}
