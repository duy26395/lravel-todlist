<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentControler extends Controller
{
    public function index()
    {
        // $classroom = DB::table('Classroom as c')
        //     ->leftJoin('student as t', 't.classroom_id', '=', 'c.id')
        //     ->select('t.name as namestudent','c.id','c.name','total')
        //     -> where('c.name','=','vue')
        //     ->get();

        // $classroom = Classroom::all();
        $student = DB::table('student as s')
            ->leftJoin('classroom as c', 's.classroom_id', '=', 'c.id')
            ->select('s.id', 's.name as namestudent', 's.phonenumber', 'c.name as nameclass')
            ->get();
        return view('student/student_list', compact('student'));

    }
    public function show_add_form()
    {   
        $classroom = Classroom::all();
        return view('student/student_add',compact('classroom'));
    }

    public function store(Request $request)
    {

        
        $student = new Student();
        $student->name = $request->studentname;
        $student->phonenumber = $request->studentphone;
        $student->address = $request->studentaddress;
        $student->email = $request->studentemail;
        $student->classroom_id = $request->classid;

        $student->save();
        return redirect()->route('student.list');

    }

    public function delete(Request $request, $id)
    {
        $student = Student::find($id)->delete();
        return redirect()->route('student.list');
    }
    public function show($id)
    {

        $classroom = Classroom::all();

        $student = DB::table('student as s')
            ->leftJoin('classroom as c', 's.classroom_id', '=', 'c.id')
            ->select('s.id', 's.name', 's.phonenumber',  's.email', 's.address','c.name as nameclass')
            -> where('s.id','=',$id)
            ->first();
        return view('student/student_show', compact('student','classroom'));
    }
    public function edit(Request $request, $id)
    {
        $student = Student::where('id', $id)->update([
            'name' => $request->post('studentname'),
            'phonenumber' => $request->post('studentphone'),
            'email' => $request->post('studentemail'),
            'address' => $request->post('studentaddress'),
            'classroom_id' => $request->post('classid'),
        ]);
        return redirect()->route('student.list');
    }
}