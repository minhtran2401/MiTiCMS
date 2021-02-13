<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailAccount extends Model
{
    protected $table='detail_account';
    protected $primaryKey='id';
    protected $fillable = [
        'id_invoice',
        'detail_account',
        'day_start',
        'day_end',
    ];
}
