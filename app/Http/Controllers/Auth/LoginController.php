<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

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

    public function redirectTo(Request $request)
    {
        // $redirect_route = $this->getRedirectRoute($request);

        switch(Auth::user()->role_id)
        {
            case '1':
            case '2':
                $this->redirectTo = route('admin.dashboard.index');
                return $this->redirectTo;
                break;
            case '3':
                $this->redirectTo = route('home.index');
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/';
                return $this->redirectTo;
        }
    }
        /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath(Request $request)
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo($request);
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

        /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath($request));
    }


    public function username()
    {
        return 'nickname';
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
}
