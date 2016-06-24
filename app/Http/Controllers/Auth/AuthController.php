<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use View;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Session;
use Log;
use App\Http\Requests\UserLoginRequest;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    private $redirectTo = '/dash';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getLogin()
    {
        return View::make('dash::layouts.login')->render();
    }

    public function postLogin(UserLoginRequest $request)
    {
       $credentials = $request->only('email', 'password');

       $authenticate = $this->auth->attempt($credentials, $request->has('remember'));

        if(Auth::user()):
            if(Auth::user()->status == 0){ //check user status active or inactive
                $authenticate = false;
                return $this->printJson(false, ['redir' => '/auth/logout'],'Your account has been deactivated !');
            }
        endif;

        if ($authenticate) {

            Log::info('Login attempt success for user: ' . $request->get('email'));
            return $this->printJson(true, ['redir' => $this->redirectPath()]);
        }

        return $this->printJson(false, [], 'These credentials do not match our records.');
    }
}
