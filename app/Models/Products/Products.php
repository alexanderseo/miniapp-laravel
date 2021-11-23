<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $name
 * @property string $content
 */
class Products extends Model {

    protected $fillable = ['name', 'title', 'slug', 'content',];
}
