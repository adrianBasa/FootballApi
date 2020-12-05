<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchesInfo extends Model
{
    protected $table ='matches_infos';
    protected $fillable = ['title',	'embed' ,'url', 'thumbnail' ,'date','cName','cId','cUrl','side1','side2'];
}
