<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    
    protected $table = 'items';


    protected $primaryKey = 'id';

    protected $fillable = ['photo', 'category_id', 'product_code', 'description', 'quantity', 'dolour_rate', 'product_cost', 'discount', 'tax', 'clearance_charge', 'slmarket_price', 'selling_price'];

    public static function item_count(){
        return Item::count();
    }
}
