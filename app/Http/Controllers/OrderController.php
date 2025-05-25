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
                ->with('makeOrderStatus', $response['status'])
                ->with('makeOrderMessage', $response['message']);
    }

    public function getOrders() {
        $response = $this->service->getOrders();

        return view('account', [
            'dados' => $response['dados'],
            'message' => $response['message'],
            'status' => $response['status']
        ]);  
    }
}
