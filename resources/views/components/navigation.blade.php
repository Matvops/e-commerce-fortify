<ul class="flex gap-16">
    @if($currentPage == "home")
        <li class="text-blue-900 text-3xl font-medium border-b-3 border-blue-800 py-6"><a href="#">Produtos</a></li>
    @else 
        <li class="text-white text-3xl font-medium my-6 hover:text-blue-900 transition-all ease-in-out duration-100"><a href="{{ route('home') }}">Produtos</a></li>
    @endif

    @auth
        @if($currentPage == "account")
            <li class="text-blue-900 text-3xl font-medium border-b-3 border-blue-800 py-6"><a href="#">Conta</a></li>
        @else 
            <li class="text-white text-3xl font-semibold my-6 hover:text-blue-900 transition-all ease-in-out duration-100"><a href="#">Conta</a></li>
        @endif
    @endauth

    @if($currentPage == "about")
        <li class="text-blue-900 text-3xl font-medium border-b-3 border-blue-800 py-6"><a href="#">Sobre</a></li>
    @else 
        <li class="text-white text-3xl font-medium my-6 hover:text-blue-900 transition-all ease-in-out duration-100"><a href="{{ route('about') }}">Sobre</a></li>
    @endif
</ul>