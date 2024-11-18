<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPizza
 *
 * @property $id
 * @property $order_id
 * @property $pizza_size_id
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @property Order $order
 * @property PizzaSize $pizzaSize
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class OrderPizza extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['order_id', 'pizza_size_id', 'quantity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class, 'order_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pizzaSize()
    {
        return $this->belongsTo(\App\Models\PizzaSize::class, 'pizza_size_id', 'id');
    }
    
}
