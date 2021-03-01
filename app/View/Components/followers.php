<?php

namespace App\View\Components;

use App\Models\Profile;
use Illuminate\View\Component;

class followers extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $user;
    public $followers;
    public $profiles;
    public function __construct($user)
    {
        $this->user = $user;
        $this->followers = $this->user->profile->followers()->pluck('user_id');
        $this->profiles = Profile::whereIn('id', $this->followers)->with('user')->latest()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.followers');
    }
}
