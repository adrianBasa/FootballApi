<head>
@include('includes.header')
</head>
<body>
<div class="container">
<h1 style="text-align:center">Matches</h1>  

  <div class="row">@foreach($data as $data)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
          <div class="card"> 
            <a href=/matches/{{$data['id']}}> <img class="card-img-top" src="{{$data['thumbnail']}}">
              <div class="card-body bg-dark">
              <h6 class="text-bold;">{{$data['title']}}</a></h6>
              <b> <p style=" color:white"> Game played on: {{$data['date']}}</p></b>
              </div>
                      
          </div>  
        </div>@endforeach   
    </div>
</div>
</body>
 @include('includes.footer')

