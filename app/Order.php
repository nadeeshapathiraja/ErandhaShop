<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';


    protected $primaryKey = 'id';


    protected $fillable = ['date', 'month', 'category_id', 'deliverycompany_id', 'shipment_code', 'name', 'order_source', 'item_id', 'quantity', 'price', 'Location_address', 'city_id', 'telephone', 'notes', 'delivery_process'];


    public static function order_count(){
        return Order::count();
    }
    public function item(){
        return $this->belongsTo('App\Item');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    
}
