<x-layouts.main_layout title="ESQUECI A SENHA">
    <x-slot:content>

        <div class="w-[40%] bg-zinc-100 mx-auto mt-50 rounded shadow-zinc-200 shadow-md">
            <form action="{{ route('password.email') }}" method="POST" class="px-6 py-2">
                @csrf 

                <legend class="text-blue-900 text-4xl font-bold my-8">Digite o email de recuperação</legend>
                <fieldset>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-blue-900 text-2xl font-semibold">Email</label>
                        <input type="email" name="email" id="email" placeholder="Digite o email..." autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                    </div>
                </fieldset>
                  
                <div class="flex mt-8 items-center">
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('login') }}" class="text-blue-900 underline text-xl">Login</a>
                    </div>
                    <div class="ml-auto">
                        <x-form-button text="Enviar"/>
                    </div>
                </div>
            </form>
        </div>

    </x-slot:content>
</x-layouts.main_layout>