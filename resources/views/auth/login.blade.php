<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased h-screen overflow-hidden">

        <div class="flex h-screen bg-white">

            <div class="hidden lg:block lg:w-3/5 h-screen">
                <img src="{{ asset('images/lirios.jpg') }}" alt="Lírios decorativos" class="object-cover w-full h-full">
            </div>

            <div class="w-full lg:w-2/5 flex items-center justify-center p-8" style="background-color: #FEEAF2;">
                
                <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-xl" style="background-color: #FEEAF2;">

                    <div class="flex justify-center mb-6">
                       <div class="w-20 h-20 rounded-full border-4 shadow-md overflow-hidden p-1" 
                            style="border-color: #58A663; border-style: solid; background-color: #58A663;">
                            <img src="{{ asset('images/lirio-logo.jpg') }}" alt="Logo Lírio" class="w-full h-full object-cover rounded-full">
                       </div>
                    </div>

                    <h2 class="text-3xl font-serif text-center" style="color: #4CAF50; font-family: 'Times New Roman', Times, serif;">
                        Seja bem <br> vindo de volta!
                    </h2>

                    <p class="text-center mb-8 text-lg font-serif" style="color: #4CAF50; font-family: 'Times New Roman', Times, serif;">
                        A beleza começa pelo cuidado
                    </p>

                    <div class="p-6 rounded-xl shadow-inner" style="background-color: #FDE7EE; border: 2px solid #F0A5B7;">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-5">
                                <label for="email" class="block text-lg font-semibold mb-1" style="color: #495057;">
                                    Email:
                                </label>
                                <input id="email" class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm" 
                                       type="email" name="email" :value="old('email')" required autofocus 
                                       style="background-color: #FFFFFF; border: 1px solid #E0E0E0; transition: border-color 0.15s ease-in-out;">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mb-5">
                                <label for="password" class="block text-lg font-semibold mb-1" style="color: #495057;">
                                    Senha:
                                </label>
                                <input id="password" class="block w-full rounded-lg border-0 py-3 px-4 text-gray-900 shadow-sm"
                                       type="password" name="password" required autocomplete="current-password" 
                                       style="background-color: #FFFFFF; border: 1px solid #E0E0E0; transition: border-color 0.15s ease-in-out;">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button class="w-full py-3 rounded-xl text-white text-xl font-bold transition duration-300 ease-in-out hover:opacity-90"
                                        style="background-color: #58A663;">
                                    ENTRAR
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>