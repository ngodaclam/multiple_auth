<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // home
    public function home()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];

        return view('/content/home', ['breadcrumbs' => $breadcrumbs]);
    }

    public function about()
    {
        return view('about');
    }

    /**
     * News
     */
    public function news()
    {
        //get all category

        $cates = CategoryNews::all();
        $cates->load('getNews');

        //News paginate

        $news = News::paginate(4);
        $news->load('getUser');

        return view('news', compact('news', 'cates'));
    }

    /**
     * Knowledge
     */
    public function knowledge()
    {
        return view('insurance-knowledge');
    }

    /**
     * Detail news
     */
    public function detail($id)
    {
        //get all category

        $cates = CategoryNews::all();
        $cates->load('getNews');

        //News paginate

        $news = News::find($id);

        if (!$news) {
            return view('errors.404');
        }

        $news->load('getcate');
        $news->load('getUser');

        return view('detail', compact('news', 'cates'));
    }

    /**
     * News category
     */

    public function newsCate($id){
        //News paginate

        $cates = CategoryNews::all();
        $cates->load('getNews');

        //cate name
        $checkCate = CategoryNews::find($id);

        if(!$checkCate){
            return view('errors.404');
        }
        $cate_name = $checkCate->name;

        $news = News::where('cate_id',$id)->count();

        if($news <= 0){
            return view('new-cate', compact( 'cates','cate_name'));
        }

        $newsCate = News::where('cate_id',$id)->paginate(4);
        $newsCate->load('getcate');
        $newsCate->load('getUser');

        return view('new-cate', compact('newsCate', 'cates','cate_name'));
    }
    /**
     * Search keyword subpage
     */
    public function search(Request $request){

        //get lisst cates

        $cates = CategoryNews::all();
        $cates->load('getNews');

        $keyword = $request->keyword;

        //News
        $checkNews = News::where("title","like","%".$request->keyword."%")->count();

        if($checkNews <= 0){
            return view('news', compact('cates','keyword'));
        }

        $news = News::where("title","like","%".$request->keyword."%")->paginate(4);
        $news->load('getUser');

        return view('news', compact('news', 'cates','keyword'));

    }
}
