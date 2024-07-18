<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use App\Models\Student;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
        $validatedData = $request->validate([
            'fullname' => 'required',
            'codeStudent' => 'required',
            'reason' => 'required',
            'room' => 'required',
        ]);

        $reason = new Reason();

        $reason->fullname = $validatedData['fullname'];
        $reason->codeStudent = $validatedData['codeStudent'];
        $reason->reason = $validatedData['reason'];
        $reason->room = $validatedData['room'];

        $reason->save();

        // Cập nhật thông tin sinh viên
        $student = Student::where('mssv', $request->codeStudent)->first();
        if ($student) {
            $student->type = 0; // Đổi type thành 0
            $student->save();
        }
        // Sau khi lưu thành công, có thể chuyển hướng người dùng về trang khác hoặc hiển thị thông báo thành công
        return redirect()->route('reasons.store')->with('success', 'Đăng kí thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getReasonByMssv($mssv)
{
    $student = Student::where('mssv', $mssv)->first();

    if (!$student) {
        return response()->json(['message' => 'Student not found'], 404);
    }

    $reasons = $student->reasons;

    if ($reasons->isEmpty()) {
        return response()->json(['message' => 'No reasons found for this student'], 404);
    }

    return response()->json($reasons);
}
}
