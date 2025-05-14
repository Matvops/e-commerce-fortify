<li class="flex justify-around bg-zinc-100">

    <div class="w-[20%] max-w-[200px] min-w-[100px]">
        <img src="http://localhost/{{$product->product_image}}" alt="{{$product->product_image}}">
    </div>

    <div class="flex-1 px-12 pt-6">
        <h2 class="text-3xl font-bold mb-2">{{ $product->product_name }}</h2>
        <p class="text-2xl font-medium text-blue-900">R$ {{ $product->product_price }}</p>
    </div>

    <div class="pr-4 self-center">
        <form action="" method="POST">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1" stroke="white" class="size-24 fill-blue-900 cursor-pointer hover:fill-blue-400 transition-all duration-100 ease-in-out">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </form>
            
        
    </div>
<li>