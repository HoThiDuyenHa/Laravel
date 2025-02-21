<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentsReques;
class StudentsController extends Controller
{

    public function index()
    {
        return view('students');

    }

    public function displayInfor(StudentsReques $studentsRequest)
    {
        $students=[
                'name'=>$name=$studentsRequest->input("name"),
                'age'=>$age=$studentsRequest->input('age'),
                'date'=>$date=$studentsRequest->input('date'),
                'phone'=>$phone=$studentsRequest->input('phone'),
                'web'=>$web=$studentsRequest->input('web'),
                'address'=>$address=$studentsRequest->input('address')
        ];
        return view('students')->with('students',$students);
    }

    
}
