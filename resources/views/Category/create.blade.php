@extends("layouts.mainpage")

@section("title", "Create Category")

@section("content")
<form method="post" action="{{ route('Category.store') }}" role="form">
    @csrf


            <div class="form-group">
                <label for="title">Category Name</label>
                <input value='{{ old('title') }}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter Category Title">
            </div>
        </div>



    <div class="form-check">
        <input {{ old('show')?"checked":"" }}  value='1' type="checkbox" name='show' class="form-check-input" id="show">
        <label class="form-check-label" for='active'>show</label>
    </div>--}}


    




    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("Category.index") }}'>Cancel</a>
    </div>
</form>
@endsection
