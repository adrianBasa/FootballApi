<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style> 
  .imgFlag{
width: 20px;
height: 20px;
background-size: 18px;
background-position: center center;
background-repeat: no-repeat;
text-align: center;
background-color: #fff;
border-radius: 16px;
box-shadow: 0 1px 6px #e7e7e7;
  }
  .button {

background: #f3f0f1;
position: relative;
background: #f3f0f1;
margin-right: 5px;
border-radius: 25px;
text-align: center;
cursor: pointer;
transition: all 0.1s ease-in-out;

font-family: "Montserrat", sans-serif;
      font-size: 16px;
      font-weight: semibold;
      
      }
button:hover {
        opacity: 0.3;
       
      }button:active {
        opacity: 1;
     
        color: #79e3b6;
      }
   
  </style>
  <form  action="/showLeague" method="get">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Football Video HighLight</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
      <button class="button" type="submit" name="PremierLeague"  value="15"> 
        <img class="imgFlag" src="/img/epl.png" > Premier League  </img>
        </button>
        <button class="button" type="submit" name="SeriaA"   value="13"> 
          <img class="imgFlag" src="/img/seriea.png"> Serie A </img> 
          </button>
          <button class="button" type="submit" name="Bundesliga"  value="11"> 
          <img class="imgFlag" src="/img/bundesliga.png"> Bundesliga  </img> 
          </button>
          
  <button class="button" type="submit" name="LaLiga"  value="14"> 
          <img class="imgFlag" src="/img/laliga.png"> La Liga  </img> 
          </button>
      </ul>
    </div>
  </nav>
    </form>