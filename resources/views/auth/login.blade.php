<x-layouts.main_layout title="Login">
    <x-slot:content>
        <div class="w-[40%] bg-zinc-100 mx-auto mt-50 rounded shadow-zinc-200 shadow-md">
            <form action="{{ route('login.store') }}" method="POST" class="px-6 py-2">
                @csrf 

                <legend class="text-blue-900 text-4xl font-bold my-8">Login</legend>
                <fieldset>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-blue-900 text-2xl font-semibold">Email</label>
                        <input type="email" name="email" id="email" placeholder="Digite o email..." autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                        
                    </div>

                    <div class="mt-12 flex flex-col gap-2">
                        <label for="password" class="text-blue-900 text-2xl font-semibold">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite a senha..." autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                    </div>
                </fieldset>
                  
                <div class="flex my-12 items-center">
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('password.request') }}" class="text-blue-900 underline">Esqueci minha senha</a>
                        <a href="{{ route('register') }}" class="text-blue-900 underline">Registre-se</a>
                    </div>
                    <div class="ml-auto">
                        <x-form-button text="Login"/>
                    </div>
                </div>
            </form>
        </div>
    </x-slot:content>
</x-layouts.main_layout>