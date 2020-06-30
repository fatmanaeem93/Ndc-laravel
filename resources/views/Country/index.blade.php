@extends("layouts.mainpage")

@section("title","Country")


@section("content")
    <a href="{{ route('create-Country') }}" class="btn btn-success mb-4">Create New Country</a>
    <table align="center" class="table table-striped table-bordered">
        <thead>
        <tr class="bg-info">
            <th>ID</th>
            <th>Country Name</th>
            <th>Iso </th>
            <th>Code </th>
            <th>population</th>
            <th>area </th>

            <th width='20%'> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr class="bg-gray ">
                <td>{{ $item->id }}</td>
                <td>{{ $item->CountryName }}</td>
                <td>{{ $item->CountryISO }}</td>
                <td>{{ $item->CountryCode }}</td>
                <td>{{ $item->population }}</td>
                <td>{{ $item->area }}</td>
                <td>
                    <a class='btn btn-info btn-sm '
                       href="{{ route("edit-country", $item->id) }}">Edit</a>
                    <a class='btn btn-danger btn-sm ml-4'
                       onclick='return confirm("Are you sure?")'
                       href="{{ route("delete-country", $item->id) }}">Delete</a>


                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
