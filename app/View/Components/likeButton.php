<?php

namespace App\View\Components;

use Illuminate\View\Component;

class likeButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $postId = "";
    public $liked = "";
    public $padding = "";
    public $image = "";
    public function __construct($postId, $thepage)
    {
        $this->postId = $postId;
        $this->liked = auth()->user() ? auth()->user()->like->contains($postId) : false;
        if ($thepage == "index") {
            $this->padding = '2';
        } else {
            $this->padding = "1";
        }
        if (!$this->liked) {
            $this->image = "like.jpg";
        } else {
            $this->image = "unlike.png";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.like-button');
    }
}
