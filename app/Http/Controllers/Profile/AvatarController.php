<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatedAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdatedAvatarRequest $request){

        // avatar stored
        $path = $request->file('avatar')->store('user_avatars', 'public');
        auth()->user()->update(['avatar' => $path]);
        // dd(auth()->user());
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated!');
    }
}
