<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PublicProfileController extends Controller
{
    public function show(Request $request, User $user)
    {
        $posts = $user->posts()->latest()->paginate();
        return view('profile.show', compact('user', 'posts'));
    }
}
