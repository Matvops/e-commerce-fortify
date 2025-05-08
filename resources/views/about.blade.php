<x-layouts.main_layout title="About">

    <x-slot:content>
        <header class="flex items-end bg-blue-100 px-4 ">
            <div class="m-0 w-fit py-4 ">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('logo.svg') }}" alt="logo" class="w-20 max-w-35" />
                </a>
            </div>
            <navigation class="mx-auto ">
                <x-navigation :currentPage="Route::currentRouteName()" />
            </navigation>

            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                @csrf
                <button class="m-0 p-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" strok-width="0.5" stroke="black" class="size-16 cursor-pointer hover:fill-blue-200 transition-all ease-in-out duration-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                    </svg>
                </button>    
            </form>
        </header>

        <main class="w-[60%] mx-auto mt-36">
            <h1 class="text-center text-4xl font-semibold text-blue-900 mb-12">Projeto criado por 
                <a href="#" class="underline decoration-2 hover:text-black transtion-all ease-in-out duration-75">Matvops</a>
            </h1>

            <p class="text-xl font-medium leading-[2rem] tracking-[.09rem] text-justify">Projeto desenvolvido com o objetivo de praticar e consolidar conhecimentos em 
                PHP, Blade, Laravel Fortify e TailwindCSS. Trata-se de uma aplicação web completa, com autenticação de usuários, interface e 
                recursos essenciais para um pequeno sistema de loja virtual. O projeto visa aplicar boas práticas de desenvolvimento e organização
                de código, explorando recursos nativos do Laravel e estilização moderna com Tailwind.
            </p>
        </main>

        <section class="w-[60%] mx-auto mt-24">
            <h2 class="text-center text-3xl font-semibold text-blue-900 mb-12">Contatos</h2>
            <div>
                <h3 class="text-2xl font-semibold uppercase">Linkedin: <a href="https://www.linkedin.com/in/matheus-cadenassi-799125321/" class="underline decoration-2 text-blue-600 font-light normal-case"> https://www.linkedin.com/in/matheus-cadenassi-799125321/</a></h3>
                <h3 class="text-2xl font-semibold uppercase">Email: <span class="font-light normal-case">matheusmartinscia30@gmail.com</span></h3>
            </div>
        </section>
    </x-slot:content>
</x-layouts.main_layout>