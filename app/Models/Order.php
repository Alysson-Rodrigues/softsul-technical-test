<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected const STATUS = [
        0 => 'Pending',
        1 => 'Delivered',
        2 => 'Canceled',
    ];
    
    protected $fillable = ['customer_name', 'delivery_date', 'status', 'updated_at'];

    public function getStatusAttribute($value)
    {
        return self::STATUS[$value];
    }
}
