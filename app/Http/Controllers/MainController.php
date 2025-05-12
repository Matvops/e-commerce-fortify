<?php

namespace App\Http\Controllers;

use App\Services\MainService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new MainService;
    }
    
    public function home(){
        $products = $this->service->getAllProducts();
        $topSeller = $this->service->getTopsSeller();
        error_log(json_encode($topSeller));
        return view('home', ['products' => $products, 'highlights' => $topSeller]);
    }

    
}
