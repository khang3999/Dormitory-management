<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $students = Student::all(); // Hoặc lấy dữ liệu theo điều kiện phù hợp
    return view('admin.student-in', compact('students'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'avatar' => 'required|image',
            'fullname' => 'required',
            'gender' => 'required',
            'dayBorn' => 'required',
            'liveIn' => 'required',
            'class' => 'required',
            'course' => 'required',
            'codeStudent' => 'required',
            'phoneNumber' => 'required',
            'job' => 'nullable',
            'uutien' => 'nullable',
        ]);

        $student = new Student();
        $student->avatar = $validatedData['codeStudent'] . '.jpg';
        $student->name = $validatedData['fullname'];
        $student->password = '';
        $student->mail = 'example@gmai.com';
        $student->cccd = '23456789';
        $student->gender = $validatedData['gender'];
        $student->birthDay = $validatedData['dayBorn'];
        $student->address = $validatedData['liveIn'];
        $student->nation = $validatedData['class'];
        $student->course = $validatedData['course'];
        $student->MSSV = $validatedData['codeStudent'];
        $student->phone = $validatedData['phoneNumber'];
        $student->job = $validatedData['job'];
        $student->note = $validatedData['uutien'];
        $student->type = '2';
        $student->time = now();
        $student->idphong = '0';

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = $validatedData['codeStudent'] . '.jpg';
            $avatar->move(public_path('images/avatar/'), $filename);
        }

        $student->save();

        // Sau khi lưu thành công, có thể chuyển hướng người dùng về trang khác hoặc hiển thị thông báo thành công
        return redirect()->route('students.store')->with('success', 'Đăng kí thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Lấy thông tin sinh viên theo ID
        $student = Student::findOrFail($id);

        // Trả về view để hiển thị thông tin chi tiết của sinh viên
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
    
        $student->name = $request->name;
        $student->MSSV = $request->MSSV;
        $student->mail = $request->mail;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->cccd = $request->cccd;
        $student->birthday = $request->birthday;
        $student->address = $request->address;
        $student->nation = $request->nation;
        $student->note = $request->note;
        $student->time = $request->time;
        $student->idphong = $request->phong;
        $student->class = $request->class;
        $student->course = $request->course;
        $student->job = $request->job;
    
        $student->save();
    
        return response()->json(['message' => 'Cập nhật thành công!']);
    }
    public function duyetdon(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
    
        // $student->name = $request->name;
        // $student->MSSV = $request->MSSV;
        // $student->mail = $request->mail;
        // $student->gender = $request->gender;
        // $student->phone = $request->phone;
        // $student->cccd = $request->cccd;
        // $student->birthday = $request->birthday;
        // $student->address = $request->address;
        // $student->nation = $request->nation;
        // $student->note = $request->note;
        // $student->time = $request->time;
        $student->type= 1;
        $student->idphong = $request->phong;
    
        $student->save();
    
        return response()->json(['message' => 'Cập nhật thành công!']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Xoá sinh viên thành công!']);
    }
//lay sinh vien đăng kí ở trong ktx
    public function getStudentIn()
    {
        $students = Student::where('type', 2)->with('room')->get();
        return view('admin.student-in', compact('students'));
    }
    public function getStudentOut()
    {
        $students = Student::where('type', 0)->with('room')->get();
        return view('admin.student-out', compact('students'));
    }
//lay sinh vien đang  ở trong ktx
    public function getStudentInRightNow()
    {
        $students = Student::whereIn('type', [0,1])->with('room')->get();
        return view('admin.students', compact('students'));
    }


}
