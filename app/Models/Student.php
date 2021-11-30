<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    use HasFactory;

    protected $fillable = ['name','phonenumber','email','address','classroom_id'];

    public function Classroom(){
        return $this->belongsTo('App\Models\Classroom','classroom_id');
    } 
}
