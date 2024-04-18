<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AdmissionStatus;
use App\Models\Student;

class AdmissionController extends Controller
{
    public function admission_form()
    {
        return view('front-end.admission');
    }

    public function submit_admission(Request $request){

        $name=request('name');
        $email=request('email');
        $gender=request('gender');
        $age=request('age');
        $address=request('address');
      
        if ($request->hasFile('tc')) {
            $tc = $request->file('tc');
            $tc_im = 'tc_'.time().'.'.$tc->extension();
            $tc->move(public_path('tc'), $tc_im);
        }
       
        if ($request->hasFile('mark_sheet')) {
            $marksheet = $request->file('mark_sheet');
            $marksheet_im = 'mark_sheet_'.time().'.'.$marksheet->extension();
            $marksheet->move(public_path('mark_sheet'), $marksheet_im);
        }

        $latitude=request('latitude');
        $longitude=request('longitude');

        $reg_number=request('reg_number');

        $insertDATA = new Student();
        $insertDATA->name =$name;
        $insertDATA->reg_number =$reg_number;
        $insertDATA->email =$email;
        $insertDATA->gender =$gender;
        $insertDATA->age =$age;
        $insertDATA->address=$address;
        $insertDATA->tc_path=$tc;
        $insertDATA->mark_sheet_path=$marksheet;
        $insertDATA->latitude =$latitude;
        $insertDATA->longitude = $longitude;

        if($insertDATA->save()){
            $student_id= $insertDATA->id;
            $insert = new AdmissionStatus();
            $insert->student_id =$student_id;
            $insert->save();
           
            
            return redirect()->back()->with('success', 'Admission added successfully.');
        }else{
            return redirect()->back()->with('error', 'Insertion failed.');
        }
    }

    public function admission_status(Request $request){
        return view('front-end.admission_status');
    }

    public function checkAdmissionStatus(Request $request)
    {
        $admissionNumber = $request->input('admission_number');
        $status = $this->getAdmissionStatus($admissionNumber);
        return redirect()->back()->with('status', $status);
    }
    private function getAdmissionStatus($admissionNumber)
    {
        $getadmission_number=Student::where('reg_number',$admissionNumber)->where('admission_status',1)->first();
        if ($getadmission_number) {
            return 'Admitted';
        } else {
            return 'Not Admitted';
        }
    }



}
