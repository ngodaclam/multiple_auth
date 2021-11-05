<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmRegisterCtv;
use App\Mail\RegisterCtvNotify;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use Flash;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return
     */
    public function register(Request $request)
    {
        // create ctv
        $user = new User();
        $user->fill($request->all());
        $user->referral_code = Str::random(6);
        $user->promo_code = Str::random(8);
        $password = Str::random(8);
        $user->password = Hash::make($password);
        $user->otp = rand(100, 999);
        $user->status = User::PENDING;

        $user->save();

        Mail::to($user->email)
            ->send(new RegisterCtvNotify($user->toArray()));

        return redirect()->back()->with(['user' => $user, 'password' => $password]);
    }

    /**
     * @param Request $request
     */

    public function checkEmailCtv(Request $request)
    {
        $check_email_ctv = User::where("email", $request->email)->count();
        echo json_encode($check_email_ctv <= 0);
    }

    /**
     * @param Request $request
     */
    public function checkOtp(Request $request)
    {
        $checkOtp = User::where('email', $request->email)->where('otp', $request->otp)->count();
        echo json_encode($checkOtp > 0);
    }

    public function confirmOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $user->name = $request->name;
        $user->status = User::ACTIVE;
        $user->save();
        Mail::to($user->email)
            ->send(new ConfirmRegisterCtv(['user'=>$user,'password'=>$request->password]));
        return redirect()->route('register.ctv.confirm')->with(['user' => $user, 'password' => $request->password]);
    }
}

