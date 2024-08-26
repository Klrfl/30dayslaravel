<?php

namespace App\View\Components;

use App\Models\Guitar as ModelsGuitar;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Guitar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsGuitar $guitar)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guitar');
    }
}
