<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'rooms';

    public function students()
    {
        return $this->hasMany(Student::class, 'idphong');
    }
   
}
