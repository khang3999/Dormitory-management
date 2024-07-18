<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    use HasFactory;
    protected $table = 'reasons';
    protected $fillable = [
        'fullname','codeStudent', 'reason', 'room'
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'codeStudent', 'mssv');
    }
}
