<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    protected $table='incomes';
    protected $primaryKey='id';
    protected $fillable = [
        'id_user',
        'incomes_value',
        'name_incomes',
        'detail_incomes',
        'day_incomes'
    ];

}
