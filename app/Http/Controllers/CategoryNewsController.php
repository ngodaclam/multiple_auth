<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryNewsForm;
use App\Models\CategoryNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryNewsController extends Controller
{
    //
// Datatable Basic
    public function listCateNew()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => "javascript:void(0)", 'name' => "CategoryNews"],
            ['name' => "List"]
        ];

        return view('/content/category-new/list', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function cateList()
    {
        $CategoryNews = DB::table('new_categories')
            ->select([
                'id',
                'name',
            ])
            ->where('type',1)
            ->get();

        return Datatables::of($CategoryNews)
            ->addColumn('action', function ($CategoryNews) {
                $btn = '<nobr>';
                $btn .= '<a
                    href="' . $CategoryNews->id . '/edit"
                    data-toggle="tooltip"
                    data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editUser">
                    Edit
                    </a>';
                $btn .= ' <a
                    href="' . $CategoryNews->id . '/delete "
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
     * Add news Category
     */
    public function store(Request $request)
    {
        $CategoryNews = new CategoryNews();
        $CategoryNews->fill($request->all());
        $CategoryNews->save();

        return redirect()->route('list.cate.new');
    }

    /**
     * Check duplicate name
     */
    public function checkName(Request $request)
    {
        $check_name = CategoryNews::where("name", $request->name)->count();

        echo json_encode($check_name <= 0);
    }

    public function edit($id)
    {
        $CategoryNews = CategoryNews::find($id);

        return view('content.category-new.edit', compact('CategoryNews'));
    }

    /**
     * Update
     */
    public function update(CategoryNewsForm $request, $id)
    {
        $CategoryNews = CategoryNews::find($id);
        $CategoryNews->fill($request->all());
        $CategoryNews->save();

        return redirect()->route('list.cate.new');
    }
    /**
     * Delete new category
     */
    public function delete($id){
        $CategoryNews = CategoryNews::find($id)->delete();

        return redirect()->route('list.cate.new');
    }
}
