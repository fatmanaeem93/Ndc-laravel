@extends("layouts.mainpage")

@section("title", "Edit News")

@section("content")
<form role="form" enctype="multipart/form-data" method="post" action="{{route('News.update',$news->id)}}" >

        @method('PATCH')
        @csrf
<div class="row">

            <div class="form-group">
                <label for="title">News title</label>
                <input value='{{ $news->title }}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter News Title">
            </div>
</div>

            <div class="form-group">
                <label for="category_id">category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option {{$category->id == $news->category_id?"selected":""}} value='{{$category->id}}'>{{$category->id}} - {{$category->title}}</option>
                    @endforeach

                </select>
            </div>

    <div class="form-group row">
        <div class='col-sm-6'>
            <label for="imageFile">Image</label>
            <div class="custom-file">
                <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                <label class="custom-file-label" for="image">Choose file</label>
            </div>
            @if($news->image)
                <img src='{{ asset("storage/".$news->image) }}' width='240' class='img-thumbnail mt-3' />
            @endif
        </div>
    </div>

            <div class="form-group">
                <label for="summary">summary</label>
                <input value='{{ $news->summary }}' type="text" class="form-control" id="summary" name="summary" placeholder="Enter summary">
            </div>



        <div class="form-group">
            <label for="detalis">Details</label>
            <textarea class="form-control" id="detalis" name="detalis">{{ $news->detalis}}</textarea>
        </div>
    <div class="form-check">
        <input {{ $news->published?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
        <label class="form-check-label" for='published'>Published</label>
    </div>
    {{--

        <div class="form-check">
            <input {{ old($News->puplished?"puplished":"") }} value='1' type="checkbox" name='puplished' class="form-check-input" id="puplished">
            <label class="form-check-label" for='puplished'>puplished</label>
        </div>
    --}}

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ route("News.index") }}'>Cancel</a>
        </div>

</form>
@endsection

@section("js")
    <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection

