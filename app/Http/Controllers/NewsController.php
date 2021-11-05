<?php

namespace App\Http\Controllers;

use App\Models\CategoryNews;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => "javascript:void(0)", 'name' => "News"],
            ['name' => "List"]
        ];

        return view('/content/news/list', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function getList()
    {
        $news = DB::table('news')
            ->select([
                "news.id as id",
                "news.title as title",
                "news.image as image",
                "news.content as content",
                "users.name as user_name",
                "new_categories.name as cate_name"
            ])
            ->join('users', 'users.id', '=', 'news.user_id')
            ->join('new_categories', 'new_categories.id', '=', 'news.cate_id')
            ->where('news.type',1)
            ->get()
            ->toArray();

        return Datatables::of($news)
            ->addColumn('action', function ($news) {
                $btn = '<nobr>';
                $btn .= '<a
                    href="' . $news->id . '/edit"
                    data-toggle="tooltip"
                    data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editUser">
                    Edit
                    </a>';
                $btn .= ' <a
                    href="' . $news->id . '/delete "
                    data-toggle="tooltip"
                   data-original-title="Delete"
                    class="btn btn-danger btn-sm deleteUser">
                    Delete
                    </a>';
                $btn .= '</nobr>';
                return $btn;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categoryNews = CategoryNews::where('type',1)->get();
        $user = Auth::user();

        return view('content.news.add', compact('categoryNews', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $news = new News();
        $news->fill($request->all());
        $news->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $new = News::find($id);
        $user = Auth::user();
        $categoryNews = CategoryNews::where('type',1)->get();

        return view('content.news.edit', compact('new', 'categoryNews', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $news = News::find($id);
        $news->fill($request->all());
        $news->save();

        return redirect()->route('list.news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $news = News::find($id)->delete();

        return redirect()->back();
    }
}
