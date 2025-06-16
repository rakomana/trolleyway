<?php

namespace App\Http\Controllers\Web\User\Auth;

use Auth;
use App\Models\User;
use App\Models\Log;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Stevebauman\Location\Facades\Location;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    private $user;
    private $log;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     * Inject models into the constructor
     *
     * @param User $user
     * @return void
     */
    public function __construct(User $user, Log $log)
    {
        $this->middleware('guest')->except('logout');
        $this->user = $user;
        $this->log = $log;
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $profile = Socialite::driver($provider)->stateless()->user();
        
        $user = $this->user->firstOrNew(['email' =>  $profile->getEmail()]);
        $user->name = $profile->getName();
        $user->provider_id = $profile->getId();
        $user->provider = $provider;
        $user->save();

        Auth::Login($user, true);

        return redirect('/');
    }

    /**
     * Return view
     */
    public function index()
    {
        return view('user.auth.login');
    }
}
