<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs as crumbs;

class Breadcrumbs extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $model = Route::current()->parameters();

        if (!empty($model)) {
            $model = array_values($model)[0];
        }

        $breadcrumbs = crumbs::generate(Route::currentRouteName(), $model);

        return view('components.panels.breadcrumbs', compact('breadcrumbs'));
    }
}
