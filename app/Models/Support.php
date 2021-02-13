<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='contact';
    protected $primaryKey='id';
    protected $fillable = [
        'id_user',
        'subject',
        'content',
        'status',
    ];

  
}
