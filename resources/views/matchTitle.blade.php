<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.header')
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:image" content="{{$data['video']['video']['thumbnail']}}"/>  
<meta property="og:title" content="{{$data['video']['title']}}"/>  
<meta property="og:description" content="VideoHighLight."/>  
<meta name="twitter:card" content="summary" />
<meta name="twitter:image" content={{$data['video']['thumbnail']}} />
<meta name="twitter:title" content="{{$data['video']['title']}}"/>
<meta name="twitter:description" content="VideoHighLight"/>
  <title>{{$data['video']['title']}}</title>
</head>
<body>
<div class="container">
<h1>Match  : {{$data['video']['videoTitle']}}</h1>
  <div class="row">
    <div class="col-sm-6 col-md-4 col-lg-6 mt-4 mx-auto mx-auto">
    <h4>{{$data['video']['title']}}</h4>
    <h6>{{$data['video']['cName']}}</h6>
    <div style='width:100%;height:0px;position:relative;padding-bottom:calc(56.25% + 335px);' class='_scorebatEmbeddedPlayerW_'><iframe src='{{$data['video']['embed']}}' frameborder='0' width='560' height='650' allowfullscreen allow='autoplay; fullscreen' style='width:100%;height:100%;position:absolute;left:0px;top:0px;overflow:hidden;' class='_scorebatEmbeddedPlayer_'></iframe></div>
</div>
<div >   
<h3>Table</h3>
@include('includes.table', ['stand' => $data['standing']])
</div>
</div>
</div>
</body>
<footer>
@include('includes.footer')
</footer>
</html>
