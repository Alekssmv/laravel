<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InformationMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public array $menu = [
        [
            'title' => 'О компании',
            'route' => 'about',
        ],
        [
            'title' => 'Контактная информация',
            'route' => 'contact',
        ],
        [
            'title' => 'Условия продаж',
            'route' => 'sale',
        ],
        [
            'title' => 'Финансовый отдел',
            'route' => 'finance',
        ],
        [
            'title' => 'Для клиентов',
            'route' => 'clients',
        ]
    ];


    public function __construct(public readonly string $template)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.information-menu.' . $this->template);
    }
}
