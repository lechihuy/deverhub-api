<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'key'];

    /**
     * The default post types.
     * 
     * @var array
     */
    const POST_TYPES = [
        ['name' => 'Bài viết', 'key' => 'post'],
        ['name' => 'Trang', 'key' => 'page'],
    ];
}
