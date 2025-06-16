<?php

namespace App\Http\Controllers\Web\User\Auth;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileLoginController extends Controller
{
    /**
     * @var $user
     */
    private $user;

    /**
     * Inject models into the constructor
     *
     * @param User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::find($request->route('id'));
        auth()->login($user);

        return redirect('checkout');
    }
}
