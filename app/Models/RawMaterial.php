<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RawMaterial
 *
 * @property $id
 * @property $name
 * @property $unit
 * @property $current_stock
 * @property $created_at
 * @property $updated_at
 *
 * @property PizzaRawMaterial[] $pizzaRawMaterials
 * @property Purchase[] $purchases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RawMaterial extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'unit', 'current_stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pizzaRawMaterials()
    {
        return $this->hasMany(\App\Models\PizzaRawMaterial::class, 'id', 'raw_material_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchases()
    {
        return $this->hasMany(\App\Models\Purchase::class, 'id', 'raw_material_id');
    }
    
}
