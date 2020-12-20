<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Matches Highlights</title>

<div class="container">
<h1 style="text-align:center">Matches</h1>  

  <div class="row">@foreach($data as $data)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
        
          <div class="card"> 
          <a href=/matches/{{$data['id']}}> <img class="card-img-top" src="{{$data['thumbnail']}}">
          <div class="card-block">
          <h5 class="text-bold"><h4>{{$data['title']}}</h4></a></h5>
           
        </div>
                      
    </div>  
  </div>@endforeach   
</div>
</div>

