@extends("layouts.mainpage")

@section("title", "Create News")

@section("content")
<form method="post" enctype="multipart/form-data" action="{{ route('News.store') }}" role="form">
    @csrf
    <div class="row ">
    <div class="card-body">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="title">News title</label>
                <input value='{{ old('title') }}' type="text" autofocus class="form-control" id="title" name="title" placeholder="Enter News Title">
            </div>
        </div>
        <div class="col">
            {{--<div class="form-group">
                <label for="Country_Id">Country_Id</label>
                <select name="Country_Id" class="form-control">
                    <option>Select Country</option>
                    @foreach($countries as $country)
                        <option {{old('Country_Id')==$country->id?"selected":""}} value='{{ $country->id}}'>
                            {{ $country->CountryName}}

                        </option>
                    @endforeach
                </select>
            </div>--}}
            <div class="form-group">
                <label for="category_id">category</label>
                <select name="category_id" class="form-control">
                    <option>Select category</option>
                    @foreach($categories as $category)
                        <option {{old('category_id')==$category->id?"selected":""}} value='{{ $category->id}}'>
                            {{ $category->title}}

                        </option>
                    @endforeach
                </select>
            </div>
    </div>
        <div class="col">
        <div class="form-group row">
            <div class='col-sm-6'>
                <label for="imageFile">Image</label>
                <div class="custom-file">
                    <input type="file" name="imageFile" class="custom-file-input" id="imageFile">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>
        </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="summary">summary</label>
                <input value='{{ old('summary') }}' type="text" class="form-control" id="old_price" name="summary" placeholder="Enter summary">
            </div>
        </div>

        <div class="col">
    <div class="form-group">
        <label for="detalis">Details</label>
        <textarea class="form-control" id="detalis" name="detalis">{{ old('detalis') }}</textarea>
    </div>
        </div>
        <div class="col">
        <div class="form-check">
            <input  {{old('published')?"checked":"" }} value='1' type="checkbox" name='published' class="form-check-input" id="published">
            <label class="form-check-label" for='published'>Published</label>
        </div>
        </div>


        <div class="card-footer mt-4">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class='btn btn-default' href='{{ route("News.index") }}'>Cancel</a>
    </div>
    </div>
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
