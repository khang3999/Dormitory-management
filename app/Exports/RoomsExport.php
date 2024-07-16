<?php

namespace App\Exports;

use App\Models\Room;
use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoomsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Room::all('id','name','gender','status','note');
    }

    public function headings(): array
    {
        return [
            'Mã phòng',
            'Tên phòng',
            'Loại phòng',
            'Số lượng',
            'Ghi chú',
            // Thêm các cột khác nếu cần thiết
        ];
    }
}