@extends('layouts.app')
@section('title', 'List')
@section('content')
@foreach($classroom as $clr)
<li class="d-flex list-group-item list-group-item-action align-items-center" data-id="{{$clr->id}}">
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$clr->name}}</h5>
    </div>
     <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$clr->current}}</h5>
    </div>
    <div class="d-flex w-25 justify-content-around">
        <h5 class="mb-1 w-100">{{$clr->total}}</h5>
        <span class="d-flex align-items-center">
            <form action="{{ url('classshow', ['id' => $clr->id])}}" method="POST">
                @method('GET')
                @csrf
                <button class="mr-1 btn btn-outline-light text-danger" type="submit">
                    <i class="bi bi-pencil-square text-warning"></i>
                    </butoon>
            </form>
        </span>
        <span class="d-flex align-items-center">
            <form action="{{ url('classsdel', ['id' => $clr->id])}}" method="POST">
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