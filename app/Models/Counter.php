<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    protected $table='counters';
    protected $primaryKey='id';
    protected $fillable = [
        'ip',
        'time',
        'created_at',
        'updated_at'
    ];

}
