<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage(Request $request){
    	$this->validate($request, [
    		'name'=> 'required',
    		'email'=> 'required',
    		'subject'=> 'required',
    		'message'=> 'required',
    	]);

    	$contact_info = new Contact();

    	$contact_info->name = $request->name;
    	$contact_info->email = $request->email;
    	$contact_info->subject = $request->subject;
    	$contact_info->message = $request->message;

    	$contact_info->save();

    	Toastr::success('Your message is send successfully. Someone contact you shortly!', 'Success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
