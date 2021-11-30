@extends('layouts.app')
@section('title', 'formsubmit')
@section('formadd')
<div class="mb-5">
    <form action="{{ url('studentadd')}}" class="w-100 mt-3" method="POST">
        @csrf
        <div class="form-group w-75">
            <div class=" w-75 mb-2">
                <label for="">Name Student</label>
                <input class="form-control" name="studentname" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Phone</label>
                <input class="form-control" name="studentphone" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Address</label>
                <input class="form-control" name="studentaddress" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Email</label>
                <input class="form-control" name="studentemail" required></input>
            </div>
            <div class="w-75 mb-2">
                <select class="form-select" aria-label="Default select example" name="classid">
                    <option selected>Open this select menu</option>
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