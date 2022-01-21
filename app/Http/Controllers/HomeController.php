<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }else{
                return view('admin.home');
            }
        }else{
            return redirect()->back();
        }
    }

    public function index(){
        if(Auth::id()){
            return redirect('home');
        }else{
            $doctor = doctor::all();
            return view('user.home',compact('doctor'));
        }
       
    }

    public function appointment(Request $request){
        $data = new appointment;
        if(Auth::id()){
            $data->user_id = Auth::user()->id;
            $data->name = Auth::user()->name;
            $data->email = Auth::user()->email;
            $data->phone = Auth::user()->phone;
        }else{
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->number;
        }
        $data->date = $request->date;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';
        
        $data->save();
        return redirect()->back()->with('message','Appointment Successful');
    }

    public function myappointment(){
        if(Auth::id()){
            $user_mail = Auth::user()->email;

            $appoint = appointment::where('email',$user_mail)->get();
            return view('user.my_appointment',compact('appoint'));
        }else{
            return redirect()->back();
        }
        
    }

    public function cancel_appoint($id){
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
