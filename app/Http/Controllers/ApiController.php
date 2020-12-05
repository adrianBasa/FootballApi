<?php

namespace App\Http\Controllers;
use App\Models\MatchesInfo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;
use Twitter;
use Illuminate\Support\Facades\Log;
class ApiController extends Controller
{


    public function create()
    {
        $datas = $this->getDataFromApi();
        //initializezi un array de videos
        $matchesArray  =  [];


      //  for IF
      
        foreach($datas as $data) { 
            if( $data['competition']['id'] == 15 && $data['videos']['title']  = 'Highlights'){
            $matchesvideo = new MatchesInfo();
            $user = $matchesvideo::where('thumbnail', $data['thumbnail']) 
            ->get();
            
            if ($user->isEmpty()) {
                $matchesvideo->title = $data['title'];
                $subject  =  $data['embed'];
                preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $data['embed'], $matches);
                $matchesvideo->embed = $matches[0];
                $matchesvideo->url = $data['url'];
                $matchesvideo->date = $data['date'];
                $matchesvideo->thumbnail = $data['thumbnail'];
                $matchesvideo->cName = $data['competition']['name'];
                $matchesvideo->cId = $data['competition']['id'];
                $matchesvideo->cUrl = $data['competition']['url'];
                $matchesvideo->videoTitle = $data['videos']['title'];
                $matchesvideo->side1 = $data['side1']['name'];
                $matchesvideo->side2 = $data['side2']['name'];
                        
            // Twitter::post("statuses/update", ["status"  = > "New video Highlights added for: ".'#'.$data['side1']['name'].' - '.'#'.$data['side2']['name'].' '.$matches[0]
            //]);


                $matchesvideo->save();
        
            } 
            
        }               
           
        }  
     
        return response()->json($matchesvideo);
    }
    public function show()
    {
        $matchesvideo  =   MatchesInfo::all();
    //   return view('matches',['data' = >$matchesvideo]);
        return  response()->json($matchesvideo);

    }

    public function showbyid($id)
    {
        $matchesvideo  =   MatchesInfo::find($id);
    //   return view('matches',['data' = >$matchesvideo]);
    return view('matchTitle',['data' =>$matchesvideo]);

    }

    public function list()
    {
        $matchesvideo  =   MatchesInfo::all();
       return view('matches',['data' =>$matchesvideo]);
        // return  response()->json($matchesvideo);

    }

    public function getDataFromApi()
    {  

        $client  =  new Client(['base_uri'  => 'https://www.scorebat.com/video-api/v1/']);  
        $response  =  $client->request('GET', '',['verify'  => false]); 
        $body  =  $response->getBody();
        $content  = $body->getContents();
        $arr  =  json_decode($content,TRUE);
        $events  =  $arr;
       // print_r($events);
        return $events;
        
       // return view('index',['data' = >$arr]);
    } 

  
}
