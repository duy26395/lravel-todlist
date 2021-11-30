<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classroom';
    use HasFactory;

    protected $fillable = ['name','total','datestart','dateend'];

    public function Teacher(){
        return $this->hasMany('App\Models\Teacher','id','classroom_id');
    }
    public function Student(){
        return $this->hasMany('App\Models\Student','id','classroom_id');
    }


}
