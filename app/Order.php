<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';


    protected $primaryKey = 'id';


    protected $fillable = ['date', 'month', 'deliverycompany_id', 'cart_items', 'shipment_code', 'deposit_type', 'first_payment', 'name', 'order_source' , 'Location_address', 'zone_id', 'telephone', 'notes', 'delivery_process'];


    public static function order_count(){
        return Order::count();
    }
    public function item(){
        return $this->belongsTo('App\Item');
    }
    public function zone(){
        return $this->belongsTo('App\Zone');
    }
    public function Dcompany(){
        return $this->belongsTo('App\Deliverycompany');
    }

}
