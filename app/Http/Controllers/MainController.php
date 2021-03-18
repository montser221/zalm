<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\AboutAssociation;
use App\Models\Services;
use App\Models\Agent;
use App\Models\ImageManagement;
use App\Models\pdfFile;
use App\Models\Cart;
use App\Models\video;
use App\Models\Statistics; 
use App\Models\Pages; 
use App\Models\PagesViews; 
use Session;
use App\Models\Money;
class MainController extends Controller
{
  public function index()
  {
      
    /**
     * visitorIp','pagesTable
     */
    $pageId   = 1;
    $vistorIp = request()->ip();
   $pageTotalViews = Pages::pageTotalViews($pageId);
    // dd($pageTotalViews);
    if(PagesViews::is_unique_view($vistorIp,$pageId) === true)
    {
      PagesViews::create([
        'pagesTable'=>$pageId,
        'visitorIp'=>$vistorIp,
      ]);
      \DB::table('pages')
        ->where('pageId',$pageId)
        ->update([
          'totalViews'=> 1,
          'updated_at'=>now(),
        ]);
    
    }
    else
    {
      // dd('bad');
    }

    $aboutassociation = AboutAssociation::find(1);
    $allprojects = Projects::with('arrow','denoate')->latest()->take(10)->where('projectStatus',1)->whereNotIn('projectCategoryId',[3])->get();
    $urgentprojects = Projects::with('arrow','denoate')->latest()->take(10)->where('projectStatus',1)->whereNotIn('projectCategoryId',[1])->get();
    $services = Services::all();
    $agents = Agent::all()->where('agentStatus',1);
    $files = pdfFile::all()->where('fileStatus',1);
    $imagesAlbum = ImageManagement::all()->where('imageStatus',1);
    $videos =  video::all()->where('videoStatus',1);
    $statistics  = Statistics::all()->where('sStatus',1);
    $reportFiles = Money::all()->where('reportStatus',1);
    return view('index')->with([
      'allprojects'=>$allprojects,
      'urgentprojects'=>$urgentprojects,
      'aboutassociation'=>$aboutassociation,
      'files'=>$files,
      'reportFiles'=>$reportFiles,
      'services'       =>$services,
      'agents'       =>$agents,
      'images'       =>$imagesAlbum,
      'videos'       =>$videos,
      'statistics'    =>$statistics,

    ]);
  }

  // Add To cart function

  public function addToCart(Request $request , $id)
  {
    $project = Projects::find($id);
    $oldcart = Session::has('cart') ?  Session::get('cart') : null;
    $cart = new Cart($oldcart);
    $cart->add($project,$project->projectId);
    $request->session()->put('cart',$cart);
    // dd(session()->get('cart'));
  
    return redirect()->route('home');
  }
  
  public function cart()   {
    $pageId   = 5;
    $vistorIp = request()->ip();
   $pageTotalViews = Pages::pageTotalViews($pageId);
    // dd($pageTotalViews);
    if(PagesViews::is_unique_view($vistorIp,$pageId) === true)
    {
      PagesViews::Create([
        'pagesTable'=>$pageId,
        'visitorIp'=>$vistorIp,
      ]);
      \DB::table('pages')
        ->where('pageId',$pageId)
        ->update([
          'totalViews'=> 1,
          'updated_at'=>now(),
        ]);
    
    }
    else
    {
      // dd('bad');
    }
      return view('pages.cart');
    }


  // Our projects page
  public function ourproject()
  {
    $pageId   = 8;
    $vistorIp = request()->ip();
   $pageTotalViews = Pages::pageTotalViews($pageId);
    // dd($pageTotalViews);
    if(PagesViews::is_unique_view($vistorIp,$pageId) === true)
    {
      PagesViews::Create([
        'pagesTable'=>$pageId,
        'visitorIp'=>$vistorIp,
      ]);
      \DB::table('pages')
        ->where('pageId',$pageId)
        ->update([
          'totalViews'=> 1,
          'updated_at'=>now(),
        ]);
    
    }
    else
    {
      // dd('bad');
    }
    $allprojects = Projects::latest()->where('projectStatus',1)->paginate(9);
    return view('pages.ourproject')->with([
      'allprojects'=>$allprojects,
    ]);
  }

  public function urgentproject()
  {
    $urgentprojects = Projects::with('arrow','denoate')->latest()->where('projectStatus',1)->whereNotIn('projectCategoryId',[1])->paginate(6);
    return view('pages.urgentproject')->with([
      'urgentprojects'=>$urgentprojects,
    ]);
  }
  
  //our zakat page
  public function zakat()
  {
    $pageId   = 10;
    $vistorIp = request()->ip();
   $pageTotalViews = Pages::pageTotalViews($pageId);
    // dd($pageTotalViews);
    if(PagesViews::is_unique_view($vistorIp,$pageId) === true)
    {
      PagesViews::Create([
        'pagesTable'=>$pageId,
        'visitorIp'=>$vistorIp,
      ]);
      \DB::table('pages')
        ->where('pageId',$pageId)
        ->update([
          'totalViews'=> 1,
          'updated_at'=>now(),
        ]);
    
    }
    else
    {
      // dd('bad');
    }
    return view('pages.zakat');
  }
}
