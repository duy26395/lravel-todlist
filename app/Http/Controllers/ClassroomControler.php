<?php

namespace App\Http\Controllers;

use App\Models\Classroom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClassroomControler extends Controller
{
    public function index()
    {
        // $classroom = DB::table('Classroom as c')
        //     ->leftJoin('student as t', 't.classroom_id', '=', 'c.id')
        //     ->select('t.name as namestudent','c.id','c.name','total')
        //     -> where('c.name','=','vue')
        //     ->get();

        $classroom = DB::table('Classroom as c')
            ->leftJoin('student as t', 't.classroom_id', '=', 'c.id')
            ->select('c.id','c.name','total','c.datestart',DB::raw('COUNT(c.id) as current'))
            ->groupby('c.id','c.name','total','c.datestart')
            ->get();


        // $classroom = Classroom::all();
        return view('classroom/classroom_list', compact('classroom'));
    }
    public function store(Request $request)
    {
       $classroom = new Classroom();
       $classroom->name = $request->classname;
       $classroom->total = $request->totalclass;
       $classroom->datestart = $request->datepicker;

       $classroom -> save();
       return redirect()->route('class.list');

    }
    public function show_add_form()
    {
        return view('classroom/classroom_add');
    }
    public function delete(Request $request,$id)
    {
        $classroom = Classroom::find($id)->delete();
        return redirect()->route('class.list');
    }
    public function show($id)
    {
        $classroom = Classroom::find($id);
        return view('classroom/classroom_show', compact('classroom'));
    }
    public function edit(Request $request, $id){
            $classroom = Classroom::where('id', $id)->update([
                'name' =>$request->post('classname'),
                'total' =>$request->post('totalclass'),
                'datestart' =>$request->post('datepicker')
            ]);
            return redirect()->route('class.list');
        }

}