<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurGoals;
use App\Models\AboutAssociation;
use App\Models\Services;
use App\Models\Member;
use App\Models\Attendace;
use App\Models\Settings;


class aboutController extends Controller
{

    public function aboutus()
    {
     
      $goals = OurGoals::all()->where('goalStatus',1);
      $members = Member::all()->where('memberStatus',1);
      $attendce = Attendace::all()->where('attendaceStatus',1);
      $aboutassociation = AboutAssociation::find(1);
      $services = Services::all();
      $setting     = Settings::find(1);
      return view('pages.aboutus')->with([
        'goals'       =>$goals,
        'aboutassociation'=>$aboutassociation,
        'services'=>$services,
        'members'=>$members,
        'attendce'=>$attendce,
        'data'=>$setting,
      ]);
    }

    
}
