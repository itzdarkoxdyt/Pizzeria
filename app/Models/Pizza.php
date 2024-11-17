<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relaciones
    public function pizzaSizes()
    {
        return $this->hasMany(PizzaSize::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }

    public function rawMaterials()
    {
        return $this->belongsToMany(RawMaterial::class, 'pizza_raw_material');
    }
}