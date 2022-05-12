<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use softDeletes;
    
    public function business()
    {
        return $this->belongsTo(Business::class, 'b_country_id');
    }
    
}
