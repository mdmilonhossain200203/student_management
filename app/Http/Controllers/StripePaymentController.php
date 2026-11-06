<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EnrollmentController;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Stripe\Checkout\Session;
use Stripe\Stripe;


class StripePaymentController extends Controller
{

    public function checkout($mony)
    {
        $course=Course::with('user')->findOrFail($mony);
       // dd($course->title);
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([

            // payment_method_types 

            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $course->title,
                    ],
                    'unit_amount' => $course->price, // $10.00 (cents)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success'), 
            'cancel_url' => route('stripe.cancel'),   
        ]);

        return redirect()->away($session->url);
    }


    public function success($id)
    {

        
        // return "your payment success !";
        //
       
        // return redirect()->route('enrollment.update', ['id' => $id]);

        

    }


    public function cancel()
    {
        return "your pamyment is canceled !";
    }
}
