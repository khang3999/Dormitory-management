<?php

namespace App\Http\Controllers;

use App\Exports\RoomsExport;
use App\Exports\StudentsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function studentsExport()
    {
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
    public function roomsExport()
    {
        return Excel::download(new RoomsExport, 'rooms.xlsx');
    }
}
