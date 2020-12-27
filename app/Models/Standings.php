<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standings extends Model
{
    protected $table ='standings';
    protected $fillable = ['Nr',	'Team' ,'PG', 'PTS' ,'W','D','L','GF','GA','LeagueId','Logo','TeamId'];
}
