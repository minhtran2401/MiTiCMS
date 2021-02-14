<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Funds extends Model
{
    protected $table='funds';
    protected $primaryKey='id';
    protected $fillable = [
        'id_user',
        'funds_value',
        'name_funds',
        'detail_funds',
        'day_funds'
    ];

}
