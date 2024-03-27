<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;

class WebsiteController extends Controller
{   
    /**
     * subscribe a user to a website
     */
    public function subscribe(SubscriptionRequest $request, int $id)
    {
        $website = Website::find($id);

        if($website == null){
             return response()->error("required website is invalid");
        }

        $validated = $request->safe()->only(['user_id']);

        $user = User::find($validated['user_id']);

        if($user == null){
             return response()->error("provided user is invalid");
        }

        $subscription = Subscription::firstWhere('user_id', $validated['user_id']);

        if($subscription != null){
            return response()->error("you were subscribed before");
       }        
       Subscription::create([
        "website_id"=>$website->id,
        "user_id"=>$user->id,
    ]);       
        
        return response()->success($user);
    }
}
