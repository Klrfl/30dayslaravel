<?php

namespace App\View\Components;

use App\Models\Guitar;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuitarEditForm extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Guitar $guitar, public bool $open)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.guitar-edit-form');
    }
}
