<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DomainService extends Model
{
    protected $table='domain_service';
    protected $primaryKey='domain_id';
    protected $fillable = [
        'sku',
        'price_show',
        'domain_type',
        'domain_image',
        'domain_name',
        'status',
        'slug',
    ];
}
