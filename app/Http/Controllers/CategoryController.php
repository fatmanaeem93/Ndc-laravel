<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q=$request->get("q")??"";
        // $news = Category::where("title","like","%$q%")->get();
        $categories= Category::where("title","like","%{$q}%")
            ->paginate(2)
            ->appends(["q"=>$q]);
        return view("Category.index")->with("categories",$categories);

        //old
//        $category = Category::all();
//        return view("Category.index")->with("categories",$category);
    }
    public function searchPaging(Request $request)
    {
        $q = $request->get("q")??'';
        $category = Category::where('title', 'like', "%{$q}%")
            ->paginate(6)
            ->appends(["q"=>$q]);//اضافة متغيرات البحث على روابط الباجينع
        return view("Category.search-paging")->with("categories",$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view("Category.create")->with("categories",$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {


        if (!$request->show){
            $request['show']=0;
        }
        Category::create($request->all());
        session()->flash("msg", "s: Created Successfully");
        return redirect(route("Category.create"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if(!$category){
            session()->flash("msg", "e: The category was not found");
            return redirect(route("Category.index"));
        }

        return view("Category.show")->withcategories($category);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $category = Category::find($id);
        if(!$category){
            session()->flash("msg", "e: Category was not found");
            return redirect(route("Category.index"));
        }
        return view("Category.edit")->withCategory($category);



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$id)

    {

        if(!$request->show ){
        $request['show']=0;
    }
        $category=Category::find($id);
        $category->update($request->all());

        session()->flash("msg", "i: Category Updated Successfully");
        return redirect(route("Category.index"));







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category->News->count()>0){
            session()->flash("msg", "w: can't delete category");
            return redirect(route("Category.index"));
        }
        Category::destroy($id);
        session()->flash("msg", "w: category Deleted Successfully");
        return redirect(route("Category.index"));
    }
}
