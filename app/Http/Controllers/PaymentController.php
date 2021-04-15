<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\StripeUser;
use DB;
use App\SubscriptionPlan;
use App\Invoice;
use Carbon\Carbon;

class PaymentController extends Controller
{
  
  protected $API = "https://api.gettruehelp.com/api/";
  protected $sk_key = "sk_test_51HivydJSNxrs4w3xYfy7dyn8yEeW8TkT94gIzD8seyOBmW7RWtyrJ6h7pOhQaDrLhqL6MftGY4xLa6bA0FtGmPAo00hGRtRWF4";
    
    public function payment() 
    {
        return view('pages.payment');
    }

    public function create()
    {
        return view('payments.create');
    }

    public function subscribe() 
    {
        $stripe = new \Stripe\StripeClient($this->sk_key);
        $products = $stripe->plans->all();
        \Stripe\Stripe::setApiKey($this->sk_key);
        $subscribeDetails = DB::table('subscription_plans')
          ->where('employer_id', '=', session()->get('employer_id'))
          ->first();
          if(isset($subscribeDetails))
          {
            $stripe = new \Stripe\StripeClient($this->sk_key);
            $planDetails = \Stripe\Plan::retrieve(
              $subscribeDetails->plan_id,
              []
            );
          }
          else
          {
            $planDetails=null;
          }
        return view('payments.subscribe',compact('products','planDetails','subscribeDetails'));
    }

    public function customers() 
    {
        $stripe = new \Stripe\StripeClient($this->sk_key);
        $products = $stripe->customers->all();
        foreach($products as $product)
        {
            dd($product->email);
        }
        return view('subscribe',compact('products'));
    }

