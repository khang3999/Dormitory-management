<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name', 'MSSV', 'mail', 'gender', 'phone', 'cccd', 'birthday', 'address', 'nation', 'note', 'time', 'idphong'
    ];

    public function reasons()
    {
        return $this->hasMany(Reason::class, 'codeStudent', 'mssv');
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class, 'idphong');
    }
    
    protected static function boot()
    {
        parent::boot();

        static::created(function ($student) {
            // Khi sinh viên được tạo, cập nhật lại số lượng sinh viên trong phòng
            $student->updateRoomStatus();
        });

        static::deleted(function ($student) {
            // Khi sinh viên bị xoá, cập nhật lại số lượng sinh viên trong phòng
            $student->updateRoomStatus();
        });
    }

    public function updateRoomStatus()
    {
        $room = $this->belongsTo(Room::class, 'idphong', 'id')->first();
        if ($room) {
            $room->status = $this->where('idphong', $room->id)->count();
            $room->save();
        }
    }
}
