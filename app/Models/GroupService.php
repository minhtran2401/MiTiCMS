<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GroupService extends Model {

    protected $table='service_groups';
    protected $primaryKey='service_group_id';
    protected $fillable = [
        'service_group_name',
        'display',
        'slug'
    ];
   
}

