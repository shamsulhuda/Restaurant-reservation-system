<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request){
    	$this->validate($request,[
    		'name'=> 'required',
    		'email'=> 'required|email',
    		'phone'=> 'required',
    		'datepicker'=> 'required'
    	]);

    	$reserve = new Reservation();

    	$reserve->name = $request->name;
    	$reserve->email = $request->email;
    	$reserve->phone = $request->phone;
    	$reserve->date_and_time = $request->datepicker;
    	$reserve->message = $request->message;
    	$reserve->status = false;

    	$reserve->save();

   	    Toastr::success('Your reservation is complete, we will contact you shortly!', 'Success', ["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
