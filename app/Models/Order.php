<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const STATUS = [
        0 => 'Pendente',
        1 => 'Entregue',
        2 => 'Cancelada',
    ];

    protected $fillable = ['customer_name', 'delivery_date', 'status', 'created_at','updated_at'];

    public function getStatusAttribute($value)
    {
        return self::STATUS[$value];
    }
}
