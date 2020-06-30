@extends("layouts.mainpage")

@section("title", "Manage Categories")

@section("content")
   <form class="row mb-3">
    <div class="col-8">
        <input autofocus value="{{ request()->get('q') }}" type="text" class="form-control" placeholder="Enter Your Search" name="q"  />
    </div>


    <div class="col-2">
        <button type="submit" class="btn btn-primary"><i class="fa fa-search"> </i> Search</button>
    </div>


    <div class="col-2">
        <a href="{{ route("Category.create") }}" class="btn btn-success"><i class="fa fa-plus"></i> Create New category</a>
    </div>
    </form>



@if($categories->count()>0)
    <table align="center" class="table table-striped mt-3 table-bordered">
    <thead>
        <tr>
            <th>News</th>
            <th>title</th>
            <th>show</th>


            <th width="20%">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->news->count() }}</td>
            <td><a href="{{ route("Category.show", $category->id) }}">{{ $category->title }}</a></td>


            <td><input type="checkbox" disabled {{$category->show?"checked":"" }}/></td>

            <td width="20%"> <form method="post" action="{{ route('Category.destroy', $category->id) }}">

                    <a href="{{ route("Category.show", $category->id) }}" class="btn btn-info btn-sm"><i class='fa fa-eye'></i></a>
            
                    <a href="{{ route("Category.edit", $category->id) }}" class="btn btn-primary btn-sm"><i class='fa fa-edit'></i></a>

                    <a href="{{ route("delete-Category", $category->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm"><i class='fa fa-trash'></i></a>
            
                    <button onclick='return confirm("Are you sure dude?")' type="submit" class="btn btn-danger btn-sm"><i class='fa fa-trash'></i></button>
                    @csrf
                    @method("DELETE")
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $categories->links() }}
@else
    <div class="alert alert-warning"> Sorry there is no result to your search </div>

@endif
@endsection
