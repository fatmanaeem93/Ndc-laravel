@extends("layouts.mainpage")

@section("title", "Edit City")

@section("content")




    <form method="post" action="{{route('City.store')}}" role="form" >
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label for="Name ">City Name</label>
                <input value='{{ old($city->title) }}' type="text" autofocus class="form-control" id="Name" name="Name" placeholder="Enter City Name">
            </div>




            <div class="form-check">
                <input {{ old(old($city->active)?"checked":"" }} value='1' type="checkbox" name='active' class="form-check-input" id="active">
                <label class="form-check-label" for='active'>Active</label>
            </div>



            <div class="form-group">
                <label for="Country_Id">Country_Id</label>
                <select name="Country_Id" class="form-control">
                    <option>Select Country</option>
                    @foreach($countries as $country)
                        <option {{old($city->Country_Id)==$country->id?"selected":""}} value='{{ $country->id}}'>{{ $country->CountryName}}

                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="Latlng">Latlng</label>
                <input value='{{ old($city->Latlng) }}' type="text" autofocus class="form-control" id="Latlng" name="Latlng" placeholder="Enter Latlng">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ route("City.index") }}'>Cancel</a>
        </div>
    </form>
@endsection

