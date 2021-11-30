@extends('layouts.app')
@section('title', 'formsubmit')
@section('formsubmit')

<div class="mb-5">
    <form action="{{ url('classsedit',['id' => $classroom->id])}}" class="w-100 mt-3" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group w-75">
            <div class=" w-75 mb-2">
                <label for="">Class Name</label>
                <input class="form-control" name="classname" value="{{ $classroom->name }}" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Total</label>
                <input class="form-control" name="totalclass" value="{{ $classroom->total }}" required></input>
            </div>
            <div class="mb-2 w-75 datepickerbt">
                <label for="">DateStart</label>
                <input id="datepicker1" width="276" value="{{ $classroom->datestart }}" name="datepicker" />
            </div>
        </div>
        <button id="submit" class="btn btn-outline-dark"> SUBMIT </button>
    </form>
</div>
@endsection