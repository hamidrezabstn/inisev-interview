<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Models\Post;
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

       $validated = $request->safe()->only(['title', 'description']);
       $post = new Post($validated);
       $website->posts()->save($post);
       return response()->success($post);
    }
}
