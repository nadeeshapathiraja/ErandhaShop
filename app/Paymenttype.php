<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paymenttypes';

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
    protected $fillable = ['order_id', 'name', 'deposit_type', 'amount'];

    
}
