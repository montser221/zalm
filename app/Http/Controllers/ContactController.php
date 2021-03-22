<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactController extends Controller
{
  public function index()
  {
      return view('pages.contact-us');
  }

  public function contact()
  {
    $allContact = ContactUs::latest()->paginate(10);
      return view('dashboard.contact.contact')->with([
        'allContact'=>$allContact,
      ]);
  }
 public function msgDetail($id)
  {
    $data = ContactUs::find($id);
      return view('dashboard.contact.msgDetail')->with([
        'data'=>$data,
      ]);
  }

  public function store(Request $request)
  {
   
    $request->validate([
        'msgType'    => 'required',
        'fullName'    => 'required',
        'email' => 'required|email',
        'topic'   => 'required',
        'msg' => 'required',
         
    ]);
 
    $contact = new ContactUs;
 
    $contact->msgType  = $request->input('msgType');
    $contact->fullname  = $request->input('fullName');
    $contact->email     = $request->input('email');
    $contact->topic     = $request->input('topic');
    $contact->message   = $request->input('msg');
    $msg="";
    if( $request->msgType == "complaint")
    {
      $msg = " تم ارسال شكوتك بنجاح شكرا لك";
    }
    elseif($request->msgType == "suggist")
    {
      $msg = " تم ارسال أقتراحك بنجاح شكرا لك";
    }
    elseif($request->msgType == "inquire")
    {
      $msg = " تم ارسال استفسارك بنجاح شكرا لك";

    }
    $contact->save();
    return redirect()->route('contact.index')->with('success',$msg);
  }

   public function store2(Request $request)
  {
    // return $request->all();
    $request->validate([
        'msgType'    => 'required',
        'fullName'    => 'required',
        'email' => 'required',
        'topic'   => 'required',
        'msg' => 'required',
         
    ]);

    $contact = new ContactUs;
 
    $contact->msgType  = $request->input('msgType');
    $contact->fullname  = $request->input('fullName');
    $contact->email     = $request->input('email');
    $contact->topic     = $request->input('topic');
    $contact->message   = $request->input('msg');
 
    $contact->save();
    return redirect()->route('/')->with('success',' تم ارسال رسالتكم بنجاح شكرا لكم');
  }

  public function destroy($id)
  {
    // ContactUs::where('contactId',[2,3,4,5])->delete();

    // delete project by id
    if(intval($id)){
      \DB::table('contact_us')
      ->where('contactId',[2,3,4,5])
      ->delete();
    }
    return redirect()->route('contact.contact')->with('success','تم حذف   الرسالة بنجاح ');
  }
}
