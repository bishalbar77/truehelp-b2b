{{-- Extends layout --}}
@extends('layouts.default')
{{-- Styles Section --}}
@section('styles')
<title>TrueHelp | Health Check</title>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/boot.min.css">
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
.My-employees {
  font-family: Montserrat;
  font-size: 18px;
  font-weight: 1000;
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
.card-box {
  width: 700px;
  border-radius: .7rem !important;
  box-shadow: 0 15px 30px 0 rgba(0,0,0,.11),0 5px 15px 0 rgba(0,0,0,.08)!important;
}
.inner-addon { 
    position: relative; 
}

/* style icon */
.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

/* align icon */
.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}

/* add padding  */
.left-addon input  { padding-left:  30px; }
.right-addon input { padding-right: 30px; }

.card-box-top {
  border-radius: 16.6px;
  margin-top:10px;
  box-shadow: 0 13px 14px 0 rgba(0, 0, 0, 0.05);
  background-color: #ffffff;
}
.blue {
  border: solid 0.6px #2d87ff;
}
.purple {
    border: solid 0.6px #211f72;
}
.orange {
    border: solid 0.6px #f77766;
}
.green {
    border: solid 0.6px #27cd90;
}
.yellow {
    border: solid 0.6px #f9b24b;
}
.body {
    background-color: #ffffff !important;
}
.text-font {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 800;
  padding-top: 20px !important;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #131415;
}
.col-lg-2, .col-lg-3 {
    position: relative;
    width: 100%;
    padding-right: 5px !important;
    padding-left: 5px !important;
}
.text-blue-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #167aff !important;
}

.text-purple-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #090763 !important;
}

.text-orange-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #f76551 !important;
}

.text-green-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #0fc884 !important;
}

.text-yellow-2 {
  opacity: 0.9;
  font-family: Montserrat;
  font-size: 29.5px;
  font-weight: 600;
  font-stretch: normal;
  padding-left: 20px !important;
  font-style: normal;
  line-height: normal;
  letter-spacing: 1.23px;
  color: #f9aa37 !important;
}
.unsafe {
  width: 69px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #ff5b5b;
}
.safe {
  width: 69px;
  height: 19px;
  font-family: Montserrat;
  font-size: 15px;
  font-weight: 700;
  font-stretch: normal;
  font-style: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #07901a;
}
.arrow-head {
  color: #000000 !important;
}
.card-body {
  padding-top: 0px !important;
  
}
table.dataTable thead th {
  border-bottom: none !important;
}
table.dataTable.no-footer {
  border-bottom: none !important;
}
.dataTables_wrapper .dataTables_length label {
    font-weight: bolder !important;
    text-align: right !important;
    white-space: nowrap !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    font-weight: bolder !important;
}
.search-box {
  height: 40px !important;
  border-radius: 11px !important;
  box-shadow: 0 8px 13px 0 rgba(0, 0, 0, 0.02) !important;
  background-color: #f3f3f3 !important;
  position: relative !important;
  left: -5px !important;
  content: "\f002" !important;
}
</style>

@endsection

