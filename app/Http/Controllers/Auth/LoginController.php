<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
//    protected $redirectTo = 'admin';

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
	 * The user has been authenticated.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  mixed $user
	 *
	 * @return mixed
	 */
	protected function authenticated(Request $request, $user)
	{
		if (!$user->verified) {
			auth()->logout();
			return back()->with('warning', trans('global.email_need_verification'));
		}
		return Redirect::route( $user->getHomeRoute() );
	}

//	/**
//	 * The user has been authenticated.
//	 *
//	 * @return mixed
//	 */
//	protected function redirectTo()
//	{
//		dd(1);
//		return 1;
////
//	}

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	protected function credentials( Request $request ) {
		$credentials           = $request->only( $this->username(), 'password' );
		$credentials['active'] = 1;

		return $credentials;
	}
}
