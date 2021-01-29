<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'order';
    protected $fillable = ['order_id','customer_name', 'product_name', 'currency', 'sales'];
}
