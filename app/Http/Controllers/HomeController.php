<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only' => ['cancel_appoint','myappointment']]);
    }

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
        $this->validate($request, [
            'name' => 'required|max:60|min:5|regex:/^[\pL\s\-]+$/u',
            'number' => 'required|digits:9',
            'email' => 'required|email|max:70|min:6',
            'message' => 'max:200',
            'date' => 'required|after_or_equal:today'
        ]);

        $data = new appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->number;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';
     
        $data->save();
        return redirect()->back()->with('message','Appointment Successful');
    }

    public function myappointment(){
        $user_mail = Auth::user()->email;

        $appoint = appointment::where('email',$user_mail)->get();
        return view('user.my_appointment',compact('appoint'));

        
    }

    public function cancel_appoint($id){
        $id_user = Auth::user()->id;
        $data = appointment::find($id);
        if($data->user_id == $id_user){
            $data->delete();
        }
        return redirect()->back(); 
    }
}
