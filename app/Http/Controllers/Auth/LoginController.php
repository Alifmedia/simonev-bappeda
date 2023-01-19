<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Umum;
use App\Models\Administrator;

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
    
    //Class ini menangani KOMUNIKASI ANTARA KELAS ROUTE MAYA(ROUTER.PHP) DENGAN KELASU AUTENTICATEUSERS  :
    //1.LoginController@ShowLoginForm
    //2.LoginController@Login
    //3.

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
    protected $redirectTo = '/home';

    

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this,'hasTooManyLoginAttempts')&&$this->hasTooManyLoginAttempts($request)) 
        {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) 
        {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


 /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }





    protected function authenticated(Request $request, $user)
    {
      
      if ($user->level < 2) 
      {
        $umum_atau_administrator_id = Umum::select(['id','user_id'])
                                            ->where('user_id',$user->id)
                                            ->firstOrFail()->id;
        $apakah_umum = true;
      } 
      else 
      {
        // $umum_atau_administrator_id = Administrator::with('umum')->select(['id','user_id'])
        //                                              ->where('user_id',$user->id)
        //                                             ->firstOrFail()->id;

        $umum_atau_administrator_id = Umum::select(['id','user_id'])
                                                     ->where('user_id',$user->id)
                                                     ->firstOrFail()->id;
        $apakah_umum = false;
      }

      session(
              [
               'umum_atau_administrator_id' => $umum_atau_administrator_id,
               'apakah_umum'                => $apakah_umum,
              ]
             );
   }
}
