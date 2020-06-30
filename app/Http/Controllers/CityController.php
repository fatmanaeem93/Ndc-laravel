<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $city = City::get();

        return view("City.index")->withCity($city);
    }



    public function create()
    {
        //

        $countries = Country::all();
        return view("City.create")->with("countries",$countries);
    }


    public function store(CityRequest $request)
    {
        /*
        $request->validate([
            'Name' => 'required',
            'Country_Id' => 'required',
            'Latlng' => 'required',

        ]);*/

         if(!$request->active){
         $request['active']=0;
        }
           City::create($request->all());


        session()->flash("msg", "s: City Created Successfully");
        return redirect(route("City.index"));
    }


    public function show($id)
    {
        $city = City::find($id);
        if(!$city){
            session()->flash("msg", "e: City was not found");
            return redirect(route("City.index"));
        }
        $country= Country::all();
        return view("City.show")->withCity($city)->withCountry($country);

        //
    }



    public function edit($id)
    {
         $city = City::find($id);
               $country= Country::all();
                return view("City.edit")->withCity($city)->withCountry($country);

    }


    public function update(Request $request, $id)
    {

        if(!$request->active){
            $request['active']=0;
        }
        $city=City::find($id);
       $city->update($request->all());

        session()->flash("msg", "s: City Updated Successfully");
        return redirect(route("City.index"));
        //
        /*    $request->validate([
              'Name' => 'required',
              'Country_Id' => 'required',
              'Latlng' => 'required',

          ])
          /*  City::where('id', $id)->update([
           /*   'Name' => $request->Name,
                'Country_Id' =>  $request->Country_Id,
                'Latlng' =>  $request->Latlng,

                'active' => $request->active??0


          ]); */

    }


    public function destroy($id)
    {
        //
        City::destroy($id);
        $city = City::find($id);
        if($city==null){
            session()->flash("msg", "e: City was not found");
            return redirect(route("City.index"));
        }
        session()->flash("msg", "w: City Deleted Successfully");
        return redirect(route("City.index"));
    }
}
