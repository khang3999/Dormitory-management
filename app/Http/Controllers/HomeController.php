<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::all();
        $user = Auth::user();
        return view('home', ['events' => $events, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('myLogin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required',
                'permission' => 'required'
            ],
            [
                'username' => 'Username is required',
                'password' => 'Password is required',
                'permission' => 'Permission is invalid'
            ]
        );
        if ($request->permission == 'admin') { // Là admin
            $admin = DB::table('admin')->where('username', $request->username)->first();
            // if ($admin && Hash::check($request->password, $admin->password)) {
            if ($admin && $request->password == $admin->password) {
                session(['admin_id' => $admin->id]);
                return redirect()->route('admin.rooms');
            } else {
                return back()->withErrors(['username' => 'Invalid username or password']);
            }
        } else { // là student
            $student = Student::where('MSSV', $request->username)->first();
            if ($student && Hash::check($request->password, $student->password)) {
                session(['student_id' => $student->id]);
                return redirect()->route('home');
            } else {
                return back()->withErrors(['username' => 'Invalid username or password']);
            }
        }
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
}
