<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public $table = 'orders';
 
    protected $fillable = ['name', 'customer_ID', 'location', 'outForDelivery', 'delivered'];
}
