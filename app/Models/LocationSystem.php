<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LocationSystem extends Model
{
    protected $table='location_vps';
    protected $primaryKey='id';
    protected $fillable = [
        'name_location',
    ];
    
   
}
