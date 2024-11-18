<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PizzaIngredient
 *
 * @property $id
 * @property $pizza_id
 * @property $ingredient_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ingredient $ingredient
 * @property Pizza $pizza
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PizzaIngredient extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pizza_id', 'ingredient_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ingredient()
    {
        return $this->belongsTo(\App\Models\Ingredient::class, 'ingredient_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pizza()
    {
        return $this->belongsTo(\App\Models\Pizza::class, 'pizza_id', 'id');
    }
    
}
