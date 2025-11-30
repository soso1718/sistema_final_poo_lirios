<x-app-layout>
    <div class="min-h-screen bg-gray-100 pb-10">

        <nav class="flex items-center justify-between p-4" style="background-color: #FEEAF2;">
            <div class="flex items-center space-x-8">
                <div class="w-10 h-10 rounded-full border-4 overflow-hidden p-0.5" style="border-color: #4CAF50;">
                    <img src="{{ asset('images/lirio-logo.jpg') }}" alt="Logo Lírio" class="w-full h-full object-cover rounded-full" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <div class="flex space-x-8 text-xl font-serif" style="color: #F0A5B7;">
                    <a href="{{ route('home') }}" class="hover:underline">Home</a>
                    <a href="{{ route('professionals.index') }}" class="hover:underline">Profissionais</a>
                    <a href="{{ route('patients.index') }}" class="hover:underline">Pacientes</a>
                    <a href="{{ route('stocks.index') }}" class="hover:underline" style="color: #4CAF50; font-weight: bold;">Estoque</a>
                    <a href="{{ route('catalogs.index') }}" class="hover:underline">Catálogo</a>
                    <a href="{{ route('suppliers.index') }}" class="hover:underline">Fornecedores</a>
 
                </div>
            </div>
        </nav>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-5xl font-serif" style="color: #4CAF50;">
                    Estoque
                </h1>
                
                <a href="{{route('stocks.create')}}">
                    <button class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                            style="background-color: #58A663;">
                        Adicionar Lote
                    </button>
                </a>
            </div>
            
            @if(session('success'))
                <div class="p-3 mb-4 rounded-lg text-green-700 bg-green-100 font-medium">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="p-6 rounded-2xl shadow-lg" style="border: 2px solid #58A663; background-color: #FFECEF;">
                
                @forelse($stocks as $stock)
                    <div class="flex items-center justify-between p-4 mb-3 rounded-xl shadow-md" style="background-color: #FDE7EE; border: 1px solid #F0A5B7;">
                        
                        <h2 class="text-xl font-serif" style="color: #4CAF50;">
                            {{$stock->name}} 
                            <span class="text-base text-gray-600 font-normal ml-2">({{ $stock->amount }} unidades)</span>
                        </h2>
                        
                        <div>
                            <a href="{{route('stocks.show', $stock->id)}}">
                                <button class="py-1 px-4 rounded-lg text-white text-md font-semibold transition duration-300 ease-in-out hover:opacity-90"
                                        style="background-color: #58A663;">
                                    Mais detalhes
                                </button>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-xl font-serif p-4" style="color: #F0A5B7;">
                        Nenhum lote cadastrado. Clique em "Adicionar Lote" para começar.
                    </p>
                @endforelse
                
            </div>
            
        </div>
    </div>
</x-app-layout>