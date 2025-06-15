<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function clap(Post $post, Request $request)
    {
        $hasClapped = $request->user()->hasClapped($post);

        if ($hasClapped) {
            $post->claps()->where('user_id', $request->user()->id)->delete();
            return response()->json([
                'message' => 'Clap removed successfully.',
                'clapsCount' => $post->claps()->count(),
            ]);
        } else {
            $post->claps()->firstOrCreate([
                'user_id' => $request->user()->id,
            ]);
            return response()->json([
                'message' => 'Clap recorded successfully.',
                'clapsCount' => $post->claps()->count(),
            ]);
        }
    }
}
