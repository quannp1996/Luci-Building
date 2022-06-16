<?php

namespace App\Containers\BaseContainer\UI\WEB\Components\FrontEnd;

use Illuminate\View\Component;

class MenuMobileComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('basecontainer::frontend.pc.components.menumobile-component');
    }
}
