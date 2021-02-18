<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@include('includes.header')
<title> Football Video Highlights</title></title>
</head>
<body>
<div class="container" >
<h1 style="text-align:center">Last Matches </h1>  

    <div class="row">
    @foreach($data as $datas)
      <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card"> 
          <a href="/hightlightvideo/{{$datas['id']}}"> <img class="card-img-top" src="{{$datas['thumbnail']}}">
              <div class="card-body bg-dark">
              <h6 class="text-bold;">{{$datas['title']}}</a></h6>
              <b> <p style=" color:white">{{$datas['date']}}</p></b>
              </div>
         </div>  
    </div>
@endforeach   
    </div>
</div>
<div class="d-flex justify-content-center" style="padding:1%">
{!! $data->links() !!}

</div>
</body>
<footer class="footer">
@include('includes.footer')
</footer>
</html>