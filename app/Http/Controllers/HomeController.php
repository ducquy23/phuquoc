<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    public function __construct(
        protected HomeService $homeService
    ) {}

    /**
     * @return Factory|View
     */
    public function index(): Factory|View
    {
        $data = $this->homeService->getHomeData();
        return view('home', $data);
    }
}


