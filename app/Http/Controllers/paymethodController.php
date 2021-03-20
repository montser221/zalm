<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Settings;

class paymethodController extends Controller
{
  // Our paymethod page
  public function paymethod()
  {
    $paymethod = PaymentMethod::all()->where('methodStatus',1);
    $setting     = Settings::find(1);

    return view('pages.paymethod')->with([
      'paymethod'=>$paymethod,
        'data'=>$setting,
    ]);
  }
}
