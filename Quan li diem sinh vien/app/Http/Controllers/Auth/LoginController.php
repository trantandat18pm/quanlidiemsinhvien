<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class LoginController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/
	use AuthenticatesUsers;
	
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo;
	protected function redirectTo()
{
    if (Auth::user()->quyenhan == 1) {
        return '/trangchu';
    }
    if (Auth::user()->quyenhan == 2) {
        return '/trangchu';
    }
    if (Auth::user()->quyenhan == 3) {
        return '/trangchu';
    }
    return '/';
}
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}
	
	/**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
		$identity  = request()->get('email');
		$fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		request()->merge([$fieldName => $identity]);
		return $fieldName;
    }
}