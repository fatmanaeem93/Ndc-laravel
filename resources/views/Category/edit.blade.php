@extends("layouts.mainpage")

@section("title", "Edit Category")

@section("content")
<form role="form" method="post" action="{{ route("Category.update", $category->id)  }}">
        <!--input type="hidden" name="_method" value="PUT" /-->
        @method('PATCH')
        @csrf

    <div class="form-group">
        <label for="title">Caregory Title</label>
        <input type="text" value='{{ $category->title }}'class=" form-control" id="title" name="title" placeholder="Enter Category Title">
    </div>
    <div class="form-check">

        <input {{ $category->show?"checked":"" }} value='1' type="checkbox"  name="show" class="form-check-input" id="show">
        <label class="form-check-label" for="show">show</label>
    </div>




    <div class="card-footer mt-3">
        <button type="submit" class="btn btn-primary ">Submit</button>
        <a class='btn btn-default' href='{{ route("Category.index") }}'>Cancel</a>
    </div>
</form>
@endsection
