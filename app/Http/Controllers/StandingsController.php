<?php

namespace App\Http\Controllers;

use App\Models\Standings;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class StandingsController extends Controller
{
    
    public function create()
    {    
          $tableId = [148,262,195,468];
        foreach($tableId as $tableId2 ) {
    
            $datas = $this->getTableDatafromApi($tableId2);
            $standingTable  =  [];
        foreach($datas as $data) { 
           
            $standingTable = new Standings();
            $standingTable::updateOrCreate(['TeamId' => $data['team_id']],
           
            [ 'Nr'=> $data['overall_league_position'],
             'Logo'=> $data['team_badge'],
             'Team' => $data['team_name'],
             'TeamId' => $data['team_id'],
             'PG' => $data['overall_league_payed'],
             'PTS' => $data['overall_league_PTS'],
             'W' => $data['overall_league_W'],
             'D' => $data['overall_league_D'],
             'L' => $data['overall_league_L'],
             'GF' => $data['overall_league_GF'],
             'GA' => $data['overall_league_GA'],
             'LeagueId' => $data['league_id']]
            
                    
             );
            }
        }  
        return response()->json([$standingTable]);

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getTableDatafromApi($tableId )
    {          
        $APIkey='41e6b183fe237b34fcca61a15707fc82b06ce5d8db33354bd181285f15beb1f2';
       
        
        $curl_options = array(
          CURLOPT_URL => "https://apiv2.apifootball.com/?action=get_standings&league_id=$tableId&APIkey=$APIkey",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_HEADER => false,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_CONNECTTIMEOUT => 5
        );
              
        $curl = curl_init();
        curl_setopt_array( $curl, $curl_options );
        $result = curl_exec( $curl );      
        $result = json_decode($result,true);
       
return $result;
                 
    } 


}
