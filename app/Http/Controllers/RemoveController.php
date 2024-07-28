<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RemoveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        $students = Student::all();
        $rooms = Room::all();
        foreach ($students as $student) {
            if ($user->mssv == $student->MSSV) {
                $idroom = $student->idphong;
            }
        }
        
        foreach ($rooms as $room) {
            if ($idroom == $room->id) {
                $roomName = $room->name;
            }
        }

        return view('registerOut', ['user' => $user, 'roomName' => $roomName]);
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
