<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // this index pluck to take the relationship inside following from auth user and take the user id
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(5);
        return view('posts/index', compact('posts'));
    }
    public function create()
    {
        return view('posts\create');
    }
    public function store()
    {
        // for validation as usual post so not just in html but laravel to
        $data = request()->validate([
            'caption' => 'required',
            // image mean .imgage only
            'image' => ['required', 'image'],
        ]);

        // use this dd request and use store to autmatically save the picture for the parameter inside the store first one is the path of the file and the second is where to save in this case public when use amazon called it s3
        // if mention uploads it will be saved inside the storage/app/public/uploads
        // the file inside the public is not accesible until run php artisan storage:link inside artisan
        // after run that now it is acccesible by /storage/uploads/(nameofpicture)
        // after it is accesible have to pass to the database
        // $imagePath = request('image')->store('uploads','public');
        request('image')->store('uploads', 'public');
        // $imagePath = ['image' => request('image')->hashName()];
        $imagePath = request('image')->hashName();
        // after already put the extension intervention image this to fit the image to 1200,1200 but this doesnt resize the image, this cut the image completly
        // use image class, the public path and the fit to size
        //$image =Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        // after change the image then save it to the database
        //$image->save();
        // to take care of the user id post create that has been created and already know the user has many
        $userId = Auth::user()->id;
        $post = new Post([
            'caption' => $data['caption'],
            'image' => $imagePath,
            'user_id' => $userId
        ]);
        $post->save();
        // auth()->user()->posts->create([
        //     'caption' => $data['caption'],
        //     'image' => $imagePath,
        // ]);
        // for all to delete all the image post go to php artisan tinker
        // Post::truncate();
        // to redirect the page after run
        // last to make the picture is square add extension outside laravel
        // composer require intervention/image
        return redirect('/profile/' . auth()->user()->id);
    }
    public function show(Post $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;
        return view('posts/detail', compact('post', 'follows'));
    }
}
