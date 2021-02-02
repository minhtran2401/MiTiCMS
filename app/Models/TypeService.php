<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model {

    protected $table='service_types';
    protected $primaryKey='service_type_id';
    protected $fillable = [
        'service_group_id',
        'service_type_name',
        'display',
        'slug'
    ];
    public function checkvps() {
        return $this->hasMany('App\Models\VPSService','service_type_id','service_type_id');
    }
}

