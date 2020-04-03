<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverycompany extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'deliverycompanys';

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
    protected $fillable = ['name','maxweight','additional','cod_less','cod_above'];


}
