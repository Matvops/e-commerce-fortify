<li class="bg-zinc-100 w-[400px] min-w-[200px] max-w-[35%] mb-6">
    <div>
        <img src="http://localhost/{{ $product->product_image }}" alt="{{$product->product_name}}">
    </div>

    <div class="px-4">
        <p class="text-lg font-medium mb-2">{{$product->product_name}}</p>
        <div class="flex justify-between items-center py-2">
            <p class="text-lg font-medium text-blue-900">R$ {{$product->product_price}}</p>
                <form action="{{ route('product-cart.add') }}" method="post">
                    @csrf

                    <input type="hidden" name="product_id" value="{{Crypt::encrypt($product->product_id)}}">

                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="blue" viewBox="0 0 24 24" strok-width="0.5" stroke="white"  class="size-14 cursor-pointer hover:fill-blue-200 transition-all ease-in-out duration-100">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </button>

                    @if(session('addProductMessage'))
                        <x-toast :status-="session('addProductStatus')" :message="session('addProductMessage')" />
                    @endif
                </form>
        </div>
    </div>
</li>