<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutAssociation;
use Intervention\Image\Facades\Image;
class AboutAssociationController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $allaboutassoiation = AboutAssociation::latest()->paginate(5);
      return view('dashboard.aboutassoiation.index')->with(['allaboutassoiation'=>$allaboutassoiation]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
// 'associationTitle','managerWord','showInHome','managerName','associationIcon'
    $request->validate([
        'associationTitle'     => 'required',
        'managerName'          => 'required',
        'managerWord'          => 'required',
        'vison'                => 'required',
        'message'              => 'required',
       'visonIcon'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2028',
       'messageIcon'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2028',
       'messageImage'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:14000',
       'visonImage'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:14000',
       'facebook'=>'link',
       'twitter'=>'link',
       'instagram'=>'link',
       'linkedin'=>'link',

    ]);
    // check if project status checked or not
    $AboutAssociation = new AboutAssociation;
    if($request->has('associationStatus'))
    {
         $AboutAssociation->associationStatus = $request->input('associationStatus');
    }

    if($request->has('showInHome'))
    {
         $AboutAssociation->showInHome =1;
    }

   
    //store vison icon
    if($request->file('visonIcon')){

        $image_name = time() . rand(1,1000000000000);
        $image_ext = $request->file('visonIcon')->getClientOriginalExtension(); // example: png, jpg ... etc
        $image_full_name = $image_name . '.' . $image_ext;

        $uploads_folder =  getcwd() .'/uploads/aboutassoiation/';
        if (!file_exists($uploads_folder)) {
            mkdir($uploads_folder, 0777, true);
        }
        $request->file('visonIcon')->move($uploads_folder,    $image_full_name);
        // $image = Image::make( public_path("uploads/aboutassoiation/{$image_full_name}"))->fit(800,800);
        // $image->save();
        $AboutAssociation->visonIcon='uploads/aboutassoiation/'.$image_full_name;
    }
    //Store message Icon
    if($request->file('messageIcon')){

        $image_name = time() . rand(1,1000000000000);
        $image_ext = $request->file('messageIcon')->getClientOriginalExtension(); // example: png, jpg ... etc
        $image_full_name = $image_name . '.' . $image_ext;

        $uploads_folder =  getcwd() .'/uploads/aboutassoiation/';
        if (!file_exists($uploads_folder)) {
            mkdir($uploads_folder, 0777, true);
        }
        $request->file('messageIcon')->move($uploads_folder,    $image_full_name);
        // $image = Image::make( public_path("uploads/aboutassoiation/{$image_full_name}"))->fit(800,800);
        // $image->save();
        $AboutAssociation->messageIcon='uploads/aboutassoiation/'.$image_full_name;
    }
    //store image vison
    if($request->file('visonImage')){

      $image_name = time() . rand(1,1000000000000);
      $image_ext = $request->file('visonImage')->getClientOriginalExtension(); // example: png, jpg ... etc
      $image_full_name = $image_name . '.' . $image_ext;

      $uploads_folder =  getcwd() .'/uploads/aboutassoiation/';
      if (!file_exists($uploads_folder)) {
          mkdir($uploads_folder, 0777, true);
      }
      $request->file('visonImage')->move($uploads_folder,    $image_full_name);
      // $image = Image::make( public_path("uploads/aboutassoiation/{$image_full_name}"))->fit(1200,1200);
      // $image->save();
      $AboutAssociation->visonImage="uploads/aboutassoiation/".$image_full_name;
    }
    //store image message
    if($request->file('messageImage')){

    $image_name = time() . rand(1,1000000000000);
    $image_ext = $request->file('messageImage')->getClientOriginalExtension(); // example: png, jpg ... etc
    $image_full_name = $image_name . '.' . $image_ext;

    $uploads_folder =  getcwd() .'/uploads/aboutassoiation/';
    if (!file_exists($uploads_folder)) {
        mkdir($uploads_folder, 0777, true);
    }
    $request->file('messageImage')->move($uploads_folder,    $image_full_name);
    // $image = Image::make( public_path("uploads/aboutassoiation/{$image_full_name}"))->fit(1200,1200);
    // $image->save();
    $AboutAssociation->messageImage="uploads/aboutassoiation/".$image_full_name;
    }

    $AboutAssociation->associationTitle = $request->input('associationTitle');
    $AboutAssociation->managerName      = $request->input('managerName');
    $AboutAssociation->managerWord      = $request->input('managerWord');
    $AboutAssociation->vison            = $request->input('vison');
    $AboutAssociation->message          = $request->input('message');
    $AboutAssociation->facebook          = $request->input('facebook');
    $AboutAssociation->twitter          = $request->input('twitter');
    $AboutAssociation->instagram         = $request->input('instagram');
    $AboutAssociation->linkedin         = $request->input('linkedin');
    $AboutAssociation->save();
    return redirect()->route('aboutassoiation.index')->with('success','تم أضافة بيانات الجمعية بنجاح');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data = AboutAssociation::find($id);
    return view('dashboard.aboutassoiation.edit')->with(['data'=>$data]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {

    if($request->has('associationStatus')){

        \DB::table('about_associations')
        ->where('associationId',$id)
        ->update([
          'associationStatus'=>$request->input('associationStatus'),
        ]);
    }

    if($request->has('showInHome') ){
      // if($request->input('showInHome')=)
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'showInHome'=>1,
      ]);
    }
    else
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'showInHome'=>0,
      ]);
    }
    //update vison icon
    if($request->file('visonIcon')){
      \Storage::delete(AboutAssociation::find($id)->visonIcon);
        $image_name = time() . rand(1,1000000000000);
        $image_ext = $request->file('visonIcon')->getClientOriginalExtension(); // example: png, jpg ... etc
        $image_full_name = $image_name . '.' . $image_ext;

        $uploads_folder =  getcwd() .'/uploads/aboutassoiation';
        if (!file_exists($uploads_folder)) {
            mkdir($uploads_folder, 0777, true);
        }
        $request->file('visonIcon')->move($uploads_folder,    $image_full_name);
        // $image = Image::make( public_path("uploads/aboutassoiation/{$image_full_name}"))->fit(800,800);
        // $image->save();
        \DB::table('about_associations')
        ->where('associationId',$id)
        ->update([
          'visonIcon'=>'uploads/aboutassoiation/'.$image_full_name,
        ]);
    }
    //update message Icon
    if($request->file('messageIcon')){
      \Storage::delete(AboutAssociation::find($id)->messageIcon);
        $image_name = time() . rand(1,1000000000000);
        $image_ext = $request->file('messageIcon')->getClientOriginalExtension(); // example: png, jpg ... etc
        $image_full_name = $image_name . '.' . $image_ext;

        $uploads_folder =  getcwd() .'/uploads/aboutassoiation';
        if (!file_exists($uploads_folder)) {
            mkdir($uploads_folder, 0777, true);
        }
        $request->file('messageIcon')->move($uploads_folder,    $image_full_name);
        // $image = Image::make( public_path("uploads/aboutassoiation/{$image_full_name}"))->fit(800,800);
        // $image->save();
        \DB::table('about_associations')
        ->where('associationId',$id)
        ->update([
          'messageIcon'=>'uploads/aboutassoiation/'.$image_full_name,
        ]);
    }

    //store image vison
    if($request->file('visonImage')){

      $image_name = time() . rand(1,1000000000000);
      $image_ext = $request->file('visonImage')->getClientOriginalExtension(); // example: png, jpg ... etc
      $image_full_name = $image_name . '.' . $image_ext;

      $uploads_folder =  getcwd() .'/uploads/aboutassoiation/';
      if (!file_exists($uploads_folder)) {
          mkdir($uploads_folder, 0777, true);
      }
      $request->file('visonImage')->move($uploads_folder,    $image_full_name);
      
    \DB::table('about_associations')
    ->where('associationId',$id)
    ->update([
      'visonImage'=>"uploads/aboutassoiation/".$image_full_name
    ]);
     
    }
    //store image message
    if($request->file('messageImage')){

      $image_name = time() . rand(1,1000000000000);
      $image_ext = $request->file('messageImage')->getClientOriginalExtension(); // example: png, jpg ... etc
      $image_full_name = $image_name . '.' . $image_ext;

      $uploads_folder =  getcwd() .'/uploads/aboutassoiation/';
      if (!file_exists($uploads_folder)) {
          mkdir($uploads_folder, 0777, true);
      }
      $request->file('messageImage')->move($uploads_folder,    $image_full_name);
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'messageImage'=>"uploads/aboutassoiation/".$image_full_name
      ]);

  }
   
    if($request->has('associationTitle'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'associationTitle'=>$request->input('associationTitle'),
        'vison'=>$request->input('vison'),
      ]);
        
    }
    if($request->has('managerName'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'managerName'=>$request->input('managerName'),
      ]);
      
    }
    if($request->has('managerWord'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'managerWord'=>$request->input('managerWord'),
      ]);
    }
    if($request->has('vison'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'vison'=>$request->input('vison'),
      ]);
    }
    if($request->has('message'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'message'=>$request->input('message'),
      ]);
    }
    if($request->has('facebook'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'facebook'=>$request->input('facebook'),
      ]);
    }
    if($request->has('twitter'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'twitter'=>$request->input('twitter'),
      ]);
    }
    if($request->has('instagram'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'instagram'=>$request->input('instagram'),
      ]);
    }
    if($request->has('linkedin'))
    {
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->update([
        'linkedin'=>$request->input('linkedin'),
      ]);
    }
    return redirect()->route('aboutassoiation.index')->with('success','تم تحديث  بيانات   الجمعية بنجاح');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // delete project by id
    if(intval($id)){
      \DB::table('about_associations')
      ->where('associationId',$id)
      ->delete();
    }
    return redirect()->route('aboutassoiation.index')->with('success','تم حذف طريقة الدفع بنجاح ');
  }
}
