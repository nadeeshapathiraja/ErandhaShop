<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'category_id', 'deliverycompany_id', 'shipment_code', 'name', 'order_source', 'item_id', 'quantity', 'price', 'Location_address', 'city_id', 'telephone', 'notes', 'delivery_process'];


}
