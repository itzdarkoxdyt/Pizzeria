<?php


class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address',
        'phone',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}