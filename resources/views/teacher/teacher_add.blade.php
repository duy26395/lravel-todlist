@extends('layouts.app')
@section('title', 'formsubmitteacher')
@section('formadd')
<div class="mb-5">
    <form class="w-100 mt-3" method="POST" id="taskForm" onsubmit="return false">
        @csrf
        <div class="form-group w-75">
            <div class=" w-75 mb-2">
                <label for="">Name Teacher</label>
                <input class="form-control" name="teachername" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Phone</label>
                <input class="form-control" name="teacherphone" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Qualification</label>
                <input class="form-control" name="teacherqualification" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Email</label>
                <input class="form-control" name="teacheremail" required></input>
            </div>
            <div class="w-75 mb-2">
                <select class="form-select" aria-label="Default select example" name="classid" value="">
                    <option selected>Open this select menu</option>
                    @foreach($classroom as $cl)
                    <option value="{{$cl->id}}">{{$cl->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>
    <button id="saveBtn" class="btn btn-outline-dark"> SUBMIT </button>

    <div id="result"></div>
</div>
@endsection
@section('script')
<script>
$(document).ready(function() {

    // Pass csrf token in ajax header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Trigger ajax function on save button click
    $("#saveBtn").click(function() {
        var formData = $("#taskForm").serialize();
        $.ajax({
            type: "POST",
            url: "{{ url('teacheradd')}}",
            data: formData,
            dataType: "json",

            success: function(res) {
                if (res.status) {
                    $("#result").html("<div class='alert alert-success'>" + res.message +
                        "</div>");
                } else if (res.status) {
                    $("#result").html("<div class='alert alert-danger'>" + res.message +
                        "</div>");
                }
            }
        });
    })
})
</script>
@endsection