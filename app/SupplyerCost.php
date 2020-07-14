<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplyerCost extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplyer_costs';

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
    protected $fillable = ['supplyer_id', 'name', 'order_id', 'price'];

    
}
