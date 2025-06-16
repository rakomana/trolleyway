<?php

namespace App\Http\Controllers\Web\Seller\Auth;

use Auth;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{
    /**
     * @var $log
    */

    /**
     * @param Log $log
    */
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Login the seller.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validator($request);
    
        if(Auth::guard('seller')->attempt($request->only('email','password'),$request->filled('remember'))){
                //log seller's information
                $log = new $this->log();
                $log->user_information = json_encode([
                    'user_device'  => $_SERVER['HTTP_USER_AGENT'],
                    'user_location' => Location::get(),
                ]);
                $log->user()->associate($request->user('seller'));
                $log->save();
            return redirect('seller');
        }
        
        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the seller.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('seller')->logout();
        
        return redirect('seller/login');
    }

    /**
     * Validate the form data.
     * 
     * @param \Illuminate\Http\Request $request
     * @return 
     */
    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:sellers|min:5|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
        ->back()
        ->withInput()
        ->with('error','These credentials do not match our records');
    }

    /**
     * Redirect back after a failed login.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function indexLogin()
    {
        return view('seller.auth.login');
    }
}