<x-layouts.main_layout title="home">
    <x-slot:content>
        <header class="flex justify-between items-end bg-blue-100 px-3 ">
            <div class="m-0 w-fit py-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logo.svg') }}" alt="logo" class="w-20 max-w-35" />
                </a>
            </div>
            <navigation>
                <ul class="flex gap-16">
                    @if(Route::currentRouteName() == "home")
                        <li class="text-blue-900 text-3xl font-medium border-b-3 border-blue-800 py-6"><a href="#">Produtos</a></li>
                    @else 
                        <li class="text-white text-3xl font-medium my-6 hover:text-blue-900 transition-all ease-in-out duration-100"><a href="#">Produtos</a></li>
                    @endif

                    @if(Route::currentRouteName() == "account")
                        <li class="text-blue-900 text-3xl font-medium border-b-3 border-blue-800 py-6"><a href="#">Conta</a></li>
                    @else 
                        <li class="text-white text-3xl font-semibold my-6 hover:text-blue-900 transition-all ease-in-out duration-100"><a href="#">Conta</a></li>
                    @endif

                    @if(Route::currentRouteName() == "about")
                        <li class="text-blue-900 text-3xl font-medium border-b-3 border-blue-800 py-6"><a href="#">Sobre</a></li>
                    @else 
                        <li class="text-white text-3xl font-medium my-6 hover:text-blue-900 transition-all ease-in-out duration-100"><a href="#">Sobre</a></li>
                    @endif
                </ul>
            </navigation>
            <div class="flex gap-2 py-6">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" strok-width="0.5" stroke="black"  class="size-16 hover:fill-blue-200 transition-all ease-in-out duration-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                    @csrf
                    <button class="m-0 p-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" strok-width="0.5" stroke="black" class="size-16 cursor-pointer hover:fill-blue-200 transition-all ease-in-out duration-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                    </button>    
                </form>
            </div>
        </header>

        <div>

        </div>

        <div>
            <div>
                {{-- COMPONENT HEADER SECTION --}}
                <div>
                    <div>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                {{-- COMPONENT HEADER SECTION --}}
                <div>
                    <ul>

                    </ul>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layouts.main_layout>