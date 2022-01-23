<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;

use Illuminate\Support\Facades\Auth;

use App\Models\Appointment;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addview(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login'); 
        }
        
    }

    public function upload(Request $request){
        $this->validate($request, [
            'name' => 'required|max:60|min:5|regex:/^[\pL\s\-]+$/u',
            'number' => 'required|digits:9',
            'room' => 'required|max:3',
        ]);


        $doctor=new doctor;

        $image = $request->file;

        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage',$imagename);
        
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    public function showappointment(){
        if(Auth::id()){
            if(Auth::user()->usertype==1){
                $data = appointment::all();
                return view('admin.showappointment',compact('data'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect('login'); 
        }
        
    }

    public function approved($id){
        if(Auth::user()->usertype==1){
            $data = appointment::find($id);
            $data->status='Approved';
            $data->save();

            return redirect()->back();
        }else{
            return redirect()->back();
        }
        
    }

    public function declined($id){
        if(Auth::user()->usertype==1){
            $data = appointment::find($id);
            $data->status='Declined';
            $data->save();
        }
        return redirect()->back();
    }

    public function showdoctor(){
        if(Auth::user()->usertype==1){
            $data = doctor::all();
            return view('admin.showdoctor',compact('data'));
        }else{
            return redirect()->back();
        }

    }

    public function deletedoctor($id){
        if(Auth::user()->usertype==1){
            $data = doctor::find($id);
            $data->delete();

        }
        return redirect()->back();   
    }

    public function updatedoctor($id){
        if(Auth::user()->usertype==1){
            $data = doctor::find($id);

            return view('admin.update_doctor',compact('data'));
        }else{
            return redirect()->back();
        }
        
    }

    public function editdoctor(Request $request, $id){
        if(Auth::user()->usertype==1){
            $doctor = doctor::find($id);

            $this->validate($request, [
                'name' => 'required|max:60|min:5|regex:/^[\pL\s\-]+$/u',
                'phone' => 'required|digits:9',
                'room' => 'required|max:3',
            ]);
            
            
            $doctor->name = $request->name;
            $doctor->phone = $request->phone;
            $doctor->speciality = $request->speciality;
            $doctor->room = $request->room;
            $image = $request->file;
            if($image){
                $image = $request->file;
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->file->move('doctorimage',$imagename);
                $doctor->image=$imagename;
            }
            

            $doctor->save();
            return redirect()->back()->with('message','Doctor Updated Successfully');
        }else{
            return redirect()->back();
        }
        
    }

    public function emailview($id){
        if(Auth::user()->usertype==1){
            $data = appointment::find($id);
            return view('admin.email_view',compact('data'));
        }else{
            return redirect()->back();
        }
        
    }

    public function sendemail(Request $request,$id){
        $data = appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with('message','Email sent!');
    }
}
