<head>
@include('includes.header')
</head>
<style>
.numberCircle {
    border-radius: 50%;
    width: 10px;
    height: 10px;
    padding: 8px;

    background: #fff;
    border: 2px solid #666;
    color: #666;
    text-align: center;
    font: 8px Arial, sans-serif;
}
.g{
  background-color:#28a745;
}
.y{
  background-color:#ffc107;
}
.r{
  background-color:#dc3545;
}
</style>
    
<table class="table table-hover table-responsive table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Team</th>
      <th scope="col">PTS</th>
      <th scope="col">PG</th>

    </tr>
  </thead>  @foreach($standing as $data) 

  <tbody>
    <tr>
      <th scope="row">  {{$data['overall_league_position']}}</th>
      <td><img style="height:15px" src="{{$data['team_badge']}}"> 
   {{$data['team_name']}} <br> <span> <span class="numberCircle g">{{$data['overall_league_W']}}</span>
   <span class="numberCircle y">{{$data['overall_league_D']}}</span>  <span class="numberCircle r">{{$data['overall_league_L']}}</span>
<span> {{$data['overall_league_GF']}} - {{$data['overall_league_GA']}}</span>
  </span>
  </td>
      <td><b>{{$data['overall_league_PTS']}}</b> </td>
      <td>{{$data['overall_league_payed']}}</td>  
    </tr>
    
  </tbody>
  @endforeach 
</table>
  

