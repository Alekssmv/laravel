<?php

namespace App\View\Components\Products;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Parameters extends Component
{

    public array $showparameters = [
        "car_engine" => true,
        "car_body" => true,
        "car_class" => true,
        'salon' => true,
        'kpp' => true,
        'year' => true,
        'color' => true,
    ];

    public function __construct()
    {

    }

    public function render(): View|Closure|string
    {
        return view('components.panels.products.parameters');
    }
}
