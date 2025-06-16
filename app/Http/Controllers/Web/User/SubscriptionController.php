<?php

namespace App\Http\Controllers\Web\User;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\User\Subscription as NotifySubcriber;
use App\Http\Requests\User\SubscriptionStoreRequest;

class SubscriptionController extends Controller
{
    /**
     * @var $subscription
    */
    private $subscription;

    /**
     * Inject models into the construct
     * @param Subscription $subscription
    */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    /**
     * Show specific resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subscriptions = $this->subscription->all();

        return view('admin.subscriptions', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionStoreRequest $request)
    {
        $subscription = new $this->subscription();
        $subscription->email = $request->email;
        $subscription->save();

        $subscription->notify(new NotifySubcriber());

        return view('user.thank-subscription');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return back();
    }
}
