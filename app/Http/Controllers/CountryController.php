<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class CountryController extends Controller
{
    public function index(){
        $items = Country::get();

        return view("Country.index")->withItems($items);
    }
    // show create form
    public function create(){
        return view("Country.create");
    }
    //store form data to database
    public function postCreate(Request $request){

        //dd($request);

        $request->validate([
            'CountryName' => 'required',
              'CountryISO' => 'required',
          'CountryCode' => 'required',
             'population' => 'required',
            'area' => 'required',
        ]);

       /* //inserted into DB
        Country::insert([
            'CountryName' => $request->CountryName,
            'CountryISO' => $request->CountryISO,
            'CountryCode' => $request->CountryCode,
            'population' => $request->population,
            'area' => $request->area,


        ]);*/
        //store temp variable (msg in user session)
        \Session::flash("msg", "s:Country Created successfully");
        //return redirect(asset('/country'));
        return redirect(route('country'));
    }
    public function delete($id){
        //delete from DB
        //Category::where("id",$id)->delete();
        Country::destroy($id);
        //Category::find($id)->delete();
        //store temp variable (msg in user session)
        //Session::flash("msg", "w:country Deleted successfully");
        session()->flash("msg", "w:country Deleted successfully");
        //redirrect to index page
        return redirect(asset('/Country'));

    }

        public function edit($id){
        //find works on Primary key only and return null or 1 object
        $country = Country::find($id);
        return view("Country/edit")->withCountry($country);
        }


    public function postEdit($id){
        $request = request();

        $request->validate([
            'CountryName' => 'required',
            'CountryISO' => 'required',
            'CountryCode' => 'required',
            'population' => 'required',
            'area' => 'required',
        ]);

        Country::where('id', $id)->update([
            'CountryName' => $request->CountryName,
            'CountryISO' => $request->CountryISO,
            'CountryCode' => $request->CountryCode,
            'population' => $request->population,
            'area' => $request->area,
        ]);

        \Session::flash("msg", "s:Country Updated successfully");
        return redirect(route('country'));
    }

}
