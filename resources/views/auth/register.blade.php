<x-layouts.main_layout title="REgister">
    <x-slot:content>
        <div class="w-[40%] bg-zinc-100 mx-auto mt-35 rounded shadow-zinc-200 shadow-md">
            <form action="{{ route('register.store') }}" method="POST" class="px-6 py-2">
                @csrf 

                <legend class="text-blue-900 text-4xl font-bold my-8">Cadastro</legend>
                <fieldset class="flex flex-col gap-8">

                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-blue-900 text-2xl font-semibold">Nome</label>
                        <input type="name" name="name" id="name" placeholder="Digite o seu nome..." autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-blue-900 text-2xl font-semibold">Email</label>
                        <input type="email" name="email" id="email" placeholder="Digite o email..." autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-blue-900 text-2xl font-semibold">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite a senha..." min=6  autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password_confirmation" class="text-blue-900 text-2xl font-semibold">Confirme a senha</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme a senha..." min=6 autocomplete="off"
                            class="bg-white outline-none text-lg pl-2 py-1 text-gray-600 w-[80%] focus:pl-3 focus:text-black transition-all ease-in-out duration-150">
                    </div>

                </fieldset>
                  
                <div class="flex my-12 items-center">
                    
                    <a href="{{ route('login') }}" class="text-blue-900 underline">Já possuo uma conta</a>
                    
                    <div class="ml-auto">
                        <x-form-button text="Cadastrar"/>
                    </div>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0 p-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </x-slot:content>
</x-layouts.main_layout>
