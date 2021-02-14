<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class InfoSite extends Model
{
    protected $table="miti_info";
    protected $primaryKey="id";
    protected $fillable=[
        'logo',
        'name',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'ads',
        'protect',
        'status'
    ];
}
