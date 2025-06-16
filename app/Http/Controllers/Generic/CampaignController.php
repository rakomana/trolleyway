<?php

namespace App\Http\Controllers\Generic;

use App\Models\Campaign;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Subscription\Message;

class CampaignController extends Controller
{
    /**
     * @var $campaign
    */
    private $campaign;
    private $subscription;

    /**
     * Inject models into the Constructor
     * @param Campaign $campaign
    */
    public function __construct(Campaign $campaign, Subscription $subscription)
    {
        $this->campaign = $campaign;
        $this->subscription = $subscription;    
    }

    /**
     * Inject models into the constructor
     * @param Subscription $subscription
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = $this->campaign->all();

        return view('admin.campaign', compact('campaigns'));
    }

    /**
     * Send bulk email subscription make use of queue to mitigate latency
    */
    public function store(Request $request)
    {
        #create migration and save the messages
        $subscriptions = $this->subscription->all();

        $campaign = new $this->campaign();
        $campaign->message = $request->message;
        $campaign->save();
        
        foreach($subscriptions as $subscription)
        {
            $subscription->notify(new Message(
                $campaign
            ));
        }

        return back()->with('success', 'Campaign on the queue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.add-campaign');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
