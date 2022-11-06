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
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $value
 * @property int $product_id
 * @property int $product_attribute_id
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues whereProductAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductAttributeValues whereValue($value)
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
