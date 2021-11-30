<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Teacher extends Model
{
    protected $table = 'teacher';
    use HasFactory;

    protected $fillable = ['name','phonenumber','email','qualification','classroom_id'];

    public function Classroom(){
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
    
}
