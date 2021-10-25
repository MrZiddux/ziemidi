<?php

namespace App\View\Components;

use Illuminate\View\Component;

class App extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $js;
    public $btm;
    public function __construct($title = null, $js = null, $btm = null)
    {
        $this->title = $title ?? '';
        $this->js = $js ?? '';
        $this->btm = $btm ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.layouts.app');
    }
}
