<?php

namespace App\Http\Controllers;

use App\Services\OrderService;

class OrderController extends Controller
{

    private OrderService $service;


    function __construct(OrderService $service) {
        $this->service = $service;     
    }

    public function makeOrder() {

        $response = $this->service->makeOrder();

        return redirect()
                ->back()
                ->with('makeOrderStatus', $response->getStatus())
                ->with('makeOrderMessage', $response->getMessage());
    }

    public function getOrders() {
        $response = $this->service->getOrders();

        return view('account', [
            'dados' => $response->getDados(),
            'message' => $response->getMessage(),
            'status' => $response->getStatus()
        ]);  
    }
}
