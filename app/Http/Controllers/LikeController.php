<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\blog;
class LikeController extends Controller
{
 public function like(blog $blog)
{
    if ($post->likes()->where('user_id', auth()->id())->exists()) {
        return redirect()->back()->with('message', 'You already liked this post');
    }

    $post->likes()->create(['user_id' => auth()->id()]);
    return redirect()->back();   
}

public function unlike(blog $blog)
    {
        // Remove the like
        $post->likes()->where('user_id', auth()->id())->delete();
        return redirect()->back();
    }
}
