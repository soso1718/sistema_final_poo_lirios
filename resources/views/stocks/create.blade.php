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
            
            <form action="{{route('stocks.store')}}" method="POST" id="stock-create-form">
                @csrf
                
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-5xl font-serif" style="color: #4CAF50;">
                        Adicionar Novo Lote
                    </h1>
                    <button type="submit" 
                            class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                            style="background-color: #58A663;">
                        Cadastrar Lote
                    </button>
                </div>
                
                @if ($errors->any())
                    <div class="p-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                        <p>Houve um erro ao tentar cadastrar o lote:</p>
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $erro)
                                <li>{{$erro}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="p-10 rounded-2xl shadow-lg" style="border: 2px solid #58A663; background-color: #FFECEF;">
                    
                    <div class="grid grid-cols-2 gap-x-12 gap-y-6">

                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Nome do Produto:</label>
                            <input type="text" name="name" required value="{{ old('name') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>
                        
                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Quantidade:</label>
                            <input type="number" name="amount" required value="{{ old('amount') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>
                        
                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Categoria:</label>
                            <input type="text" name="category" required value="{{ old('category') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>

                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Validade (DD/MM/AAAA):</label>
                            <input type="text" name="validity" id="validity" required value="{{ old('validity') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>

                    </div>
                </div>
            </form>
            
        </div>
    </div>
</x-app-layout>

<script>
    // Máscara de Validade (DD/MM/AAAA)
    document.getElementById('validity').addEventListener('input', function(e) {
        let v = e.target.value.replace(/\D/g, ''); 

        if (v.length > 8) v = v.slice(0, 8); 

        if (v.length >= 5) {
            v = v.replace(/(\d{2})(\d{2})(\d+)/, '$1/$2/$3');
        } else if (v.length >= 3) {
            v = v.replace(/(\d{2})(\d+)/, '$1/$2');
        }

        e.target.value = v;
    });
</script>