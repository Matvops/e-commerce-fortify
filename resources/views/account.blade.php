<x-layouts.main_layout title="account">
    <x-slot:content>
        <header class="flex items-end bg-blue-100 px-4 mt-[1px]">
            <div class="m-0 w-fit py-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logo.svg') }}" alt="logo" class="w-20 max-w-35" />
                </a>
            </div>
            <navigation class="mx-auto">
                <x-navigation :currentPage="Route::currentRouteName()" />
            </navigation>
            @auth
                <div class="flex gap-4">
                    <x-cart-logo />
        
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

        <section class="mb-2">
            <section class="w-[40%] bg-zinc-100 mx-auto mt-25 rounded shadow-zinc-200 shadow-md">
                <h1 class="uppercase text-4xl font-semibold text-center py-8 text-blue-900">Histórico de compras</h1>

                <ul class="p-0 m-0 border-color-black max-h-[300px] overflow-y-auto">
                    @if($status)
                        @foreach($dados as $order)
                            <li class="border-color-black border-t-2 px-3 py-3 text-2xl flex justify-between">
                                <div class="font-semibold">{{ $order['created_at'] }}</div> 
                                <div>R$ {{$order['order_price']}}</div>
                            </li>
                        @endforeach
                    @else
                        <h1 class="text-center font-medium text-2xl pb-7">{{ $message }}</h1>
                    @endif
                </ul>

            </section>

            <section class="w-[40%] bg-zinc-100 mx-auto mt-10 rounded shadow-zinc-200 shadow-md">
                <form action="{{ route('user-profile-information.update') }}" method="POST" class="px-6 py-3">
                    @csrf 
                    @method('PUT')

                    <legend class="text-blue-900 text-4xl font-bold my-8">Dados Pessoais</legend>
                    <fieldset class="flex flex-col gap-8">

                        <div class="flex flex-col gap-2">
                            <label for="name" class="text-blue-900 text-2xl font-medium">Nome</label>
                            <input type="name" name="name" id="name" value="{{ Auth::user()->name }}" placeholder="Digite o seu nome..." autocomplete="off"
                                class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label for="email" class="text-blue-900 text-2xl font-medium">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" placeholder="Digite o email..." autocomplete="off"
                                class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                        </div>

                        <x-form-button text="Atualizar" />
                    </fieldset>
                </form>
            </section>
        <section>
    </x-slot:content>
</x-layouts.main_layout>