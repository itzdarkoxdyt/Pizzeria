<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExtraIngredient
 *
 * @property $id
 * @property $name
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @property OrderExtraIngredient[] $orderExtraIngredients
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ExtraIngredient extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderExtraIngredients()
    {
        return $this->hasMany(\App\Models\OrderExtraIngredient::class, 'id', 'extra_ingredient_id');
    }
    
}
