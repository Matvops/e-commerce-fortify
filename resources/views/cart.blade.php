<x-layouts.main_layout title="Cart">
    <x-slot:content>
        <header class="flex items-center bg-blue-100 px-4 mt-[1px]">
            <div class="m-0 w-fit py-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logo.svg') }}" alt="logo" class="w-20 max-w-35" />
                </a>
            </div>
            
            <h1 class="text-4xl font-semibold flex-1 text-center">Valor Total: R$ {{$cart->cart_total_price}}</h1>

            @auth
                <div class="flex gap-4">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="m-0 p-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" strok-width="0.5" stroke="black" class="size-16 cursor-pointer hover:fill-blue-200 transition-all ease-in-out duration-100">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                            </svg>
                        </button>    
                    </form>
                </div>
            @endauth
            
            @guest
                <div class="flex gap-4 mb-2">
                    <a href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" strok-width="0.5" stroke="black" class="size-16 hover:fill-blue-200 transition-all ease-in-out duration-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>
                    </a>
                </div>
            @endguest
        </header>

        <main class="w-[80%] mx-auto mt-15">
            <ul class="flex flex-col gap-10">
                @foreach ($products as $product)
                    <x-product-cart-card :product="$product" />
                @endforeach
            </ul>
        </main>
    </x-slot:content>
</x-layouts.main_layout>