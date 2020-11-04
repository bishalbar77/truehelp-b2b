{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Payment</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/boot.min.css">

<style type="text/css">
.Oval {
  width: 40px;
  height: 40px;
}
.nav-name {
  margin-top: 3px;
  font-family: Helvetica;
  font-size: 15.8px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.25;
  letter-spacing: normal;
  color: #121212;
}

body{
  background-color: #ffffff !important;
}

/*
responsive*/

@media screen and (min-width: 601px) {


.ver5 {
font-size: 17px;
/*font-size: 120%;*/  
}
.ver4{
font-size: 18px;
}
.ver3{
font-size: 150%;
}
}

@media screen and (max-width: 600px) {
.ver5 {
font-size: 14px;
}


.ver3{
font-size: 20px;
}







.ver2{
font-size: 15px;
}
.ver4{
font-size: 15px;
}

}



.ver3,.ver4,.ver5{
font-weight: 700;
}
.pro-wgt{
font-weight: 600;
}

.wi{
color: rgb(253 253 253);
}




.bl{
color: rgb( 19 20 21);

}

.shade-bl{
color:rgb(153 153 153);

}

.gr{
color: rgb( 12 175 82);

}

.re{
color: rgb(235 75 75);
}
.full-bl{
color:rgb(0 0 0);
}

.medium-bl{
color: rgb(76 77 76);
}

.blu{
color: rgb(0 122 255);
}

.ver2{
font-family: 'Montserrat'; color: rgb(255 255 255);
}
.wgt-600{
font-weight: 600;
}


.card-new {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 15px;
}
.card-new-grey {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: rgb(232 232 232);
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 15px; 
}
.StripeElement {
    box-sizing: border-box;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
}
.StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
    border-color: #fa755a;
}
.StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
}
/*responsive*/


</style>

@endsection

{{-- Content --}}
@section('content')
  
@include('layouts.header')
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <div class="container col-md-8 my-4">
    <div class="card-new my-3 rad shadow" style="background-color:#eceff3;">
        <div class="card-body p-4">
            <input id="card-holder-name" class="form-control p-2" type="text" placeholder="Card Holder Name">
            <br>
            <!-- Stripe Elements Placeholder -->
            <div id="card-element"></div>
            <br>
            <button id="card-button" class="btn btn-primary" data-secret="{{ $intent->client_secret?? '' }}">
                Subcribe
            </button>
        </div>
      </div>
  </div>


@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>
        window.addEventListener('load', function() {
            const stripe = Stripe('{{env('STRIPE_KEY')}}');
            const elements = stripe.elements();
            const cardElement = elements.create('card');
            cardElement.mount('#card-element');
            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
            const plan = document.getElementById('subscription-plan').value;
            cardButton.addEventListener('click', async (e) => {
                const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );
                if (error) {
                    // Display "error.message" to the user...
                } else {
                    // The card has been verified successfully...
                    console.log('handling success', setupIntent.payment_method);
                    axios.post('/subscribe',{
                        payment_method: setupIntent.payment_method,
                        plan : plan
                    }).then((data)=>{
                        location.replace(data.data.success_url)
                    });
                }
            });
        })
    </script>
<link rel="stylesheet" href="https://enterprise.gettruehelp.com/dist/css/app.css">
@if (app()->isLocal())
  <script src="https://enterprise.gettruehelp.com/js/app.js"></script>
@else
  <script src="https://enterprise.gettruehelp.com/js/manifest.js"></script>
  <script src="https://enterprise.gettruehelp.com/js/vendor.js"></script>
  <script src="https://enterprise.gettruehelp.com/js/app.js"></script>
@endif

<link rel="stylesheet" href="https://enterprise.gettruehelp.com/css/app.css" />
<script defer src="https://enterprise.gettruehelp.com/js/app.js"></script>
@endsection
