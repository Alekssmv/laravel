<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Price extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public readonly int $price)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string|Closure
    {
        return view('components.panels.price');
    }

    public function formattedPrice(): string
    {
        return number_format($this->price, 0, '', ' ');
    }
}
