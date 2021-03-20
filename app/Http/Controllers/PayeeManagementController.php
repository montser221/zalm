<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayeeManagement;
class PayeeManagementController extends Controller
{
  public function index()
  {
      $allpayees = PayeeManagement::latest()->paginate(5);
      return view('dashboard.payees.index')->with(['allpayees'=>$allpayees]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
        'pName'           => 'required',
        'healthState'     => 'required',
        'gender'          => 'required',
        'ssnNumber'       => 'required|numeric',
        // 'pImage'          => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2028',
    ]);
    // // create project instance
    $payees = new PayeeManagement;

    if ($request->has('pStatus')) {
      $payees->pStatus   = $request->input('pStatus');
    }

    $payees->pName   = $request->input('pName');
    $payees->healthState   = $request->input('healthState');
    $payees->gender   = $request->input('gender');
    $payees->ssnNumber   = $request->input('ssnNumber');
    $payees->save();
    return redirect()->route('payees.index')->with('success','تم أضافة  المستفيد بنجاح');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $data = PayeeManagement::find($id);
    return view('dashboard.payees.edit')->with(['data'=>$data]);
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

    if ($request->has('pStatus'))
    {
      \DB::table('payee_management')
      ->where('pId',$id)
      ->update([
        'pStatus'=>$request->input('pStatus'),
      ]);
    }

    \DB::table('payee_management')
    ->where('pId',$id)
    ->update([
      'pName'=>$request->input('pName'),
      'healthState'=>$request->input('healthState'),
      'ssnNumber'=>$request->input('ssnNumber'),
      'gender'=>$request->input('gender'),
    ]);

    return redirect()->route('payees.index')->with('success','تم تحديث  بيانات  المستفيد بنجاح');
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
      \DB::table('payee_management')
      ->where('pId',$id)
      ->delete();
    }
    return redirect()->route('payees.index')->with('success','تم حذف المستفيد بنجاح ');
  }
}
