<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ProductAttributeValues
 *
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\ProductAttribute|null $productAttribute
 * @method static \Database\Factories\ProductAttributeValuesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues query()
 * @mixin \Eloquent
 */
class ProductAttributeValues extends Model
{
    use HasFactory;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productAttribute(): BelongsTo
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
