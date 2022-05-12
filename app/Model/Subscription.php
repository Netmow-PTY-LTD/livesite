<?php

namespace App\Model;

use App\User;
use App\Model\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
	public function user(){
        return $this->belongsTo(User::class);
    }
    public function plan(){
        return $this->belongsTo(Plan::class, 'stripe_price', 'stripe_plan');
    }
}
