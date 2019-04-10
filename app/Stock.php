<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $table = 'stock';

    protected $fillable = ['item_ID', 'item_name', 'item_price', 'item_quantity', 'supplier_ID'];
    
}
