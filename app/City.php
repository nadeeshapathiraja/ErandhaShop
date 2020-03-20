<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'citys';

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
    protected $fillable = ['name', 'deliverycompany_id', 'zone_id', 'postal_code', 'price'];

    public function deliverycompany(){
        return $this->belongsTo('App\Deliverycompany');
    }
    public function zone(){
        return $this->belongsTo('App\Zone');
    }


}
