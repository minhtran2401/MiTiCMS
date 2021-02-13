<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    protected $table='onlines';
    protected $primaryKey='id';
    protected $fillable = [
        'id',
        'session_id',
        'created_at',
        'updated_at'
    ];

}
