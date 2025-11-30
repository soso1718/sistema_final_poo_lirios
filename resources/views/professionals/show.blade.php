<x-app-layout>
    <div class="min-h-screen bg-gray-100 pb-10">

        <nav class="flex items-center justify-between p-4" style="background-color: #FEEAF2;">
            <div class="flex items-center space-x-8">
                <div class="w-10 h-10 rounded-full border-4 overflow-hidden p-0.5" style="border-color: #4CAF50;">
                    <img src="{{ asset('images/lirio-logo.jpg') }}" alt="Logo Lírio" class="w-full h-full object-cover rounded-full" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <div class="flex space-x-8 text-xl font-serif" style="color: #F0A5B7;">
                    <a href="{{ route('home') }}" class="hover:underline">Home</a>
                    <a href="{{ route('professionals.index') }}" class="hover:underline" style="color: #4CAF50; font-weight: bold;">Profissionais</a>
                    <a href="{{ route('patients.index') }}" class="hover:underline">Pacientes</a>
                    <a href="{{ route('stocks.index') }}" class="hover:underline">Estoque</a>
                    <a href="{{ route('catalogs.index') }}" class="hover:underline">Catálogo</a>
                    <a href="{{ route('suppliers.index') }}" class="hover:underline">Fornecedores</a>
                </div>
            </div>
        </nav>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-5xl font-serif" style="color: #4CAF50;">
                    Informações do Profissional
                </h1>
                
                <div class="flex space-x-4">
                    
                    <a href="{{ route('professionals.index') }}">
                        <button class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                                style="background-color: #F0A5B7;">
                            Voltar
                        </button>
                    </a>
                    
                    <a href="{{ route('professionals.edit', $professional->id) }}">
                        <button class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                                style="background-color: #58A663;">
                            Editar
                        </button>
                    </a>
                    
                    <form action="{{ route('professionals.destroy', $professional->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Tem certeza que deseja excluir esse profissional?')"
                                class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                                style="background-color: #DC3545;">
                            Excluir
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="p-10 rounded-2xl shadow-lg" style="border: 2px solid #58A663; background-color: #FFECEF;">
                
                <div class="grid grid-cols-2 gap-x-12 gap-y-6">

                    <div class="bg-white p-4 rounded-xl shadow-md" style="background-color: #FAFAFA;">
                        <span class="block text-lg font-serif mb-1" style="color: #F0A5B7;">Nome:</span>
                        <p class="text-xl font-medium text-gray-800">{{$professional->name}}</p>
                    </div>

                    <div class="bg-white p-4 rounded-xl shadow-md" style="background-color: #FAFAFA;">
                        <span class="block text-lg font-serif mb-1" style="color: #F0A5B7;">Especialidade:</span>
                        <p class="text-xl font-medium text-gray-800">{{$professional->specialty}}</p>
                    </div>
                    
                    <div class="col-span-2 bg-white p-4 rounded-xl shadow-md" style="background-color: #FAFAFA;">
                        <span class="block text-lg font-serif mb-1" style="color: #F0A5B7;">Horários disponíveis:</span>
                        <p class="text-xl font-medium text-gray-800">{{$professional->available_times}}</p>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>