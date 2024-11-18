<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pizza
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property PizzaIngredient[] $pizzaIngredients
 * @property PizzaRawMaterial[] $pizzaRawMaterials
 * @property PizzaSize[] $pizzaSizes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pizza extends Model
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
        return $this->hasMany(\App\Models\PizzaIngredient::class, 'id', 'pizza_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pizzaRawMaterials()
    {
        return $this->hasMany(\App\Models\PizzaRawMaterial::class, 'id', 'pizza_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pizzaSizes()
    {
        return $this->hasMany(\App\Models\PizzaSize::class, 'id', 'pizza_id');
    }
    
}
