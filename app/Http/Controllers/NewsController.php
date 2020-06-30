<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\CountryRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsEditRequest;
use App\News;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   /*    $q=$request->get("q")??"";
        $published=$request->get("published");
        $category=$request->get("category");

        $news=News::whereRaw('true');
        if($q){
            $news->where("title","like","%$q%");
        }
        if($published!=null){
            $news->where("published",$published);
        }
        if($category){
            $news->where("category_id",$category);
        }

        $news=$news->paginate(5) ->appends(["q"=>$q,
            "published"=>$published,
            "category"=>$category,
        ]);
        $categories= Category::orderBy("title")->get();

        return view("News.search-page-advanced",compact(["news","categories"]));
//        $news = News::paginate(5);
//        $news = News::simplePaginate(5); //previous , next
//        $news = News::all(); */


        $q=$request->get("q")??"";
        $published=$request->get("published");
        $category=$request->get("category");

        $news=News::whereRaw('true');
        if($q){
            $news->where("title","like","%$q%");
        }
        if($published!=null){
            $news->where("published",$published);
        }
        if($category){
            $news->where("category_id",$category);
        }

        $news=$news->paginate(5) ->appends(["q"=>$q,
            "published"=>$published,
            "category"=>$category,
        ]);
        $categories= Category::orderBy("title")->get();

        return view("news.index",compact(["news","categories"]));

    }
    public function searchPaging(Request $request)
    {
        $q = $request->get("q")??'';
        $news = News::where('title', 'like', "%{$q}%")
            ->paginate(6)
            ->appends(["q"=>$q]);//اضافة متغيرات البحث على روابط الباجينع
        return view("News.search")->with("news",$news);
    }
    public function SearchPagingAdvanced(Request $request)
    {
        $q=$request->get("q")??"";
        $published=$request->get("published");
        $category=$request->get("category");

        $news=News::whereRaw('true');
        if($q){
            $news->where("title","like","%$q%");
        }
        if($published!=null){
            $news->where("published",$published);
        }
        if($category){
            $news->where("category_id",$category);
        }

        $news=$news->paginate(5) ->appends(["q"=>$q,
            "published"=>$published,
            "category"=>$category,
        ]);
        $categories= Category::orderBy("title")->get();

        return view("News.search-page-advanced",compact(["news","categories"]));
       // return view("News.search-page-advanced")->with("news",$news)->with("categories",$category);
    }

    public function search()
    {
//       $q=$request->get("q")??"";
        $news=News::where("title","like","%$q%")->get();
        return view("News.index")->with("news",$news);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $countries = Country::all();
//        return view("News.create")->with("countries",$countries);
        $category=Category::all();
        return view("News.create")->with("categories",$category);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request )
    {
        $imageName= basename($request->imageFile->store("public"));
        $request['image']=$imageName;

        if(!$request->published ){
        $request['published']=0;
    }

        News::create($request->all());
        session()->flash("msg", "s: Created Successfully");
        return redirect(route("News.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        if(! $news){
            session()->flash("msg", "e: The News was not found");
            return redirect(route("News.index"));
        }
        $category= Category::all();
        return view("News.show")->withnews($news)->withcategories($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $news = News::find($id);
        if( !$news){
            session()->flash("msg", "e: News was not found");
            return redirect(route("News.index"));
        }
        $category =Category::all();
        return view("News.edit")->withnews($news)->withcategories($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, $id)
    {
        if ($request->imageFile){
            $imageName= basename($request->imageFile->store("public"));
            $request['image']=$imageName;
        }
        if(!$request->published ){
            $request['published']=0;
        }
        $news = News::find($id);
        $news->update($request->all());

        session()->flash("msg", "i: News Updated Successfully");
        return redirect(route("News.index"));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Product::destroy($id);
        $news = News::find($id);
        if(! $news){
            session()->flash("msg", "e: News was not found");
            return redirect(route("News.index"));
        }
        $news->delete();
        session()->flash("msg", "w: News Deleted Successfully");
        return redirect(route("News.index"));
    }
}
