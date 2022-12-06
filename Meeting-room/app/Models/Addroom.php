<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nameroom',
        'dateroom',
        'timeroom',
    ];

    public function user()
    {
        //เชื่อมตารางแบบ Eloquent เป็นแบบ 1:1
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}