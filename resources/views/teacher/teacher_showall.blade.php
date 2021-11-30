@foreach($teacher as $t)
<li class="d-flex list-group-item list-group-item-action align-items-center" data-id="{{$t->id}}">
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$t->teachername}}</h5>
    </div>
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$t->phonenumber}}</h5>
    </div>
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$t->qualification}}</h5>
    </div>
    <div class="d-flex w-75">
        <h5 class="mb-1 w-100">{{$t->nameclass}}</h5>
    </div>
    <div class="d-flex w-25 justify-content-around">
        <span class="d-flex align-items-center">
            <button class="mr-1 btn btn-outline-light text-danger" type="button" data-toggle="modal"
                data-target="#exampleModalCenter" id="edit">
                <i class="bi bi-pencil-square text-warning"></i>
                </butoon>
        </span>
        <span class="d-flex align-items-center">
            <button class="mr-1 btn btn-outline-light text-danger js-del-teacher" type="submit" data-id="{{$t->id}}">
                <i class="bi bi-trash text-danger"></i>
            </button>
        </span>
    </div>
</li>
@endforeach
