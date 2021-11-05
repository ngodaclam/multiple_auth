<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function register(Request $request)
    {
        \DB::beginTransaction();
        try {
            \DB::table('subscribers')->insert([
                'email' => $request->email,
                'tel' => $request->tel,
            ]);

            \DB::commit();

            return response()->json(['status' => true], 200);
        } catch (\Exception $exception) {
            \DB::rollBack();

            return response()->json(['status' => false], 403);
        }
    }
}
