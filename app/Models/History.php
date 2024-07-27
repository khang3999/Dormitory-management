<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Nếu bạn không sử dụng timestamps trong bảng, hãy thêm dòng này
    public $timestamps = false;

    // Nếu bạn muốn bảo vệ các cột cụ thể, hãy sử dụng $fillable hoặc $guarded
    protected $fillable = ['idphong', 'status', 'ngayhu', 'ngaysua', 'type'];
}
