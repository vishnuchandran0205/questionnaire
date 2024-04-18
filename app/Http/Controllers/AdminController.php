<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmissionStatus;
use App\Models\Student;

class AdminController extends Controller
{
    public function showSubmittedForms()
    {
        $submittedForms = Student::all();

        return view('backend.submitted_forms',compact('submittedForms'));
    }

    public function admitStudents(Request $request)
    {
        $admittedStudentIds = $request->input('admitted_students');
        //print_r($admittedStudentIds);die;
        $update=AdmissionStatus::whereIn('student_id', $admittedStudentIds)
        ->update(['admitted' => 1]);
        $updateStudent=Student::whereIn('id', $admittedStudentIds)
        ->update(['admission_status' => 1]);
        if($update){
            return redirect()->back()->with('success', 'Students admitted successfully.');
        }else{
            return redirect()->back()->with('error', 'Insertion failed.');
        }

        
    }

    public function checkFreeBusFare(Student $student, $id)
    {
        $studentData = Student::findOrFail($id, ['latitude', 'longitude']);

        $studentLatitude = $studentData->latitude;
        $studentLongitude = $studentData->longitude;
        $schoolLatitude = 10.0143499;
        $schoolLongitude = 76.3921148;

        $distance = $this->calculateDistance($studentLatitude, $studentLongitude, $schoolLatitude, $schoolLongitude);
        $isWithin2km = $distance <= 2.0;
        return view('backend.free_bus_fare_status', ['isWithin2km' => $isWithin2km]);
    }


    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; 

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c; 

        return $distance;
    }


}
