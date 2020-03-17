<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneytransaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'moneytransactions';

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
    protected $fillable = ['item_id', 'total_clearance', 'value_with_offer', 'total_cost', 'rs_value', 'product_cost', 'total_product_cost'];

    
}
