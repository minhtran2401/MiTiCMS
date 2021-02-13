<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ServerService extends Model
{
    protected $table='server_service';
    protected $primaryKey='server_id';
    protected $fillable = [
        'service_group_id',
        'service_type_id',
        'sku',
        'server_image',
        'name',
        'server_profile',
        'display',
        'slug'
    ];

  
}
