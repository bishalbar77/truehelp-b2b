<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function payment() 
    {
        return view('pages.payment');
        // return view('update-payment-method', [
        //     'intent' => $user->createSetupIntent()
        // ]);
    }
}
