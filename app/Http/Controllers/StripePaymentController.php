<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{
    public function checkout()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            // payment_method_types লাইনটি এখান থেকে ফেলে দেওয়া হয়েছে
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Laravel 12 Product',
                    ],
                    'unit_amount' => 100, // $10.00 (cents)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'), // আপনার প্রজেক্টের সাকসেস ইউআরএল দিন
            'cancel_url' => route('stripe.cancel'),   // আপনার প্রজেক্টের ক্যান্সেল ইউআরএল দিন
        ]);
    
        return redirect()->away($session->url);
    }

    public function success()
    {
        return "পেমেন্ট সফলভাবে সম্পন্ন হয়েছে!";
    }

    public function cancel()
    {
        return "পেমেন্ট বাতিল করা হয়েছে।";
    }
}
