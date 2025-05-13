@if($type == "MAIN")
    <div class="bg-blue-900 px-4 py-3 w-[90%] mx-auto mt-18 mb-12 rounded shadow-gray-400 shadow-md">
        <p class="text-white font-semibold text-3xl">{{$text}}</p>
    </div>
@else
    <div class="bg-blue-300 px-4 py-3 w-[90%] mx-auto mt-24 mb-12 rounded shadow-gray-300 shadow-md">
        <p class="text-white font-semibold text-3xl">{{$text}}</p>
    </div>
@endif