@extends("layouts.mainpage")

@section("title",  "show")

@section("content")
<form role="form">

    <div class="row">
        <div class="card-body">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="title">News title</label>
                    <input value='{{ $news->title }}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter News Title">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select disabled name="category_id" class="form-control">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                            <option  {{$category->id == $news->category_id?"selected":""}} value='{{$category->id}}'> {{$category->title}} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="image">Image</label>
                <br>
                @if($news->image)
                    <img src='{{ asset("storage/".$news->image) }}' width='240' class='img-thumbnail' />
                @endif
            </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="summary">summary</label>
                    <input value='{{ $news->summary }}' type="text" class="form-control" id="old_price" name="summary" placeholder="Enter summary">
                </div>

            </div>
            <div class="col">
            <div class="form-group">
                <label for="detalis">Details</label>
                <textarea class="form-control" id="detalis" name="detalis">{{$news->detalis}}</textarea>
            </div></div>
                <div class="col">
            <div class="form-check">
                <input {{ $news->published?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
                <label class="form-check-label" for='published'>Published</label>
            </div>
                </div>



            <div class="card-footer mt-4">

                <a class='btn btn-default' href='{{ route("News.index") }}'>Cancel</a>
            </div>
        </div>
    </div>
</form>
@endsection
