<head>@include('includes.header')
</head>

  <title>{{$data['title']}}</title>

 
<div class="container">
<h1>Match  : {{$data['videoTitle']}}</h1>
  <div class="row">
    <div class="col-sm-6 col-md-4 col-lg-6 mt-4 mx-auto mx-auto">
    <h4>{{$data['title']}}</h4>
    <h6>{{$data['cName']}}</h6>
    <div style='width:100%;height:0px;position:relative;padding-bottom:calc(56.25% + 335px);' class='_scorebatEmbeddedPlayerW_'><iframe src='{{$data['embed']}}' frameborder='0' width='560' height='650' allowfullscreen allow='autoplay; fullscreen' style='width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;' class='_scorebatEmbeddedPlayer_'></iframe></div>
</div>
   <a href='{{$data['cUrl']}}'> Live Table </a> 
   
  </div>
</div>

@include('includes.footer')
 


