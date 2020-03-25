<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplyer extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'supplyers';

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
    protected $fillable = ['name', 'country', 'category_id', 'item_id', 'quantity'];


}
