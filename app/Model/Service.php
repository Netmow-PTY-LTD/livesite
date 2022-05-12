<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use softDeletes;

    //protected $fillable = ['business_category_name'];

    public function business()
    {
        return $this->belongsTo(Business::class,'business_id');
    }
 

}
