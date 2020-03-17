<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'items';

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
    protected $fillable = ['photo', 'category_id', 'product_code', 'description', 'quantity', 'dolour_rate', 'product_cost', 'discount', 'tax', 'clearance_charge', 'slmarket_price', 'selling_price'];

    
}
