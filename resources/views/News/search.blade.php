@extends("layouts.mainpage")
@section("title","search-paging")

@section("content")

    <form class="row">
        <div class="col-8">
            <input type="text"  class="form-control" value="{{request()->get("q")}}" autofocus placeholder="enter your search" name="q">
        </div>
        <div class="col-2">
            <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i></button>

        </div>
        <div class="col-2">
            <a class="btn btn-success mb-4 " href="{{  route('News.create')  }}"  >Create News</a>
        </div>
    </form>

    @if($news->count()>0)
        <table align="center " class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="bg-olive">category-id</th>
                <th class="bg-olive">title</th>

                <th class="bg-olive">summary</th>
                <th class="bg-olive">detalis</th>
                <th class="bg-olive">published</th>
                <th width="20%" class="bg-yellow "> Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $news as $rows){
            <tr class="table-info">
                {{--<td><a href="{{ route("News.show", $rows->id) }}">{{ $rows->title }}</a></td>--}}
                {{--<td>{{ $rows->categories->title }}</td>--}}
                {{--<td>{{ $rows->categories->id}}</td>--}}
                <td>{{ $rows->id}}</td>
                <td>{{ $rows->title }}</td>


                <td>{{ $rows->summary}}</td>
                <td>{{ $rows->detalis}}</td>
                <td><input type="checkbox" disabled {{$rows->published?"checked":"" }}/></td>


                <td width="20%">    <form method="post" action="{{ route('News.destroy',$rows->id) }}">
                        <a href="{{ route("News.show", $rows->id) }}" class="btn btn-info btn-sm "><i class='fa fa-eye'></i></a>

                        <a href="{{ route("News.edit", $rows->id) }}" class="btn btn-primary btn-sm ml-3"><i class='fa fa-edit'></i></a>

                        <a href="{{ route("delete-News", $rows->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm ml-3"><i class='fa fa-trash'></i></a>

                        @csrf
                        @method("DELETE")

                    </form>
                </td>
            </tr>

            @endforeach


            </tbody>

        </table>

    @else
        {{ $news->links() }}
        <div class="alert alert-warning">not found</div>
    @endif
@endsection
