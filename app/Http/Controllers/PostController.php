<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Website;

class PostController extends Controller
{  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->safe()->only(['website_id','title', 'description']);

        $website = Website::find($validated["website_id"]);

        if($website == null){
             return response()->error("required website is invalid");
        }

        $post = new Post($request->safe()->only(['title', 'description']));
        $website->posts()->save($post);
        
        return response()->success($post);
    }   
}
