<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class VPSService extends Model {

    protected $table='vps_service';
    protected $primaryKey='vps_id';
    protected $fillable = [
        'service_group_id',
        'service_type_id',
        'sku',
        'vps_name',
        'vps_profile',
        'display',
        'slug'
    ];
   
}