{{-- Content --}}
@section('content')

  <!-- /.navbar -->
  @include('layouts.header_v2')

    <aside class="main-sidebar elevation-4 side-bar">
    @include('layouts.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3">
            <!-- small box -->
            <div class="card-box-top blue">
                <p class="text-font pr-3 pl-3">Registered employees</p>
                <p class="text-blue-2">{{ $registered_employees }}</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top purple">
                <p class="text-font pr-3 pl-3">Surveys Completed</p>
                <p class="text-purple-2">{{ $survey_completed }}</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3">
            <!-- small box -->
            <div class="card-box-top orange">
                <p class="text-font pr-3 pl-3">Current COVID positive</p>
                <p class="text-orange-2">{{ $survey_postive }}</p>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top green">
                <p class="text-font pr-3 pl-3">Covid Recovered</p>
                <p class="text-green-2">0</p>
            </div>
          </div>
          <!-- ./col -->
            <!-- ./col -->
          <div class="col-lg-2">
            <!-- small box -->
            <div class="card-box-top yellow">
                <p class="text-font pr-3 pl-3">Pending Surveys</p>
                <p class="text-yellow-2"> {{ $survey_pending }}</p>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @if($orders ?? ''!=NULL)
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="form-group row">
                <div class="col-lg-6 pt-4 ">
                  <div class="Rectangle-Copy-6 pl-4 t-head">
                    <!-- /.card-body -->
                    <div class="p-2"> <canvas id="myChart" width="600" height="350"></canvas></div>
                  </div>
                </div>
                <div class="col-lg-6 pt-4 ">
                  <div class="Rectangle-Copy-6 pl-4 t-head">
                    <!-- /.card-body -->
                   <div class="p-2"> <canvas id="barchart" width="600" height="350"></canvas></div>
                  </div>
                </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    @endif
    @if($orders ?? ''!=NULL)
    <section class="content pt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="Rectangle-Copy-6 pl-4 t-head">
              <div class="row pt-4 pl-4 pr-5" style="width:100% !important;">
                <div class="col-lg-10"><h3  class=" My-employees">Reports</h3></div>
                <div class="col-lg-2 pb-1 float-right">
                  <div id="filter_col0" data-column="0">
                    <input type="text" name="Name" class="form-control search-box form-control-sm column_filter" id="col0_filter" placeholder="Search" style="font-weight: 700;">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                    <table class="table" id="empdatatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Verification Status</th>
                                <th>Risk Factor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="t-body">
                          
                          @foreach($orders ?? '' as $employee)
                          @if(\Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') == Carbon\Carbon::today()->format('d/m/Y'))
                              <tr>
                                <td>{{ $employee->first_name }} {{ $employee->middle_name }}  {{ $employee->last_name }}</td>
                                <td class="pl-4">{{ $employee->survey_status }}</td>
                                @if($employee->severity=="GREEN")
                                <td class="pl-4"><span class="safe">SAFE</span> </td>
                                @elseif($employee->severity=="RED")
                                <td class="pl-4"><span class="unsafe">UNSAFE</span> </td>
                                @else
                                <td class="pl-4" style="color: #07901a;">&nbsp;&nbsp;&nbsp;-</td>
                                @endif
                                <td>
                                  <a href="{{ url('health/details/'.md5($employee->id)) }}" class="arrow-head" type="submit">
                                   <i class="fa fa-angle-right fa-lg" aria-hidden="true"></i>
                                  </a>
                                </td>
                              </tr>
                          @endif
                          @endforeach
                        </tbody>
                    </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    @endif
    <a class="p-4"></a>


  </div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script>
 // Return with commas in between
 var numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  };

var dataPack1 = [21, 10, 14, 12, 14, 5, 10];
var dataPack2 = [10, 11, 12, 22, 33, 33, 11];
var dataPack3 = [31, 30, 50, 44, 61, 22, 33];
var dates = ["Jan 1", "Jan 2", "Jan 3", "Jan 4", "Jan 5", "Jan 6", 
  				 "Jan 7"];

// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

var bar_ctx = document.getElementById('barchart');
var bar_chart = new Chart(bar_ctx, {
    type: 'bar',
    align: 'start',
    data: {
        labels: dates,
        
         datasets: [
        {
            label: 'Positive',
            data: dataPack1,
						backgroundColor: "rgb(255, 16, 96)",
						hoverBackgroundColor: "rgb(255,16,90)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        {
            label: 'Recovered',
            data: dataPack2,
						backgroundColor: "rgb(39,205,144)",
						hoverBackgroundColor: "rgb(39,205,140)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        {
            label: 'Total',
            data: dataPack3,
						backgroundColor: "rgb(45,135,255)",
						hoverBackgroundColor: "rgb(45,135,250)",
						hoverBorderWidth: 2,
						hoverBorderColor: 'lightgrey'
        },
        ]
    },
    options: {
        title: {
            display: true,
            text: 'Total vs Recovered vs Positive',
            fontSize : 18,
            fontFamily : 'Montserrat',
            align: 'start',
        },
     		animation: {
        	duration: 10,
        },
        tooltips: {
					mode: 'label',
          callbacks: {
          label: function(tooltipItem, data) { 
          	return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
          }
          }
         },
        scales: {
          xAxes: [{ 
            barPercentage: 0.4,
          	stacked: true, 
            gridLines: { display: false },
            }],
          yAxes: [{ 
          	stacked: true, 
            ticks: {
        			callback: function(value) { return numberWithCommas(value); },
     				}, 
            }],
        }, // scales
        legend: {display: true}
    } // options
   }
);
</script>
<script>
    Chart.pluginService.register({
      beforeDraw: function(chart) {
        if (chart.config.options.elements.center) {
          // Get ctx from string
          var ctx = chart.chart.ctx;

          // Get options from the center object in options
          var centerConfig = chart.config.options.elements.center;
          var fontStyle = centerConfig.fontStyle || 'Arial';
          var txt = centerConfig.text;
          var color = centerConfig.color || '#000';
          var maxFontSize = centerConfig.maxFontSize || 75;
          var sidePadding = centerConfig.sidePadding || 20;
          var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
          // Start with a base font of 30px
          ctx.font = "30px " + fontStyle;

          // Get the width of the string and also the width of the element minus 10 to give it 5px side padding
          var stringWidth = ctx.measureText(txt).width;
          var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

          // Find out how much the font can grow in width.
          var widthRatio = elementWidth / stringWidth;
          var newFontSize = Math.floor(30 * widthRatio);
          var elementHeight = (chart.innerRadius * 2);

          // Pick a new font size so it will not be larger than the height of label.
          var fontSizeToUse = Math.min(newFontSize, elementHeight, maxFontSize);
          var minFontSize = centerConfig.minFontSize;
          var lineHeight = centerConfig.lineHeight || 25;
          var wrapText = false;

          if (minFontSize === undefined) {
            minFontSize = 20;
          }

          if (minFontSize && fontSizeToUse < minFontSize) {
            fontSizeToUse = minFontSize;
            wrapText = true;
          }

          // Set font settings to draw it correctly.
          ctx.textAlign = 'center';
          ctx.textBaseline = 'middle';
          var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
          var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
          ctx.font = fontSizeToUse + "px " + fontStyle;
          ctx.fillStyle = color;

          if (!wrapText) {
            ctx.fillText(txt, centerX, centerY);
            return;
          }

          var words = txt.split(' ');
          var line = '';
          var lines = [];

          // Break words up into multiple lines if necessary
          for (var n = 0; n < words.length; n++) {
            var testLine = line + words[n] + ' ';
            var metrics = ctx.measureText(testLine);
            var testWidth = metrics.width;
            if (testWidth > elementWidth && n > 0) {
              lines.push(line);
              line = words[n] + ' ';
            } else {
              line = testLine;
            }
          }

          // Move the center up depending on line height and number of lines
          centerY -= (lines.length / 2) * lineHeight;

          for (var n = 0; n < lines.length; n++) {
            ctx.fillText(lines[n], centerX, centerY);
            centerY += lineHeight;
          }
          //Draw text in center
          ctx.fillText(line, centerX, centerY);
        }
      }
    });


var config = {
  type: 'doughnut',
  data: {
    labels: [
      "Surveys completed",
      "Current COVID postive",
      "Covid Recovered",
      "Pending Surveys",
      "Registered employees"
    ],
    datasets: [{
      data: [<?php echo $survey_completed; ?>, <?php echo $survey_postive; ?>, 0, <?php echo $survey_pending; ?>, <?php echo $registered_employees; ?>],
      backgroundColor: [
        "#484edb",
        "rgb(255, 16, 96)",
        "rgb(39,205,144)",
        "#fe983f",
        "rgb(45,135,255)"
      ],
      borderWidth: 4,
      hoverBackgroundColor: [
        "#484edb",
        "rgb(255, 16, 96)",
        "rgb(39,205,144)",
        "#fe983f",
        "rgb(45,135,255)"
      ]
    }]
  },
  options: {
    title: {
            display: true,
            text: 'YAY! You are Safe Dummy Text',
            fontSize : 18,
            fontColor : '#00a13d',
            fontFamily : 'Montserrat',
            align: 'start',
        },
    legend: {
            display: true,
            position: 'right',
            align: 'end'
        },
    percentageInnerCutout: 10,
    elements: {
      center: {
        text: '',
        color: '#FF6384', // Default is #000000
        fontStyle: 'Arial', // Default is Arial
        sidePadding: 20, // Default is 20 (as a percentage)
        minFontSize: 25, // Default is 20 (in px), set to false and text will not wrap.
        lineHeight: 25 // Default is 25 (in px), used for when text wraps
      }
    }
  }
};

var ctx = document.getElementById("myChart").getContext("2d");
var myChart = new Chart(ctx, config);
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
		 $(document).ready(function() {
          $('#empdatatable').DataTable( {
              "ordering": false,
              "info":     false,
              "dom": 'lrtip',
              "paging": false,
          } );
      } );
		</script>
@endsection
