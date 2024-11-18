<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PizzaSize
 *
 * @property $id
 * @property $pizza_id
 * @property $size
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property Pizza $pizza
 * @property OrderPizza[] $orderPizzas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PizzaSize extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pizza_id', 'size', 'price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pizza()
    {
        return $this->belongsTo(\App\Models\Pizza::class, 'pizza_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPizzas()
    {
        return $this->hasMany(\App\Models\OrderPizza::class, 'id', 'pizza_size_id');
    }
    
}
