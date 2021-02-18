
@yield('table') 

<style>
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
tr:hover {background-color:#009879;}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.numberCircle {
    border-radius: 25px;
    width: 10px;
    height: 10px;
    padding: 5px;

    background: #fff;
    border: 2px solid #666;
    color: #000;
    text-align: center;
    font: 12px Arial, sans-serif;
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
<table class="styled-table">
  <thead>
    <tr>
      <th scope="col">Pos</th>
      <th scope="col"></th>
      <th scope="col">Club</th>
      <th scope="col"></th>
      <th scope="col">PTS</th>
      <th scope="col">PG</th>

    </tr>
  </thead>  @foreach($stand as $stands) 

  <tbody>
    <tr>
      <th scope="row">  {{$stands['Nr']}}</th>
      <td><img style="height:30px" src="{{$stands['Logo']}}"></th> 
      <th style="font-size: 12px;" >
  <b> {{$stands['Team']}}</b> 
  <th style="padding-right:2px; "> <span><span class="numberCircle g">{{$stands['W']}} W</span>
   <span class="numberCircle y">{{$stands['D']}} D</span>  <span class="numberCircle r">{{$stands['L']}} L</span>
<span> <span style="height:25px;    display: inline-block;
    width: 12px;
    height: 12px;
    background-image: url(https://d37kf7rs4g1hyv.cloudfront.net/scorebat/spriteflsc-min.png);
    background-size: 146px;
    background-repeat: no-repeat;
    vertical-align: middle;
    margin-right: 4px;
    background-position: -24px -33px;
    margin-bottom: 2px;"></span> {{$stands['GF']}} - {{$stands['GA']}}</span></span>
</th>
  </td>
      <td style="border: solid 3px #eee;
width: 25px;
height: 25px;
line-height: 20px;
color: #c44e4e;
border-radius: 18px;
display: inline-block;
font-weight: 900;
font-size: 14px;"><b>{{$stands['PTS']}}</b> </td>
      <td>{{$stands['PG']}}</td>  
    </tr>
    
  </tbody>
  @endforeach 
</table>
Last update date:<b> {{$stands['updated_at']}}</b>

