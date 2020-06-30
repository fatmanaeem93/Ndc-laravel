@extends("layouts.mainpage")
@section("title","Show City")
@section("content")
    <form >

        @csrf

<div class="card-body">
        <div class="form-group">
            <label for="Name ">City Name</label>
            <input value='{{old('Name')??$city->Name}}' type="text" autofocus class="form-control" id="Name" name="Name" placeholder="Enter City Name">
        </div>




        <div class="form-check">
            <input {{ (old('active')??$city->active)?"checked":"" }}  value='1' type="checkbox" name='active' class="form-check-input" id="active">
            <label class="form-check-label" for='active'>Active</label>
        </div>



        <div class="form-group">
            <label for="Country_Id">Country_Id</label>
            <input value='{{old('Country_Id')??$city->Country_Id}}' type="number" autofocus class="form-control" id="Country_Id" name="Country_Id" placeholder="Enter Country_Id">
        </div>


        <div class="form-group">
            <label for="Latlng">Latlng</label>
            <input value='{{old('Latlng')??$city->Latlng}}'type="text" autofocus class="form-control" id="Latlng" name="Latlng" placeholder="Enter Latlng">
        </div>
</div>
        <div class="card-footer">

            <a class='btn btn-default' href='{{ route("City.index") }}'>back</a>
        </div>




    </form>
@endsection
