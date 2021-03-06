@extends("layouts.mainpage")

@section("title", "Insert News ")

@section("content")
    <form class="row mb-3">
        <div class="col-4">
            <input autofocus value="{{ request()->get('q') }}" type="text" class="form-control" placeholder="Enter Your Search" name="q"  />
        </div>

        <div class="col-2">
            <select name="published" class="form-control">
                <option value='' > Anystatus</option>
                <option {{ request()->get("published")?"selected":""}} value='1' >active</option>
                <option {{ request()->get("published") == '0'?"selected":""}} value='0'>Inactive</option>
            </select>
        </div>

        <div class="col-2">
            <select name="category" class="form-control">
                <option value=''>Anycategory</option>
                @foreach($categories as $category)
                    <option {{$category->id==request()->get('category'?"selected":"")}} value='{{ $category->id}}' >{{$category->title}}</option>

                @endforeach
            </select>
        </div>

        <div class="col-2">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> Search</button>
        </div>


        <div class="col-2">
            <a href="{{ route("News.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New News</a>
        </div>

    </form>

    @if($news->count()>0)
        <table align="center" class="table table-striped mt-3 table-bordered">
            <thead>
            <tr>
                <th class="bg-pink">Title</th>
                <th class="bg-pink">Category</th>
                <th class="bg-blue">image</th>
                <th class="bg-pink">Summary</th>
                <th class="bg-pink"> Details</th>
                <th class="bg-blue">Published</th>

                <th class="bg-pink" width="20%">action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td><a href="{{ route("News.show", $new->id) }}">{{ $new->title }}</a></td>
                    <td>{{$new->category->title??'' }}</td>
                    <td><img src='{{ asset("storage/".$new->image) }}' width='50' class='img-thumbnail' /></td>

                    <td>{{ $new->summary }}</td>
                    <td>{{ $new->detalis }}</td>
                    <td><input type="checkbox" disabled {{$new->published?"checked":"" }}/></td>

                    <td width="20%">    <form method="post" action="{{ route('News.destroy', $new->id) }}">
                            <a href="{{ route("News.show", $new->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>

                            <a href="{{ route("News.edit", $new->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                            <a href="{{ route("delete-News", $new->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>


                            @csrf
                            @method("DELETE")
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $news->links() }}
    @else
        <div class="alert alert-warning"> Sorry there is no result to your search </div>

    @endif

@endsection
