<html>
<head>
@include('includes.header')
<title> Football Video Highlights</title>
</head>
<body>
<div class="container">
<h1 style="text-align:center">Matches</h1>  

  <div class="row">@foreach($data as $datas)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card"> 
            <a href=/matches/{{$datas['id']}}> <img class="card-img-top" src="{{$datas['thumbnail']}}">
              <div class="card-body bg-dark">
              <h6 class="text-bold;">{{$datas['title']}}</a></h6>
              <b> <p style=" color:white">{{$datas['date']}}</p></b>
              </div>
                      
          </div>  
        </div>@endforeach   
       
        
    </div>
</div>
<div class="d-flex justify-content-center">
{!! $data->links()}

</div>
</body>
<footer class="footer">
@include('includes.footer')
</footer>
</html>