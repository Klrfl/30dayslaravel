<?php

namespace App\View\Components;

use App\Models\Tag as ModelsTag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tag extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsTag $tag)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tag');
    }
}
