<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class Link extends Component
{
    public $href;

    public function __construct($to)
    {
        $this->href = $to;
    }

    public function render()
    {
        return view('components.navbar.link');
    }
}
