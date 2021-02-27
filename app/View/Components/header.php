<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $home;
    public $activity;
    public $dm;
    public $profileImg;
    public function __construct()
    {
        if (Auth::user()) {
            $this->profileImg = Auth::user()->profile->profileImage();
        }
        $currentURL = url()->current();
        $this->home = ($currentURL == "http://127.0.0.1:8000") ? "img/homeactive.png" : "img/homeicon.png";
        $this->activity = ($currentURL == "http://127.0.0.1:8000/activity") ? "img/activityactive.png" : "/img/like.jpg";
        $this->dm = ($currentURL == "http://127.0.0.1:8000/chat") ? "img/dmicontheactive.png" : "/img/dmicon.png";
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
