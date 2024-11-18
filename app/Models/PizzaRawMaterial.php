<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PizzaRawMaterial
 *
 * @property $id
 * @property $pizza_id
 * @property $raw_material_id
 * @property $quantity
 * @property $created_at
 * @property $updated_at
 *
 * @property Pizza $pizza
 * @property RawMaterial $rawMaterial
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PizzaRawMaterial extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['pizza_id', 'raw_material_id', 'quantity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pizza()
    {
        return $this->belongsTo(\App\Models\Pizza::class, 'pizza_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rawMaterial()
    {
        return $this->belongsTo(\App\Models\RawMaterial::class, 'raw_material_id', 'id');
    }
    
}
