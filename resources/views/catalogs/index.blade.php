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
                    <a href="{{ route('stocks.index') }}" class="hover:underline">Estoque</a>
                    <a href="{{ route('catalogs.index') }}" class="hover:underline" style="color: #4CAF50; font-weight: bold;">Catálogo</a>
                    <a href="{{ route('suppliers.index') }}" class="hover:underline">Fornecedores</a>
                </div>
            </div>
        </nav>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-5xl font-serif" style="color: #4CAF50;">
                    Catálogo de Procedimentos
                </h1>
                
                <a href="{{route('catalogs.create')}}">
                    <button class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                            style="background-color: #58A663;">
                        Cadastrar novo procedimento
                    </button>
                </a>
            </div>
            
            @if(session('success'))
                <div class="p-3 mb-4 rounded-lg text-green-700 bg-green-100 font-medium">
                    {{ session('success') }}
                </div>
            @endif
            
            <!-- <div class="p-6 rounded-2xl shadow-lg" style="border: 2px solid #58A663; background-color: #FFECEF;"> -->

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"> 

                    @foreach($catalogs as $catalog)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border-2 transition duration-200 ease-in-out hover:shadow-xl hover:border-[#4CAF50]"
                            style="border-color: #F0A5B7;">
                            
                            <div class="p-5 flex flex-col justify-between h-full" style="background-color: #FFECEF;">
                                
                                <h2 class="text-2xl font-serif mb-4 text-center" style="color: #4CAF50; min-height: 3rem;">
                                    {{$catalog->name}}
                                </h2>
                                
                                <div class="flex justify-center mt-4">
                                    <a href="{{route('catalogs.show', $catalog->id)}}">
                                        <button class="py-2 px-6 rounded-lg text-white text-md font-semibold transition duration-300 ease-in-out hover:opacity-90"
                                                style="background-color: #58A663;">
                                            Mais detalhes
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            <!-- </div> -->
            
        </div>
    </div>
</x-app-layout>