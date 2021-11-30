@extends('layouts.app')
@section('title', 'List Teacher')
@section('formadd')
<a href="{{ url('teacherformadd')}}" class="btn btn-info btn-sm d-flex"> add </a>
@endsection
@extends('teacher.teacher_show')

@section('script')
<script>
loadpage();

function loadpage() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/teacherall",
        type: "GET",
        success: function(response) {
            $("#listgroup").html(response);
        }
    })
}
$(document).ready(function() {
    // Trigger ajax function on save button click
    $(document).on("click", ".js-del-teacher", function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $(this).attr('data-id');
        $.ajax({
            url: "/teacherdel/" + id,
            type: "DELETE",
            data: {
                id
            },
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    alert("success")
                    loadpage();
                } else {
                    alert("failed")
                }
            }
        });
    });
    $(document).on("click", "#edit", function() {
        var id = $(this).closest(".list-group-item").attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/teachershow/" + id,
            type: "GET",
            data: {
                id
            },
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    $(".form-select option").removeAttr("selected");
                    $(".modal-content").attr('data-id',id);
                    $("input[name=teachername]").val(res.teachername);
                    $("input[name=teacherphone]").val(res.phonenumber);
                    $("input[name=teacherqualification]").val(res.qualification);
                    $("input[name=teacheremail]").val(res.email);
                    $(".form-select").attr('value', res.nameclass);
                    $(".form-select option[value=" + res.classroom_id + "]").attr(
                        'selected',
                        'selected')
                }
            }
        });
    })
    $(document).on("click", "#saveteacher", function() {
        var id = $(this).closest(".modal-content").attr('data-id');
        var teachername = $("input[name=teachername]").val();
        var phonenumber =  $("input[name=teacherphone]").val();
        var qualification = $("input[name=teacherqualification]").val();
        var email = $("input[name=teacheremail]").val();
        var classroom_id =  $(".form-select").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/teacheredit/" + id,
            type: "PUT",
            data: {
                id,teachername,phonenumber,qualification,email,classroom_id
            },
            dataType: "json",
            success: function(res) {
                if (res.status) {
                    loadpage();
                    alert("ok")
                    const modal = new bootstrap.Modal(container);
                    modal.hide();
                }
                else {
                    alert("fail")
                }
            }
        });
    })
});
</script>
@endsection
