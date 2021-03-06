<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Disabled timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Mass fillable field
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Hide some attributes
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at'
    ];

    /**
     * Relationship to products table
     *
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}
