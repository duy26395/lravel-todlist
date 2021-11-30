@extends('layouts.app')
@section('title', 'List Student')
@section('content')

@foreach($student as $st)
<li class="d-flex list-group-item list-group-item-action align-items-center" data-id="{{$st->id}}">
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$st->namestudent}}</h5>
    </div>
     <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$st->phonenumber}}</h5>
    </div>
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$st->nameclass}}</h5>
    </div>
    <div class="d-flex w-25 justify-content-around">
        <span class="d-flex align-items-center">
            <form action="{{ url('studentshow', ['id' => $st->id])}}" method="POST">
                @method('GET')
                @csrf
                <button class="mr-1 btn btn-outline-light text-danger" type="submit">
                    <i class="bi bi-pencil-square text-warning"></i>
                    </butoon>
            </form>
        </span>
        <span class="d-flex align-items-center">
            <form action="{{ url('studentdel', ['id' => $st->id])}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="mr-1 btn btn-outline-light text-danger" type="submit">
                    <i class="bi bi-trash text-danger"></i>
                </button>
            </form>
        </span>
    </div>
</li>
@endforeach
@endsection