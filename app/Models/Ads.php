<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table="ads";
    protected $primaryKey="ads_id";
    protected $fillable=[
        'ads_name',
        'ads_image'
    ];
}
