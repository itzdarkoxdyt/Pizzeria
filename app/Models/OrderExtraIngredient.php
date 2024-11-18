<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderExtraIngredient
 *
 * @property $id
 * @property $order_id
 * @property $extra_ingredient_id
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @property ExtraIngredient $extraIngredient
 * @property Order $order
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderExtraIngredient extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['order_id', 'extra_ingredient_id', 'quantity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function extraIngredient()
    {
        return $this->belongsTo(\App\Models\ExtraIngredient::class, 'extra_ingredient_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }
    
}
