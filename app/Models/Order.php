<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $client_id
 * @property $branch_id
 * @property $total_price
 * @property $status
 * @property $delivery_type
 * @property $delivery_person_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Branch $branch
 * @property Client $client
 * @property Employee $employee
 * @property OrderExtraIngredient[] $orderExtraIngredients
 * @property OrderPizza[] $orderPizzas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['client_id', 'branch_id', 'total_price', 'status', 'delivery_type', 'delivery_person_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class, 'branch_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'delivery_person_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderExtraIngredients()
    {
        return $this->hasMany(\App\Models\OrderExtraIngredient::class, 'id', 'order_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderPizzas()
    {
        return $this->hasMany(\App\Models\OrderPizza::class, 'id', 'order_id');
    }
    
}
