<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\CommonTrait;
use Yajra\DataTables\DataTables;

class PartnerController extends Controller
{
    use CommonTrait;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('users')->insert([
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'cmtnd' => $request->cmtnd,
            'birthday' => $request->birthday,
            'referral_code' =>  $this->generateRandomString(6),
            'promo_code' => $this->generateRandomString(12),
        ]);

        return redirect('partners/list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editUser = DB::table('users')->where('id', $id)->first();

        return view('content.partner.edit', compact('editUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_user = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => User::find($id)->first()->password,
            'mobile' => $request->mobile,
            'cmtnd' => $request->cmtnd,
            'birthday' => $request->birthday,
        );
        DB::table('users')->Where('id', $id)->update($update_user);

        return redirect('partners/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('partners/list');
    }
    // Datatable Basic
    public function listPartner()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => "javascript:void(0)", 'name' => "Partner"],
            ['name' => "List Partner"]
        ];

        return view('/content/partner/list', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function getList()
    {
        $id = Auth::user()->id;
        $user = DB::table('users')
//            ->where('id', '=', $id)
            ->Where('parent_ids', 'LIKE', '%' . $id . '%')
            ->select([
                'id',
                'name',
                'email',
                'mobile',
                'birthday',
                'cmtnd',
                'referral_code',
                'promo_code'
            ])->get();

        return Datatables::of($user)
            ->addColumn('action', function ($user) {
                $btn = '<nobr>';
                $btn .= '<a
                    href="' . $user->id . '/edit"
                    data-toggle="tooltip"
                    data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editUser">
                    Edit
                    </a>';
                $btn .= ' <a
                    href="'. $user->id .'/delete "
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
}
