<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'key'];

    /**
     * The default category types.
     * 
     * @var array
     */
    const CATEGORY_TYPES = [
        ['name' => 'Danh mục', 'key' => 'category'],
        ['name' => 'Thẻ', 'key' => 'tag'],
    ];
}
