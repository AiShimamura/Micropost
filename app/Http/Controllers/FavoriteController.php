<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Micropost;
use Auth;

class FavoriteController extends Controller
{
    public function store($micropost_id)
    {
        $micropost = Micropost::findOrFail($micropost_id);

        if (!Auth::user()->is_Favorite($micropost_id)) {
            Auth::user()->favorite($micropost_id);
        }

        return back();
    }

    public function destroy($micropost_id)
    {
        $micropost = Micropost::findOrFail($micropost_id);

        if (Auth::user()->is_Favorite($micropost_id)) {
            Auth::user()->unfavorite($micropost_id);
        }

        return back();
    }
}