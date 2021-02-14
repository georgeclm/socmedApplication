<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        // same as this below to simplfy the work
        // dd($user->profile);
        // $user = User::find($user);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd(Auth::user()->following->count());
        return view('profiles.index', compact('user', 'follows'));
    }
    public function edit(User $user)
    {
        // to authorize the edit  the update
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }
    public function update(User $user)
    {
        // to authorize the edit  the update
        $this->authorize('update', $user->profile);
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'url' => '',
            'image' => 'image',

        ]);
        // for image
        // this one to make sure that the user put image then it is going to get executed if not no porblem then
        if (request('image')) {
            // same with the post image to save the image
            request('image')->store('profile', 'public');
            // $image = Image::make("storage/{$imagePath}")->getRealPath()->fit(1000, 1000);
            // $image->save();
            $imageArray = ['image' => request('image')->hashName()];
        }

        // add auth because not user can change the data
        // use array merge to merge both the data include image and then change the image value from the data to be the imagepath that is pass
        // so the second array merge the first image
        auth()->user()->profile->update(array_merge(
            $data,
            // use if then and empty array mean no change in the array merge because in before there has to be image that is going to pass if not then error
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}")->with('success', 'Success Profile Have Been Updated');
        // after all this now time for policy and privacy
        // go to artisan and php artisan make:policy (nameofpolicy) -m (nameofmodel)
        // php artisan make:policy ProfilePolicy -m Profile
        // then inside app there will be policy and profile policy
    }
    static function takeProfileImg()
    {
        $profileImg = Auth::user()->profile->profileImage();
        return $profileImg;
    }
    public function search(Request $request)
    {
        $name = [];
        if ($request->has('q')) {
            $search = $request->q;
            $name = DB::table('users')
                ->join('profiles', 'users.id', '=', 'profiles.user_id')
                ->where('name', 'LIKE', "%$search%")
                ->orWhere('title', 'LIKE', "%$search%")
                ->select('users.id', 'users.name')
                ->get();
        }
        return response()->json($name);
    }
    public function gotoprofile(Request $request)
    {
        return redirect("/profile/{$request->livesearch}");
    }
}
