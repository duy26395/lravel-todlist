@extends('layouts.app')
@section('title', 'formsubmit')
@section('formsubmit')
<div class="mb-5">
    <form action="{{ url('studentedit',['id' => $student->id])}}" class="w-100 mt-3" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group w-75">
            <div class=" w-75 mb-2">
                <label for="">Name Student</label>
                <input class="form-control" name="studentname" value="{{$student->name}}" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Phone</label>
                <input class="form-control" name="studentphone" value="{{$student->phonenumber}}" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Address</label>
                <input class="form-control" name="studentaddress" value="{{$student->address}}" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Email</label>
                <input class="form-control" name="studentemail" value="{{$student->email}}" required></input>
            </div>
            <div class="w-75 mb-2">
                <select class="form-select" aria-label="Default select example" name="classid" value="{{$student->nameclass}}">
                    @foreach($classroom as $cl)
                    <option value="{{$cl->id}}">{{$cl->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button id="submit" class="btn btn-outline-dark"> SUBMIT </button>
    </form>
</div>
@endsection