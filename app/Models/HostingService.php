<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class HostingService extends Model
{
    protected $table='hosting_service';
    protected $primaryKey='hosting_id';
    protected $fillable = [
        'service_group_id',
        'service_type_id',
        'sku',
        'hosting_image',
        'hosting_name',
        'hosting_profile',
        'display',
        'slug'
    ];
}
