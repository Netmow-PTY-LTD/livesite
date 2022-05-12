<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use softDeletes;

    //protected $fillable = ['business_category_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_acc_id');
    }
    public function user_accs()
    {
        return $this->belongsTo(UserAcc::class, 'user_acc_id');
    }
    
    public function services()
    {
        return $this->hasMany(Service::class, 'business_id');
    }
    
    public function staffs()
    {
        return $this->hasManyThrough(Staff::class, Service::class);
    }
    
    public function country(){
        return $this->hasOne(Country::class, 'id');
    }
    
    /*public function live_site_style(){
        return $this->hasOne(LiveSiteStyle::class);
    }*/
 

}
