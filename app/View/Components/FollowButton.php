<?php

namespace App\View\Components;

use Illuminate\View\Component;

class followButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $userId = "";
    public $follows = "";
    public $button = "";
    public $color = "";
    public function __construct($userId, $follows)
    {
        $this->userId = $userId;
        $this->follows = $follows;
        if (!$follows) {
            $this->button = "Follow";
            $this->color = "primary";
        } else {
            $this->button = "Following";
            $this->color = "dark";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        return view('components.follow-button');
    }
}
