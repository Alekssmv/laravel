<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;


class PagesController extends Controller
{
    public function admin(): Factory|View|Application
    {
        return view('pages.admin.admin');
    }
}
