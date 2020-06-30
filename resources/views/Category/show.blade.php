@extends("layouts.mainpage")

@section("title", 'show ')

@section("content")
<form role="form">
        
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">category Name</label>
                    <input value='{{ $categories->title }}' type="text" readonly class="form-control" id="title" name="title" placeholder="Enter category Title">
                </div>
            </div>

        </div>     
    <div class="form-check">
        <input type="checkbox" disabled {{$categories->show?"checked":""}}>
        <label class="form-check-label" for="show">show</label>
    </div>



    <div class="card-footer">
        <a class='btn btn-default' href='{{ route("Category.index") }}'>Cancel</a>
    </div>
</form>
@endsection
