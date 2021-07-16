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


    public $matchesvideo;

    public function create()
    {
        $datas = $this->getDataFromApi();
        //initializezi un array de videos
        $matchesArray  =  [];

        foreach ($datas as $data) {
            if (($data['competition']['id'] == 15 || $data['competition']['id'] == 14 || $data['competition']['id'] == 13
                || $data['competition']['id'] == 11) && ($data['videos']['title']  = 'Highlights')) {
                $this->matchesvideo = new MatchesInfo();
                $user = $this->matchesvideo::where('thumbnail', $data['thumbnail'])
                    ->get();

                if ($user->isEmpty()) {
                    $this->matchesvideo->title = $data['title'];
                    $subject  =  $data['embed'];
                    preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $data['embed'], $matches);
                    $this->matchesvideo->embed = $matches[0];
                    $this->matchesvideo->url = $data['url'];
                    $dateFromdb = new DateTime($data['date']);
                    $new_date_format = $dateFromdb->format('Y-m-d H:i:s');
                    $this->matchesvideo->date = $new_date_format;
                    $this->matchesvideo->thumbnail = $data['thumbnail'];
                    $this->matchesvideo->cName = $data['competition']['name'];
                    $this->matchesvideo->cId = $data['competition']['id'];
                    $this->matchesvideo->cUrl = $data['competition']['url'];
                    $this->matchesvideo->videoTitle = $data['videos']['title'];
                    $this->matchesvideo->side1 = $data['side1']['name'];
                    $this->matchesvideo->side2 = $data['side2']['name'];

                    $data['side1']['name'] = str_replace(' ', '', $data['side1']['name']);
                    $data['side2']['name'] = str_replace(' ', '', $data['side2']['name']);
                    $this->matchesvideo->save();
                    $last_insert_id = $this->matchesvideo->id;

                    //  $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($img))]);
                    Twitter::post("statuses/update", [
                        "status"  => "New video Highlights added for: " . '#' . $data['side1']['name'] . ' - ' . '#' . $data['side2']['name'] . ' ' . "https://footballvideo.azurewebsites.net/matches/" . $last_insert_id,
                    ]);
                }
            }
        }

        return response()->json([$this->matchesvideo]);
    }


    public function showbyid($id)
    {
        $this->matchesvideo  =   MatchesInfo::find($id);
        if ($this->matchesvideo['cId'] == '15') {
            $tableId = 148;
        } else if ($this->matchesvideo['cId'] == '14') {
            $tableId = 468;
        } else if ($this->matchesvideo['cId'] == '13') {
            $tableId = 262;
        } else {
            $tableId = 195;
        }
        $plstand = Standings::Where('LeagueId', '=', $tableId)->orderBy('Nr', 'ASC')->get();
        $data = array(
            'video' => $this->matchesvideo,
            'standing' => $plstand
        );
        return view('selectedVideo', ['data' => $data]);
    }

    public function showLeague(Request $request)
    {
        $premierleague = $request->PremierLeague;
        $seriaa = $request->SeriaA;
        $bundesliga = $request->Bundesliga;
        $laliga = $request->LaLiga;

        if (isset($premierleague)) {
            $selectedeague = $premierleague;
            $selectedpath = "PremierLeague=";
        }
        if (isset($seriaa)) {
            $selectedeague = $seriaa;
            $selectedpath = "SeriaA=";
        }
        if (isset($bundesliga)) {
            $selectedeague = $bundesliga;
            $selectedpath = "Bundesliga=";
        }

        if (isset($laliga)) {
            $selectedeague = $laliga;
            $selectedpath = "LaLiga=";
        }

        $this->matchesvideo  =   MatchesInfo::Where('cId', '=', $selectedeague)->orderBy('created_at', 'DESC')->simplePaginate(12);
        $this->matchesvideo->withPath('showLeague?' . $selectedpath . $selectedeague);
        return view('selectedLeague', ['data' => $this->matchesvideo]);
    }

    public function list()
    {
        $this->matchesvideo  =   MatchesInfo::orderBy('created_at', 'DESC')->orderBy('created_at', 'DESC')->simplePaginate(12);
        return view('allmatches', ['data' => $this->matchesvideo]);
    }

    public function getDataFromApi()
    {
        $client  =  new Client(['base_uri'  => 'https://www.scorebat.com/video-api/v1/']);
        $response  =  $client->request('GET', '', ['verify'  => false]);
        $body  =  $response->getBody();
        $content  = $body->getContents();
        $arr  =  json_decode($content, TRUE);
        $events  =  $arr;
        return $events;
    }
}
