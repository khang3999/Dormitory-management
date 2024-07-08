<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsInExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Student::all('id','MSSV','name','cccd','gender','birthday','mail','phone','nation','address','idphong','note');
    }

    public function headings(): array
    {
        return [
            'ID',
            'MSSV',
            'Tên sinh viên',
            'Số CCCD',
            'Giới tính',
            'Ngày sinh',
            'Email',
            'Số điện thoại',
            'Quốc tịch',
            'Địa chỉ',
            'Mã phòng',
            'Ghi chú'
            // Thêm các cột khác nếu cần thiết
        ];
    }
}