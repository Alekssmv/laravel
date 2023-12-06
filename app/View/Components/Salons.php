<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App;
use App\Contracts\Services\ApiServiceContract;

class Salons extends Component
{
    /**
     * Create a new component instance.
     */
    private readonly ApiServiceContract $salonsService;

    public function __construct(
    ) {
        $this->salonsService = app::makeWith(ApiServiceContract::class, [
            'login' => config('apisalons.salons.login'),
            'password' => config('apisalons.salons.password'),
            'url' => config('apisalons.salons.url'),
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $salons = $this->salons();

        if ($salons === null) {
            return view('components.panels.messages.error_empty');
        } else {
            return view('components.panels.footer.salons', compact('salons'));
        }
    }
    public function salons(): array|null
    {
       return $this->salonsService->get('salons',['limit' => 2, 'in_random_order' => 1], 60 * 5);
    }
}
