<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table='service_price';
    protected $primaryKey='service_price_id';
    protected $fillable = [
        'service_group_id',
        'service_type_id',
        'sku',
        'service_price',
        'service_time',
        'slug'
    ];
}
