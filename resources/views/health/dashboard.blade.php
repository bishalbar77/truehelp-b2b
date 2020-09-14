{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Dashboard</title>
<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="css/montserratfont.css">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<style>
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
.topnav {
    background-color:  rgb(235 237 235);
    overflow: hidden;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    display: block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
    border-bottom: 3px solid transparent;
  }



  .topnav a.active {
    border-bottom: 3px solid blue;
    color:blue;
  }

  /*donut*/



  @keyframes donut-chart-fill {
    to { stroke-dasharray: 0 100; }
  }




  .svg-item {
    width: 200px;
    height: 200px;
    font-size: 16px;
  }
  .donut-ring {
    stroke: #EBEBEB;
  }

  .donut-segment {
    animation: donut-chart-fill 1s reverse ease-in;
    transform-origin: center;
    stroke: rgb(224 7 25);
  }

  .donut-text {
    font-family: Arial, Helvetica, sans-serif;
    fill: black;
  }

  .donut-label {
    font-size: 0.28em;
    font-weight: 700;
    line-height: 1;
    fill: black;
    transform: translateY(0.25em);    
  }

  .donut-percent {
    font-size: 0.5em;
    fill: black;
    line-height: 1;
    transform: translateY(0.5em);
  }
  
body{
  font-family: Montserrat;
}

/*
responsive*/

    @media screen and (min-width: 601px) {
      .verbar {
        font-size: 7px;
        /*font-size: 120%;*/  
      }

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
   .sizing{
    width: 50%  }
    }
    @media screen and (max-width: 600px) {
      .ver5 {
        font-size: 14px;
      }
      .ver3{
        font-size: 20px;
      }
      .sizing{
        width: 100%;
      }
    .ver2{
      font-size: 15px;
    }
    .ver4{
      font-size: 15px;
    }
    
    }
    
    

.ver3,.ver4,.ver5,.verbar{
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

/*responsive*/

</style>
@endsection

{{-- Content --}}
@section('content')
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>
      <li>
        <div class="pl-4">
          <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"  class="Oval img-circle">
        </div>
      </li>
      <li class="pl-2 pt-2">
        <p class="nav-name">{{ session()->get('first_name') }}</p>
      </li>
      <li class="pl-2 pt-2">
        <i class="fa fa-caret-down"></i>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto pl-5">
      <!-- <a href="{{ url('surveys/reports') }}"><button type="button" class="btn btn-primary">Order Verification</button></a> -->
      <a class="pl-5"></a>
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bulkModal">+ Add Visitors</button> -->
      <a class="pl-5"></a>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>
  <div class="content-wrapper" style="margin-top: 0; padding-top: 0;">
    <div class="container my-4  col-lg-12">
      <!-- <a href=""> <h5 class="ver5 blu"><span><i class="fa fa-angle-left blu">&nbsp</i> -->
      <!-- </span>Survey Template</h5></a> -->
      <div class="d-sm-flex justify-content-between"><h3 class="font-weight-bold ">Health Report<br> <span class="medium-bl ver5">{{$data->date}}</span></h3>
      <!-- <button class="btn font-weight-bold dropdown-toggle mr-4" type="button" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false" style="height: 50px; background-color: rgb(235 237 235);">Survey Actions &nbsp</button>
      <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action 1</a>
      <a class="dropdown-item" href="#">Action 2</a>
      <a class="dropdown-item" href="#">Action 3</a>
      </div> -->
      </div>
    </div> 
    <div class="container my-4 col-lg-12">
      <section class="p-4 z-depth-1">
        <div class="row d-flex justify-content-center">
          <div class="col-md-3 col-sm-6 mb-4 text-center">
            <h2 class="font-weight-bold "><sup><i class="fa fa-chart-bar shade-bl">&nbsp</i></sup><span>{{$data->response_received}}</span>%</h2>
            <p class="ver5 shade-bl">Responses Received</p>
          </div>
          <div class="col-md-3 col-sm-6 mb-4 text-center">
            <h2 class="font-weight-bold "><sup><i class="fa fa-check-square shade-bl">&nbsp</i></sup><span>{{$data->arrivals_verified}}</span>%</h2>
            <p class="ver5 shade-bl">Arrivals Verified</p>
          </div>
          <div class="col-md-3 col-sm-6 mb-4 text-center">
            <h2 class="font-weight-bold "><sup><i class="fa fa-exclamation-triangle shade-bl">&nbsp</i></sup>{{$data->student_denied}}</h2>
            <p class="ver5 shade-bl">Students Denied</p>
          </div>
          <div class="col-md-3 col-sm-6 mb-4 text-center">
            <h2 class="font-weight-bold "><sup><i class="fa fa-clock shade-bl">&nbsp</i></sup>{{$data->response_needed}}</h2>
            <p class="ver5 shade-bl">Responses Needed</p>
          </div>
        </div>
      </section>
    </div>
    <!-- contents -->
    <div class="container col-lg-12">
<!--     <div class="topnav">
    <a  class="font-weight-bold hover" id="res" onclick="res()" >Responses</a>
    <a   class="font-weight-bold hover active" id="anal" onclick="anal()" >Anaysis</a>
    </div> -->
    <div id="content" class="my-4">
    <section style="margin-left: 30px">
    <div class="row d-flex    col-lg-12 justify-content-center " >
    <div class=" col-lg-6 col-sm-12 col-md-12 mb-4 " >
    <!--Section: Content-->
    <div class="container col-lg-12" style="background-color: #fff">
    <div class="row pr-lg-5"  >
    <div class="col-md-4 ">
    <center>
    <div class="svg-item ">
    <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="rgb(235 237 235)"></circle>
    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="1.5"></circle>
   <!--  <circle class="donut-segment" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="1.5" stroke-dasharray="3 97" stroke-dashoffset="25"></circle> -->
    <g class="donut-text">
    <text y="30%" transform="translate(0, 2)">
    <tspan x="50%" text-anchor="middle" class="donut-percent verbar">{{$data->new_covid_reports}}</tspan>   
    <tspan y="50%" x="50%" text-anchor="middle" class="" style="font-size: 4px">New Covid-19 </tspan>   
    <tspan y="65%" x="50%" text-anchor="middle" class="" style="font-size: 4px ">Reports </tspan>   
    </text>
    </g>
    </svg>
    </div>
    </center>
    </div>
    <div class="col-md-8 d-flex my-4">
    <div>
    <section style="margin-left: 17px">
    <h5 class="ver5"><div class="d-flex align-items-stretch ">
    <div class="w-100 medium-bl " >New COVID-19 Reports</span>
    </div>
    <div class="flex-grow-1 fl " ><i class="fa fa-arrow-circle-{{$covid_up}}" style="color:purple">{{abs($data->covid_increase)}}</i></div>
    </div></h5>
    <p  class="medium-bl ">Represents the number of students whose survey responses indicated an affirmitave
    response to the question "have you been diagonses with COVID-19 in the past 14 days?" for the first time</p>
    <!-- <a href=""> <h5 class="ver5 blu">View Responses</h5></a> -->
    </section>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class=" col-lg-6 col-sm-12 col-md-12 mb-4 " >
    <!--Section: Content-->
    <div class="container col-lg-12" style="background-color: #fff">
    <div class="row pr-lg-5"  >
    <div class="col-md-4  ">
    <center>
    <div class="svg-item ">
    <svg width="100%" height="100%" viewBox="0 0 40 40" class="donut">
    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="rgb(235 237 235)"></circle>
    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="1.5"></circle>
    <!-- <circle class="donut-segment" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="1.5" stroke-dasharray="12 88" stroke-dashoffset="25"></circle> -->
    <g class="donut-text">
    <text y="30%" transform="translate(0, 2)">
    <tspan x="50%" text-anchor="middle" class="donut-percent verbar">{{$data->fever}}</tspan>   
    <tspan y="50%" x="55%" text-anchor="middle" class=" " style="font-size: 4px">Fevers at</tspan>   
    <tspan y="65%" x="50%" text-anchor="middle" class=" " style="font-size: 4px ">Dropoff </tspan>   
    </text>
    </g>
    </svg>
    </div>
    </center>
    </div>
    <div class="col-md-8 d-flex my-4 ">
    <div>
    <section style="margin-left: 17px">
    <h5 class="ver5"><div class="d-flex align-items-stretch ">
    <div class="w-100 medium-bl ">Students Rejected from Entry</span>
    </div>
    <div class="flex-grow-1 fl "><i class="fa fa-arrow-circle-{{$fever_up}}" style="color:purple">{{abs($data->fever_increase)}}</i></div>
    </div></h5>
    <p  class="medium-bl">The number of students whose assessments did not indicate any symptoms or fever, but was measured to have a fever during drofoff verifiction.</p>
    <br>
    <!-- <a href=""> <h5 class="ver5 blu">View Responses</h5></a> -->
    </section>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <div class="container col-lg-12">
    <div class="row pr-lg-5"  >
    <div class="col-md-5  ">
    <center>
    <div class="svg-item my-5" style="margin-right: 50px" >
    <svg width="130%" height="130%" viewBox="0 0 40 40" class="donut " >
    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="rgb(235 237 235)"></circle>
    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="#fff" stroke-width="1.5"></circle>
    <!-- <circle class="donut-segment" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="1.5" stroke-dasharray="31 69" stroke-dashoffset="25"></circle> -->
    <g class="donut-text">
    <text y="30%" transform="translate(0, 2)">
    <tspan x="50%" text-anchor="middle" class="donut-percent verbar">{{$data->student_reported_symtomps}} </tspan>   
    <tspan y="50%" x="50%" text-anchor="middle" class=" " style="font-size: 3px; ">Students Reported </tspan>   
    <tspan y="65%" x="50%" text-anchor="middle" class="" style="font-size: 3px ">Symptoms </tspan>   
    </text>
    </g>
    </svg>
    </div>
    </div>
    </center>
    <div class="col-md-7 d-flex ">
    <div class="container" width="100%">
    <div class="d-sm-flex justify-content-between"><h5 class="font-weight-bold ">System Provelance</span></h5>
    <!-- <a href=""> <h6 class="ver5 blu">View Data</h6></a> -->
    </div>
    <canvas id="barChart" class="sizing" height="200px"  ></canvas>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
  </div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
<script type="text/javascript">
 //bar
 var ctxB = document.getElementById("barChart").getContext('2d');
 var myBarChart = new Chart(ctxB, {
  label:'dfjsdk',

  type: 'bar',
  data: {
    // labels: ["Cough", "Fever", "Chills", "Headache", "Sore Throat", "Aches","No Tast"],
    labels: ["Cough, Headache, Sore Throat, Aches", "Fever"],
    datasets: [{

      data: [{{$data->new_covid_reports}},{{$data->fever}}],
      label : 'System Provelance',
      backgroundColor: [
      'rgb(12 23 235)',
      'rgb(12 23 235)',
      'rgb(12 23 235)',
      'rgb(12 23 235)',
      'rgb(12 23 235)',
      'rgb(12 23 235)',
      'rgb(12 23 235)'
      ],

      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
<script type="text/javascript">
   function res(){


     // document.getElementById("content").innerHTML = "";
     document.getElementById("res").classList.add("active");

     document.getElementById("anal").classList.remove("active");
   }

   function anal(){

     // document.getElementById("content").innerHTML = "";
     document.getElementById("anal").classList.add("active");

     document.getElementById("res").classList.remove("active");
   }
 </script>
<link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
@if (app()->isLocal())
  <script src="{{ asset('js/app.js') }}"></script>
@else
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
@endif

<link rel="stylesheet" href="{{ mix('css/app.css') }}" />
<script defer src="{{ mix('js/app.js') }}"></script>
@endsection
