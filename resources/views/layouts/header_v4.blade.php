<style>
.hidden_content{display:none;}
.Hidden {
  display: none;
  transition: .3s ease-in-out;
}
.noti-text {
  color: #000000; 
  font-family: Montserrat;
  font-size: 19px;
  font-weight: 600;
}
.noti-text-light {
  color: #000000; 
  font-family: Montserrat;
  font-size: 14px;
  font-weight: 300;
  opacity: 0.9;
}
</style>
<link rel="stylesheet" href="tokenize2.css">
<!--body-->
<?php
   $apiKeys = 'FNgq0fsKbZjiqZrTCev3icyevDhr1v1JnboI5z6fdHHgAfRD8Vb7kvBu7XJq3d6Ajc2TpBiF93YC7GEoKUnqNdezGr9TM7IfrRAJnPL4SFPGY9rBTX40Jq76VjeBzNlVGSGtBAl2K3GS10jJuhBetCfEm9llof9xFRe33vMyF8Dhzrq7K6EeTjbEOu2AK4vCxvpJCtRg';
        $api_token = session()->get('api_token');
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/notification-count',[
                            'api_key' => $apiKeys
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $count = $data->response->data->messages;
        $count = $count > 9 ? "9+" : $count;
        $response = Http::withHeaders([
                            // 'Accept' => 'application/json',
                            'Authorization' => "Bearer ".$api_token
                        ])->get('https://api.gettruehelp.com/api/get-candidates');
        $contents = $response->getBody();
        $data = json_decode($contents);

        if(isset($data->response)){
            if($data->response->status != 200){
                $employees = NULL;
            } else {
                $employees = $data->response->data;
            }
        } else {
            $employees = NULL;
        }
        $response = Http::withHeaders([
                            'Authorization' => "Bearer ".$api_token
                        ])->post('https://api.gettruehelp.com/api/notification',[
                            'api_key' => $apiKeys
                        ]);
        $contents = $response->getBody();
        $data = json_decode($contents);
        $nf_message = $data->response->data->messages;
        
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => "Bearer ".$api_token
        ])->post('https://api.gettruehelp.com/api/get-survey', [
            'api_key' => $apiKeys,
        ]);

        $contents = $response->getBody();
        $data = json_decode($contents);
        $orders = $data->response->data;
?>

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
    <a class="pl-4"></a>
    <ul class="navbar-nav">
      <li>
        <a id="searchicondiv" class="button_style nav-link">
          <i class="fas fa-search fa-lg searchicon"></i>
        </a>
      </li>
    </ul>
    <?php $s=1 ?>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="{{ route('searchAnalytics.store') }}" enctype="multipart/form-data">
    @csrf
    
      <div class="col-25 input-group input-group-lg" id="hiddensearch" style="display: none; margin-top:5px;">
      <i class="glyphicon glyphicon-user"></i>
      <select type="text" id="select" name="employee_id[]" class="tokenize-demo" multiple required>
      @foreach($employees as $employee)
        <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }} : In Users</option>
      @endforeach
      @foreach($orders as $employee)
      @if(\Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') == Carbon\Carbon::today()->format('d/m/Y'))
        <option value="{{ md5($employee->id) }}">{{ $employee->first_name }} {{ $employee->last_name }} : In Reports</option>
      @endif
      @endforeach
      </select>
      <div class="search"></div>
      </div>
      {{ method_field('PUT') }}
      <a type="submit"></a>
    </form>
    <ul class="navbar-nav ml-auto pl-5">
      <a class="pl-5"></a>
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#postModal">Post Survey</button>
      <a class="pl-5"></a>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">+ Add Survey</button>
      <a class="pl-5"></a>
    </ul>
  </nav>
<!--scripts-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="tokenize2.js"></script>
<script>
$('.tokenize-demo').tokenize2({
  placeholder: "Search...",
  searchHighlight:true,
  searchFromStart:false,
  displayNoResultsMessage:true,
  noResultsMessageText:'No results matched "%s"',
    allowClear: true
});
</script> 
<script>
  $(document).ready(function() {

// jQuery methods go here...

$(".searchicon").click(function hidesearch() {
  $('#hiddensearch').slideToggle();
  
  $(".searchicon").toggleClass("fa-search");
    $(".searchicon").toggleClass("fa-times");
});


});
</script>