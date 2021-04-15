{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Add default card</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/css/boot.min.css">
<style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 25%;
  padding: 8px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2);
  border-radius: 25px 25px 25px 25px ;
}

.price .header {
  background-color: #111;
  color: white;
  font-size: 25px;
  border-radius: 25px 25px 0 0;
}

.grey2 {
    background-color: #eee;
    font-size: 20px;
}
.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}
.price {
  
  border-radius: 25px 25px 25px 25px !important;
}
.price .grey {
  background-color: #eee;
  font-size: 20px;
  border-radius: 0 0 25px 25px;
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}

@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
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
.My-employees {
  font-family: Montserrat;
  font-size: 18px;
  font-weight: 800;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.t-head {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
  overflow-x:auto;
}
.t-body {
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #85899a;
  overflow-x:auto;
}
.Rectangle-Copy-6 {
  border-radius: 15px;
  box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.14);
  background-color: #ffffff;
}
.nav-menu {
  height: 25px;
  font-family: Helvetica;
  font-size: 14.3px;
  font-weight: normal;
  font-stretch: normal;
  font-style: normal;
  line-height: 1.43;
  letter-spacing: normal;
  color: #ffffff;
}
.table-side-tag {
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #167aff;
}
.order-img {
  width: 90%;
}
.Request-sent {
  width:100%;
  font-family: Montserrat;
  font-size: 19px;
  font-weight: 600;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: var(--black);
}
.Lorem-ipsum-dolor-si {
  height: 66px;
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 500;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #b6b8c3;
}
.fa-icon-lg {
  font-size: 1.6em;
  line-height: 0.05em;
  vertical-align: -35%;
}
.inner-addon { 
    position: relative; 
}
body{
  background-color: #ffffff !important;
}
/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}
a:hover {
    text-decoration: none !important;
}
/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }

</style>

@endsection

{{-- Content --}}
@section('content')

@php
        $stripe_key = 'pk_test_51HivydJSNxrs4w3xHPZvPpYGb3L5Yn2xP2L4Ec0DLxEltJygeSvNnkY1rOUTs8clDCqJ7xJyiCifMbXuqy80TEkz00dAu9uH2E';
    @endphp
  <!-- /.navbar -->
  @include('layouts.header')

    <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->
        <h2 style="text-align:center">Add your card</h2>
        <p style="text-align:center">Continue hassle free subscriptions by adding your card.</p>
        <div class="p-4">
          <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
              <div class="Rectangle-Copy-6 pl-4 t-head">
                  <div class="pt-4 pl-4 pb-2 pr-5">
                      <div class="row">
                      <div class="container" style="margin-top:10%;margin-bottom:10%">
                            <div class="row justify-content-center">
                                    <p class="pt-2 pr-3">Your details are safe with us.</p>
                                <div class="card">
                                <form action="/updateCard" method="POST">
                                @csrf
                                      <script
                                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                              data-key="pk_test_51HivydJSNxrs4w3xHPZvPpYGb3L5Yn2xP2L4Ec0DLxEltJygeSvNnkY1rOUTs8clDCqJ7xJyiCifMbXuqy80TEkz00dAu9uH2E"
                                              data-amount="100"
                                              data-name="TRUEHELP"
                                              data-description="Adding default payments card"
                                              data-image="https://enterprise.gettruehelp.com/images/Logo-07.png"
                                              data-locale="auto"
                                              data-currency="inr">
                                      </script>
                                  </form>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </div>


@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
    <script>
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
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
