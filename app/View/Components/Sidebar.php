<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\Data\Common;

class Sidebar extends Component
{
    use Common;
    public $sidebar;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        $this->sidebar = $this->current_sidebar();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
