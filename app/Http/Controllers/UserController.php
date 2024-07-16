<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;


class UserController extends Controller
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
    public function create(Request $request)
    {
        // dd('Store method called');
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mssv= $request->input('mssv');
        $user->password = bcrypt($request->input('mssv'));
        $user->permission = "student";
        $user->save();
        return response()->json(['message' => 'đã tạo tài khoản cho sinh viên']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Request $request)
    {
        $mssv = $request->input('mssv');
        $user = User::where('mssv', $mssv)->first();
    
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully.'], 200);
        } else {
            return response()->json(['message' => 'User not found.'], 404);
        }
    }
    // $student = Student::findOrFail($id);
    // $student->delete();
    // return response()->json(['message' => 'Xoá sinh viên thành công!']);
}
