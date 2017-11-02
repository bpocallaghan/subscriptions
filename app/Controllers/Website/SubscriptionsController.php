<?php

namespace Bpocallaghan\Subscriptions\Controllers\Website;

use App\Http\Requests;
use Illuminate\Http\Request;
use Bpocallaghan\Subscriptions\Models\SubscriptionPlan;
use App\Http\Controllers\Website\WebsiteController;

class SubscriptionsController extends WebsiteController
{
	public function index()
	{
        $subscriptionPlans = SubscriptionPlan::with('features')->get();

        return $this->view('subscriptions::subscriptions', compact('subscriptionPlans'));
	}
}