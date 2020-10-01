<style>
.hidden_content{display:none;}
.Hidden {
  display: none;
  transition: .3s ease-in-out;
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
    
      <div class="col-25 input-group input-group-lg" id="hiddensearch" style="display: none; margin-top:5px;>
      <i class="glyphicon glyphicon-user"></i>
      <select type="text" id="select" name="employee_id[]" class="tokenize-demo" multiple required>
      @foreach($employees as $employee)
        <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }} : In Users</option>
      @endforeach
      @foreach($orders as $employee)
      @if($s++>10)@continue;@endif
        <option value="{{ md5($employee->id) }}">{{ $employee->first_name }} {{ $employee->last_name }} : In Reports</option>
      @endforeach
      </select>
      <div class="search"></div>
      </div>
      {{ method_field('PUT') }}
      <a type="submit"></a>
    </form>
    <ul class="navbar-nav ml-auto" id="navbar">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown navbar-collapse collapse">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell fa-icon-lg text-primary"></i>
          <span class="badge badge-primary navbar-badge">{{$count}}</span>
        </a>
        <div class="dropdown-menu card-box dropdown-menu-lg dropdown-menu-right">
        <div class="notification-top text-center p-2"><h3>{{$count}} New</h3><p class="opacity-75">App Notifications</p></div>
          <div class="dropdown-divider"></div>
          <?php $n=1 ?>
          @foreach ($nf_message as $message)
          @if($n++>4)@continue;@endif
            <a href="{{ url($message->nf_action_url) }}" class="dropdown-item" style="color:#000000;">
              <i class="fa fa-user mr-2"></i> {{$message->nf_message}}
            </a>
          <div class="dropdown-divider"></div>
          @endforeach
          <div class="text-center pt-1"><a href="{{ route('notifications') }}"><span>Read All Notifications</span></a></div>
        </div>
      </li>
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