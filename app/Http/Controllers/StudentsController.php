<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentsReques;
use Illuminate\Support\Facades\Session;
class StudentsController extends Controller
{

    public function index()
    {
        return view('students');

    }
    // Hàm nhận request từ form
    public function displayInfor(StudentsReques $studentsRequest)
    {
        // Lấy session hiện tại hoặc mảng rỗng nếu không có
        $users = session('usersession', [ ]);
    
        // Thêm student mới vào mảng
        $students = [
            'name' => $studentsRequest->input('name'),
            'age' => $studentsRequest->input('age'),
            'date' => $studentsRequest->input('date'),
            'phone' => $studentsRequest->input('phone'),
            'web' => $studentsRequest->input('web'),
            'address' => $studentsRequest->input('address')
        ];
    
        $users[ ] = $students; // Thêm vào mảng
    
        // Lưu mảng vào session
        session(['usersession' => $users]);
    
        // Trả về view với dữ liệu session
        return view('students')->with('users', $users);
    }
   
    public function clear() {
        Session::forget('usersession');
        return redirect('/');
    }

}
