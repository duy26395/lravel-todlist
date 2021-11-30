<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="w-100" id="taskForm">
                    <div class="mb-2">
                        <label for="">Name Teacher</label>
                        <input class="form-control" name="teachername" required></input>
                    </div>
                    <div class="mb-2">
                        <label for="">Phone</label>
                        <input class="form-control" name="teacherphone" required></input>
                    </div>
                    <div class="mb-2">
                        <label for="">Qualification</label>
                        <input class="form-control" name="teacherqualification" required></input>
                    </div>
                    <div class="mb-2">
                        <label for="">Email</label>
                        <input class="form-control" name="teacheremail" required></input>
                    </div>
                    <div class="mb-2">
                        <label for="">Class</label>
                        <select class="form-select" aria-label="Default select example" name="classid" value="">
                            @foreach($classroom as $cl)
                            <option value="{{$cl->id}}">{{$cl->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="saveteacher" type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>