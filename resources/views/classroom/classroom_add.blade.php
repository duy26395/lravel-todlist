@extends('layouts.app')
@section('title', 'formsubmit')
@section('formsubmit')
<div class="mb-5">
    <form action="{{ url('classsadd')}}" class="w-100 mt-3"
    method="POST">
    @csrf
        <div class="form-group w-75">
            <div class=" w-75 mb-2">
                <label for="">Class Name</label>
                <input class="form-control" name="classname" required></input>
            </div>
            <div class="w-75 mb-2">
                <label for="">Total</label>
                <input class="form-control" name="totalclass" required></input>
            </div>
            <div class="mb-2 w-75 datepickerbt">
                <label for="">DateStart</label>
                <input id="datepicker1" width="276" name="datepicker"/>
            </div>
        </div>
        <button id="submit" class="btn btn-outline-dark"> SUBMIT </button>
    </form>
</div>
@endsection
@section('script')
<script type="text/javascript">
$('.datepickerbt input').datepicker({
    uiLibrary: 'bootstrap4',
    format: "yyyy-mm-dd"
});
</script>
@endsection
