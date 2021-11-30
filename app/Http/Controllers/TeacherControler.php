<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherControler extends Controller
{
    public function index()
    {
        // $classroom = DB::table('Classroom as c')
        //     ->leftJoin('student as t', 't.classroom_id', '=', 'c.id')
        //     ->select('t.name as namestudent','c.id','c.name','total')
        //     -> where('c.name','=','vue')
        //     ->get();
        $classroom = Classroom::all();
        $teacher = DB::table('teacher as t')
            ->leftJoin('classroom as c', 't.classroom_id', '=', 'c.id')
            ->select('t.id', 't.name as teachername', 't.phonenumber', 't.qualification', 'c.name as nameclass')
            ->get();
        return view('teacher/teacher_list', compact('teacher'))->with(['classroom' => $classroom]);
    }
    public function show_all()
    {
        $teacher = DB::table('teacher as t')
            ->leftJoin('classroom as c', 't.classroom_id', '=', 'c.id')
            ->select('t.id', 't.name as teachername', 't.phonenumber', 't.qualification', 'c.name as nameclass')
            ->get();

        $html = view('teacher/teacher_showall', compact('teacher'))->render();

        return $html;

    }

    public function show_add_form()
    {
        $classroom = Classroom::all();
        return view('teacher/teacher_add', compact('classroom'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'teachername' => 'required',
            'teacherphone' => 'required',
            'teacherqualification' => 'required',
            'teacheremail' => 'required',
            'classid' => 'required',
        ]);

        $teacher = new Teacher();
        $teacher->name = $data['teachername'];
        $teacher->phonenumber = $data['teacherphone'];
        $teacher->qualification = $data['teacherqualification'];
        $teacher->email = $data['teacheremail'];
        $teacher->classroom_id = $data['classid'];

        $teacher->save();
        if (!is_null($teacher)) {
            return response()->json(['status' => true, 'message' => 'Teacher created successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to create Teacher']);
        }
    }
    public function delete($id)
    {
        $teacher = Teacher::find($id)->delete();
        // return redirect()->route('teacher.list');
        if (!is_null($teacher)) {
            return response()->json(['status' => true, 'message' => 'Teacher created successfully']);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to create Teacher']);
        }
    }
    public function show($id)
    {

        $teacher = DB::table('teacher as t')
            ->leftJoin('classroom as c', 't.classroom_id', '=', 'c.id')
            ->select('t.id', 't.name as teachername', 't.phonenumber', 't.email', 't.qualification', 'c.name as nameclass', 't.classroom_id')
            ->where('t.id', '=', $id)
            ->first();
        if (!is_null($teacher)) {
            return response()->json(['status' => true, 'id' => $teacher->id, 'teachername' => $teacher->teachername, 'phonenumber' => $teacher->phonenumber,
                'qualification' => $teacher->qualification, 'email' => $teacher->email, 'nameclass' => $teacher->nameclass, 'classroom_id' => $teacher->classroom_id]);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to create Teacher']);
        }
    }
    public function edit(Request $request, $id)
    {
        $teacher = teacher::where('id', $id)->update([
            'name' => $request->post('teachername'),
            'phonenumber' => $request->post('phonenumber'),
            'qualification' => $request->post('qualification'),
            'email' => $request->post('email'),
            'classroom_id' => $request->post('classroom_id'),
        ]);
        if (!is_null($teacher)) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false, 'message' => 'Failed to update Teacher']);
        }
    }

}
