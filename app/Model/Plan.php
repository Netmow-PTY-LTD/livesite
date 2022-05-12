<?php

namespace App\Model;

use Stripe\Stripe;
use App\Model\Subscription;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'stripe_plan',
        'stripe_product',
        'cost',
        'billing_interval',
        'currency',
        'description'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getStripePlans()
    {
        // Set the API Key
        // Stripe::setApiKey(User::getStripeKey());
        Stripe::setApiKey('sk_test_51JJsMSABCFW8eOHahFzdfnADUL8EHOyNBo2Aell9CCB0DGL2kPKvLMnpIwCyO2tsDEI7c48tuvWTqek62KcSt3sZ003CzbOaRw');

        try {
            // Fetch all the Plans and cache it
            return Cache::remember('stripe.plans', 60*24, function() {
                return \Stripe\Plan::all();
            });
        } catch ( \Exception $e ) {
            return false;
        }
    }

    public function subscriptions(){
        return $this->hasMany(Subscription::class, 'stripe_plan', 'stripe_price');
    }
}
