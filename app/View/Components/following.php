<?php

namespace App\View\Components;

use App\Models\Profile;
use Illuminate\View\Component;

class following extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $following;
    public $profiles;
    public function __construct($user)
    {
        $this->user = $user;
        $this->following = $this->user->following()->pluck('profiles.user_id');
        $this->profiles = Profile::whereIn('user_id', $this->following)->with('user')->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.following');
    }
}
