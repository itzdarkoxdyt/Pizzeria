<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingredient
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property PizzaIngredient[] $pizzaIngredients
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ingredient extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pizzaIngredients()
    {
        return $this->hasMany(\App\Models\PizzaIngredient::class, 'id', 'ingredient_id');
    }
    
}
