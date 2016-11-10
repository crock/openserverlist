<?php 

namespace Enderlist\Http\Controllers\Auth;


use Enderlist\Http\Requests;
use Enderlist\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

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

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

	public function getLogin()
    {
        return view('auth.login');
    }

	public function postLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required', 'password' => 'required',
        ]);


            $tvar = $request->input('username');
            $pw = $request->input('password');
            if ($this->auth->attempt(['username' => $tvar, 'password' => $pw]))
        {
                    //echo 'logged in========'.$request->user->userid;
                    //echo 'logged in========'.$request->user()->userid;
                    $yourvar = $request->user()->username;
                    echo $yourvar;
                    echo "====loggin in now";
                    //return redirect('olist');
        }
            else
                {
                    echo ' not logged in';
                }

                //added

        /*$credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return redirect($this->redirectPath());
        }

        return redirect('/auth/login')
                    ->withInput($request->only('email'))
                    ->withErrors([
                        'email' => 'These credentials do not match our records.',
                    ]);*/
    }

	public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }



}