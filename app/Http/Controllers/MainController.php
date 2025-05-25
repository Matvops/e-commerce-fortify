<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductOnCartRequest;
use App\Http\Requests\RemoveProductCartRequest;
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
    
    public function home(Request $request){

        $dados = [
            'search' => $request->input('search') ?? null,
            'filter' => $request->input('filter') ?? null,
        ];

        $response = $this->service->getProducts($dados);

        if(!$response->getStatus()) {
            return redirect()
                ->back()
                ->with('productsError', $response->getMessage());
        }

        $products = $response->getDados();
        $topSeller = $this->service->getTopsSeller();
        
        return view('home', ['products' => $products, 'highlights' => $topSeller]);
    }
}