    public function store(Request $request)
    {
        $stripe = new \Stripe\StripeClient($this->sk_key);
          $stripe->products->create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
          ]);

          if($request->interval=="One Time")
          {
            $price = $stripe->prices->create([
              'unit_amount' => $request->amount*100,
              'currency' => $request->currency,
              'product' => $request->id,
            ]);
          }
          else
          {
            $plan = $stripe->plans->create([
              'amount' => $request->amount*100,
              'currency' => $request->currency,
              'interval' => $request->interval,
              'product' => $request->id,
              'nickname' => $request->name,
            ]);
          }
          // response to db
   
        return redirect()->route('subscribe')->with('success','Plan created successfully.');
    }

    public function addCard($id, Request $request)
    {
      //Get user data
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
        $preferences = $data->response->data->prefs;
        // Create a customer on stripe
        \Stripe\Stripe::setApiKey($this->sk_key);
          $customer = \Stripe\Customer::create([
            'name' => session()->get('first_name'),
            'email' => $account->email,
            'phone' => session()->get('mobile'),
            'description' => 'B2B customer',
          ]);
        // Create a default card
        $create = \Stripe\PaymentMethod::create([
          'type' => 'card',
          'card' => [
            'number' => '5196080137700006',
            'exp_month' => 06,
            'exp_year' => 24,
            'cvc' => '917',
          ]
        ]);
        // Attach the card to customer
        $pm = \Stripe\PaymentMethod::retrieve($create->id);
        $pm->attach(['customer' => $customer->id]);
        // Subcribe for the plan
        $subscription = new \Stripe\StripeClient($this->sk_key);
        $subscription->subscriptions->create
        ([
              'customer' =>$customer->id,
              'items' => [
                            [
                      'plan' => $id
                            ]
                        ],
              'default_payment_method' => $create->id,
        ]);
        return view('payments.success');
    }

    public function edit($id, Request $request)
    {
      // //Get user data
      //   $api_token = session()->get('api_token');
      //   $response = Http::withHeaders([
      //       'Authorization' => "Bearer ".$api_token
      //   ])->get($this->API.'account-info');
      //   $contents = $response->getBody();
      //   $data = json_decode($contents);
      //   $account = $data->response->data->employer;
      //   $preferences = $data->response->data->prefs;
      //   // Create a customer on stripe
      //   \Stripe\Stripe::setApiKey($this->sk_key);
      //     $customer = \Stripe\Customer::create([
      //       'name' => session()->get('first_name'),
      //       'email' => $account->email,
      //       'phone' => session()->get('mobile'),
      //       'description' => 'B2B customer',
      //     ]);
      //   // Create a default card
      //   $create = \Stripe\PaymentMethod::create([
      //     'type' => 'card',
      //     'card' => [
      //       'number' => '4242424242424242',
      //       'exp_month' => 11,
      //       'exp_year' => 2024,
      //       'cvc' => '314',
      //     ]
      //   ]);
      //   // Attach the card to customer
      //   $pm = \Stripe\PaymentMethod::retrieve($create->id);
      //   $pm->attach(['customer' => $customer->id]);

        // dd($pm);
        // Subcribe for the plan
        $userDetails = DB::table('stripe_users')
        ->where('employer_id', '=', session()->get('employer_id'))
        ->orderBy('created_at', 'DESC')->first();
        $subscription = new \Stripe\StripeClient($this->sk_key);
        $subscription = $subscription->subscriptions->create
        ([
              'customer' =>$userDetails->stripe_id,
              'items' => [
                            [
                      'plan' => $id
                            ]
                          ]
        ]);
        // dd($subscription);
        $user = new SubscriptionPlan;
        $user->employer_id = session()->get('employer_id');
        $user->stripe_id = $subscription->customer;
        $user->plan_id = $id;
        $user->invoice_id = $subscription->latest_invoice;
        $user->subscription_id = $subscription->id;
        $user->start_date = Carbon::createFromTimestamp($subscription->current_period_start)->toDateTimeString(); 
        $user->end_date = Carbon::createFromTimestamp($subscription->current_period_end)->toDateTimeString(); 
        $user->save();
        $invoice = new \Stripe\StripeClient($this->sk_key);
        $invoice = $invoice->invoices->retrieve(
          $subscription->latest_invoice,
          []
        );
        // dd($invoice);
        $invoices = new Invoice;
        $invoices->employer_id = session()->get('employer_id');
        $invoices->customer_id = $invoice->customer;
        $invoices->invoice_id = $invoice->id;
        $invoices->amount_paid = $invoice->amount_paid;
        $invoices->number = $invoice->number;
        $invoices->paid = $invoice->paid;
        $invoices->customer_phone = $invoice->customer_phone;
        $invoices->customer_email = $invoice->customer_email;
        $invoices->customer_name = $invoice->customer_name;
        $invoices->hosted_invoice_url = $invoice->hosted_invoice_url;
        $invoices->invoice_pdf = $invoice->invoice_pdf;
        $invoices->save();
        return view('payments.success');
    }
    public function card_pay()
    {
      \Stripe\Stripe::setApiKey($this->sk_key);
        		
      $amount =(int) 100;
          
          $payment_intent = \Stripe\PaymentIntent::create([
        'description' => 'Stripe Test Payment',
        'amount' => $amount,
        'currency' => 'INR',
        'description' => 'Register card',
        'payment_method_types' => ['card'],
      ]);
      $intent = $payment_intent->client_secret;

      return view('payments.card',compact('intent'));
    }

    public function check(Request $request)
    {
      \Stripe\Stripe::setApiKey ( 'test_SecretKey' );
      try {
          \Stripe\Charge::create ( array (
                  "amount" => 300 * 100,
                  "currency" => "usd",
                  "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                  "description" => "Test payment." 
          ) );
          Session::flash ( 'success-message', 'Payment done successfully !' );
          return redirect()->back();
      } catch ( \Exception $e ) {
          Session::flash ( 'fail-message', "Error! Please Try again." );
          return redirect()->back();
      }
    }

    public function updateCard(Request $request) 
    {
      // dd(request()->all());
      $userDetails = DB::table('stripe_users')
        ->where('employer_id', '=', session()->get('employer_id'))
        ->first();
      // dd(session()->get('employer_id'));
      if(isset($userDetails))
      {
        \Stripe\Stripe::setApiKey($this->sk_key);
        $card = \Stripe\Customer::createSource(
          $userDetails->stripe_id,
          ['source' => $request->stripeToken]
        );
        $user = new StripeUser;
        $user->employer_id = session()->get('employer_id');
        $user->stripe_id = $userDetails->stripe_id;
        $user->card_id = $card->id;
        $user->save();
        $stripe = new \Stripe\StripeClient($this->sk_key);
        $products = $stripe->plans->all();
        return view('payments.subscribe',compact('products'));
      }
      else
      {
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$api_token
        ])->get($this->API.'account-info');
        $contents = $response->getBody();
        $data = json_decode($contents);
        $account = $data->response->data->employer;
        $preferences = $data->response->data->prefs;
        // Create a customer on stripe
        \Stripe\Stripe::setApiKey($this->sk_key);
          $customer = \Stripe\Customer::create([
            'name' => session()->get('first_name'),
            'email' => $account->email,
            'phone' => session()->get('mobile'),
            'description' => 'B2B customer',
          ]);
          $card = \Stripe\Customer::createSource(
            $customer->id,
            ['source' => $request->stripeToken]
          );
          $date = Carbon::now();
          $date->addDays(15);
        $user = new StripeUser;
        $user->employer_id = session()->get('employer_id');
        $user->stripe_id = $customer->id;
        $user->card_id = $card->id;
        $user->trail_ends_at = $date;
        $user->save();
        $stripe = new \Stripe\StripeClient($this->sk_key);
        $products = $stripe->plans->all();
        \Stripe\Stripe::setApiKey($this->sk_key);
        $subscribeDetails = DB::table('subscription_plans')
          ->where('employer_id', '=', session()->get('employer_id'))
          ->first();
          if(isset($subscribeDetails))
          {
            $stripe = new \Stripe\StripeClient($this->sk_key);
            $planDetails = \Stripe\Plan::retrieve(
              $subscribeDetails->plan_id,
              []
            );
          }
          else
          {
            $planDetails=null;
          }
        return view('payments.subscribe',compact('products','planDetails','subscribeDetails'));
      }
    }

    public function invoice()
    {
      $invoices = DB::table('invoices')
        ->where('employer_id', '=', session()->get('employer_id'))
        ->get();
        // dd($invoices);
        return view('payments.invoice',compact('invoices'));
    }
    public function cancel($id)
    {
      $sub = SubscriptionPlan::find($id);
      $stripe = new \Stripe\StripeClient($this->sk_key);
      $stripe->subscriptions->update(
        $sub->subscription_id,
        ['cancel_at_period_end' => 'true']
      );
      $sub->is_active=!$sub->is_active;
      $sub->save();
      return redirect()->back();
    }
}
