@extends("layouts.mainpage")
@section("title","City")

@section("content")

    <a class="btn btn-success mb-4 " href="{{  route('City.create')  }}"  >Create New City</a>
    <table align="center " class="table table-striped table-bordered">
    <thead>
    <tr>
        <th class="bg-olive ">Name</th>
        <th class="bg-yellow ">Country_Id </th>
        <th class="bg-olive">Latlng</th>
        <th width="20%" class="bg-yellow "> Action</th>
    </tr>
    </thead>
     <tbody>
         @foreach($city as $city)
         <tr class="table-info">
             <td>{{ $city->Name}}</td>
             <td>{{ $city->Country->CountryName??''}}</td>
             <td>{{$city->Latlng}}</td>


             <td width="20%">    <form method="post" action="{{ route('City.destroy', $city->id) }}">
                     <a href="{{ route("City.show", $city->id) }}" class="btn btn-info btn-sm "><i class='fa fa-eye'></i></a>

                     <a href="{{ route("City.edit", $city->id) }}" class="btn btn-primary btn-sm ml-3"><i class='fa fa-edit'></i></a>

                     <a href="{{ route("delete-city", $city->id) }}" onclick='return confirm("Are you sure dude?")' class="btn btn-warning btn-sm ml-3"><i class='fa fa-trash'></i></a>

                     <button onclick='return confirm("Are you sure ?")' type="submit" class="btn btn-danger btn-sm ml-3"><i class='fa fa-trash'></i></button>
                     @csrf
                     @method("DELETE")
                 </form>
             </td>
         </tr>

         @endforeach


     </tbody>

    </table>
    @endsection
