<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AccountService extends Model
{
    protected $table='account_service';
    protected $primaryKey='account_id';
    protected $fillable = [
        'service_group_id',
        'service_type_id',
        'sku',
        'account_image',
        'account_name',
        'account_info',
        'display',
        'slug'
    ];
}
