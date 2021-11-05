<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function listOrder()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"],
            ['link' => "javascript:void(0)", 'name' => "Orders"],
            ['name' => "List Order"]
        ];

        return view('/content/order/list', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order =[
            'user_id' => $request->user_id,
            'partner_id'=>$request->partner_id,
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'invoice_no' => $request->invoice_no,
            'coupon_code' => $request->coupon_code,
            'status' =>2,
            'pti_status' => 0,
            'created_at' =>  Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            'updated_at' =>  Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        ];
        DB::table('orders')->insert($order);

        return redirect('orders/list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arrStatus=[
            ['value'=>0,'name'=>'Lỗi'],
            ['value' => 1, 'name' => 'Hoàn thành'],
            ['value'=> 2,'name'=>'Đang xử lý']
        ];
        $arrPtiStatus=[
            ['value'=>0,'name'=>'Đang xử lý'],
            ['value' => 1, 'name' => 'Hoàn thành'],
        ];

        $editOrder = DB::table('orders')->where('id', $id)->first();

        return view('content.order.edit', compact('editOrder','arrStatus','arrPtiStatus'));
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
        $update_order = array(
            'user_id' => $request->user_id,
            'partner_id'=>$request->partner_id,
            'item_id' => $request->item_id,
            'amount' => $request->amount,
            'invoice_no' => $request->invoice_no,
            'coupon_code' => $request->coupon_code,
            'status' =>$request->status,
            'pti_status' => $request->pti_status,
            'updated_at' =>  Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString()
        );

        DB::table('orders')->Where('id', $id)->update($update_order);

        return redirect('orders/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('orders')->where('id', $id)->delete();

        return redirect('orders/list');
    }
    public function getList(Request $request): \Illuminate\Http\JsonResponse
    {
        $model = Order::query();
        $order = \Yajra\DataTables\Facades\DataTables::eloquent($model)
            ->editColumn('created_at', function ($request) {
                return $request->created_at->format('Y-m-d');
            })
            ->editColumn('updated_at', function ($request) {
                return $request->updated_at->format('Y-m-d');
            })
            ->editColumn('status', function ($request) {
                if ($request->status == Order::STATUS_SUCCESS)
                    $request->status = 'Hoàn thành';
                if ($request->status == Order::STATUS_PROCESSING)
                    $request->status = 'Đang xử lý';
                elseif ($request->status == Order::STATUS_FALSE)
                    $request->status = 'Lỗi';
                return $request->status;
            })
            ->editColumn('pti_status', function ($request) {
                return $request->pti_status ? 'Hoàn thành' : 'Đang xử lý';
            })
            ->addColumn('action', function ($order) {
                $btn = '<nobr>';
                $btn .= '<a
                    href="' . $order->id . '/edit"
                    data-toggle="tooltip"
                    data-original-title="Edit"
                    class="edit btn btn-primary btn-sm editUser">
                    Edit
                    </a>';
                $btn .= ' <a
                    href="'. $order->id .'/delete "
                    data-toggle="tooltip"
                   data-original-title="Delete"
                    class="btn btn-danger btn-sm deleteUser">
                    Delete
                    </a>';
                $btn .= '</nobr>';
                return $btn;
            });

        return $order->toJson();
    }
}
