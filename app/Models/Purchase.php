<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Purchase
 *
 * @property $id
 * @property $supplier_id
 * @property $raw_material_id
 * @property $quantity
 * @property $purchase_price
 * @property $purchase_date
 * @property $created_at
 * @property $updated_at
 *
 * @property RawMaterial $rawMaterial
 * @property Supplier $supplier
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Purchase extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['supplier_id', 'raw_material_id', 'quantity', 'purchase_price', 'purchase_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rawMaterial()
    {
        return $this->belongsTo(\App\Models\RawMaterial::class, 'raw_material_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'supplier_id', 'id');
    }
    
}
