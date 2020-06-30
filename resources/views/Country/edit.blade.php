@extends("layouts.mainpage")

@section("title","Edit Country")
@section("content")


    <form method="post" action="{{ route('post-edit-country', $country->id) }}" role="form">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="Country">Country</label>
                <input type="text" value='{{old('Country')??$country->Country}}' class="{{ $errors->has('Country')?"is-invalid":""}}  form-control" id="CountryName" name="CountryName" placeholder="Enter Country Name">
            </div>
            <div class="form-group">
                <label for="CountryISO">Country ISO</label>
                <input type="text" value='{{old('CountryISO')??$country->CountryISO}}' class="{{ $errors->has('CountryISO')?"is-invalid":""}} form-control" id="CountryISO" name="CountryISO" placeholder="Enter CountryISO Name">
            </div>
            <div class="form-group">
                <label for="CountryCode">Country Code</label>
                <input type="text" value='{{old('CountryCode')??$country->CountryCode}}' class="{{ $errors->has('CountryCode')?"is-invalid":""}} form-control" id="CountryCode" name="CountryCode" placeholder="Enter CountryCode Name">
            </div>
            <div class="form-group">
                <label for="population">population</label>
                <input type="text" value='{{old('population')??$country->population}}' class="{{$errors->has('population')?"is-invalid":""}} form-control" id="population" name="population"  placeholder="Enter population">
            </div>
            <div class="form-group">
                <label for="area">area</label>
                <input type="text" value='{{old('area')??$country->area}}' class="{{$errors->has('area')?"is-invalid":""}} form-control" id="area" name="area"  placeholder="Enter area">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class='btn btn-default' href='{{ asset("/Country") }}'>Cancel</a>
        </div>
    </form>
@endsection
