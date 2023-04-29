<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use Notification;
use App\Notifications\sendEmailNotification;
use illuminate\Support\Facades\Auth;
use App\Models\Ambulance;


class AdminController extends Controller
{
    public function addview()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.add_doctor');
            }
            else
            {
                return redirect()->back();
            }
        }else
        {
            return redirect('login');
        }
        return view('admin.add_doctor');
    }
    public function upload(Request $request)
    {
        $doctor= new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->fee=$request->fee;

        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully!');
    }
    public function showappointment()
    {
        
        $data=appointment::all();
        return view('admin.showappointment',compact('data'));
    }
    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $data=appointment::find($id);
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        
        $data= doctor::all();

        return view('admin.showdoctor',compact('data'));
    }
    public function deletedoctor($id)
    {
        $data=doctor::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function updatedoctor($id)
    {
        $data=doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor= doctor::find($id);
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->fee=$request->fee;
        $image=$request->file;
        if($image)
        {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $image=$request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Updated Successfully!');
    }
    public function emailview($id)
    {
        $data=appointment::find($id);
        return view('admin.email_view',compact('data'));
    }
    public function sendemail(Request $request, $id)
    {
        $data=appointment::find($id);
        $details=['greeting'=>$request->greeting,
        'body'=>$request->body,
        'actiontext'=>$request->actiontext,
        'actionurl'=>$request->actionurl,
        'endpart'=>$request->endpart];

        Notification::send($data,new SendEmailNotification($details));
        return redirect()->back();
    }

    public function add_ambulance()
    {
        return view('admin.add_ambulance');
    }
    public function upload_ambulance(Request $request)
    {
        $ambulance= new ambulance;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->file->move('ambulanceimage',$imagename);
        $ambulance->image=$imagename;

        $ambulance->name=$request->name;
        $ambulance->phone=$request->number;
        $ambulance->numberplate=$request->numberplate;
        

        $ambulance->save();
        return redirect()->back()->with('message','Vehicle Added Successfully!');
    }
    
}

