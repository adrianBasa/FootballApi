<?php

namespace App\Http\Controllers;
use App\Models\MatchesInfo;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Twitter;
use File;
use Illuminate\Support\Facades\Log;
use DateTime;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Standings;
class ApiController extends Controller
{


    public function create()
    {
        $datas = $this->getDataFromApi();
        //initializezi un array de videos
        $matchesArray  =  [];
    
        foreach($datas as $data) { 
            if( ($data['competition']['id'] == 15 || $data['competition']['id'] == 14 || $data['competition']['id'] == 13  
            || $data['competition']['id'] == 11) && ($data['videos']['title']  = 'Highlights')){
            $matchesvideo = new MatchesInfo();
            $user = $matchesvideo::where('thumbnail', $data['thumbnail']) 
            ->get();
            
            if ($user->isEmpty()) {
                $matchesvideo->title = $data['title'];
                $subject  =  $data['embed'];
                preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $data['embed'], $matches);
                $matchesvideo->embed = $matches[0];
                $matchesvideo->url = $data['url'];
                $dateFromdb = new DateTime ($data['date']);
                $new_date_format = $dateFromdb->format('Y-m-d H:i:s');
                $matchesvideo->date = $new_date_format;
                $matchesvideo->thumbnail = $data['thumbnail'];
                $matchesvideo->cName = $data['competition']['name'];
                $matchesvideo->cId = $data['competition']['id'];
                $matchesvideo->cUrl = $data['competition']['url'];
                $matchesvideo->videoTitle = $data['videos']['title'];
                $matchesvideo->side1 = $data['side1']['name'];
                $matchesvideo->side2 = $data['side2']['name'];
                        
                $data['side1']['name'] = str_replace(' ', '', $data['side1']['name']);
                $data['side2']['name'] = str_replace(' ', '', $data['side2']['name']);
                $matchesvideo->save();
                $last_insert_id = $matchesvideo->id;
                
              //  $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($img))]);
               Twitter::post("statuses/update", ["status"  => "New video Highlights added for: ".'#'.$data['side1']['name'].' - '.'#'.$data['side2']['name'].' '."https://footballvideo.azurewebsites.net/matches/".$last_insert_id,
        ]);
                 
            } 
            
        }               

        }  
       
        return response()->json([$matchesvideo]);
        
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
        if($matchesvideo['cId'] == '15') {
            $tableId = 148;
           }
       else if($matchesvideo['cId'] == '14'){
        $tableId = 468;
       
        }
       else if($matchesvideo['cId'] == '13'){
            $tableId = 262;
            
            }
        else {
            $tableId = 195;
        }   
        $plstand = Standings::Where('LeagueId', '=',$tableId)->orderBy('Nr', 'ASC')->get();
        $data = array(
            'video'=>$matchesvideo,
            'standing'=>$plstand
            );
        return view('matchTitle',['data' =>$data]);

    }

    public function showLeague( Request $request)
    {        
        $premierleague = $request->PremierLeague;  
        $seriaa = $request->SeriaA;  
        $bundesliga = $request->Bundesliga;
        $laliga = $request->LaLiga;
       
        if(isset($premierleague) ) {
             
        $selectedeague=$premierleague;
       }
       if(isset($seriaa) ) {
             
        $selectedeague=$seriaa;
       }
       if(isset($bundesliga) ) {
             
        $selectedeague=$bundesliga;
       }
       
       if(isset($laliga) ) {
             
        $selectedeague=$laliga;
       }

        $matchesvideo  =   MatchesInfo::Where('cId', '=', $selectedeague)->orderBy('created_at', 'DESC')->simplePaginate(12);
    
        return view('matchesVideos',['data' =>$matchesvideo]);
    }
    
    
    public function list()
    {
        $matchesvideo  =   MatchesInfo::orderBy('created_at', 'DESC')->orderBy('created_at', 'DESC')->simplePaginate(12);
       
        return view('matches',['data' =>$matchesvideo]);
    }

    public function getDataFromApi()
    {  

        $client  =  new Client(['base_uri'  => 'https://www.scorebat.com/video-api/v1/']);  
        $response  =  $client->request('GET', '',['verify'  => false]); 
        $body  =  $response->getBody();
        $content  = $body->getContents();
        $arr  =  json_decode($content,TRUE);
        $events  =  $arr;
        return $events;
            
    } 
}
