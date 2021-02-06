<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogType extends Model
{
    protected $table='blog_type';
    protected $primaryKey='blog_type_id';
    protected $fillable = [
        'blog_type_name',
        'display',
        'slug'
    ];
    
    public function checkblog() {
        return $this->hasMany('App\Models\Blog','blog_type_id','blog_type_id');
    }
}
