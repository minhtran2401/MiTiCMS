<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table='blog';
    protected $primaryKey='blog_id';
    protected $dates = ['blog_post_time']; //Khai báo các field kiểu ngày
    protected $fillable = [
        'blog_id',
        'blog_type_id',
        'blog_name',
        'blog_image',
        'blog_summary',
        'blog_post_time',
        'blog_content',
        'display',
        'slug',
        'blog_view',
        'user_id',
        'blog_tag',
        'blog_special',
    ];

    public function checkblogtype() {
        return $this->hasOne('App\Models\BlogType','blog_type_id','blog_type_id');
    }
}
