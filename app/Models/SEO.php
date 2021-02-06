<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table="seo";
    protected $primaryKey="id";
    protected $fillable=[
        'meta_name',
        'meta_content'
    ];
}
