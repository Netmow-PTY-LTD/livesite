<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceCategory extends Model
{
    use SoftDeletes;

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
    
    
   // public function services()
   // {
   //     return $this->hasMany(Service::class);
   // }

}
