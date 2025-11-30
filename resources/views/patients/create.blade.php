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
                    <a href="{{ route('patients.index') }}" class="hover:underline" style="color: #4CAF50; font-weight: bold;">Pacientes</a>
                    <a href="{{ route('stocks.index') }}" class="hover:underline">Estoque</a>
                    <a href="{{ route('catalogs.index') }}" class="hover:underline">Catálogo</a>
                    <a href="{{ route('suppliers.index') }}" class="hover:underline">Fornecedores</a>
                </div>
            </div>
        </nav>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            
            <form action="{{route('patients.store')}}" method="POST" id="patient-form">
                @csrf
                
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-5xl font-serif" style="color: #4CAF50;">
                        Cadastrar novo paciente
                    </h1>
                    <button type="submit" 
                            class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                            style="background-color: #58A663;">
                        CADASTRAR
                    </button>
                </div>
                
                @if ($errors->any())
                    <div class="p-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                        <p>Houve um erro ao tentar cadastrar o paciente:</p>
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $erro)
                                <li>{{$erro}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="max-w-3xl mx-auto p-8 rounded-3xl shadow-lg" style="border: 2px solid #58A663; background-color: #FFECEF;">

                    
                    <div class="grid grid-cols-1 gap-y-6">

                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Nome completo:</label>
                            <input type="text" name="name" required value="{{ old('name') }}"
                                class="w-full py-3 px-4 rounded-xl border-none "
                                style="background-color: #FDE7EE; ">
                        </div>
                        
                        <div></div> 
                        
                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">CPF:</label>
                            <input type="text" name="cpf" required value="{{ old('cpf') }}" maxlength="14"
                                class="w-full py-3 px-4 rounded-xl border-none "
                                style="background-color: #FDE7EE; ">
                        </div>
                        
                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Email:</label>
                            <input type="email" name="email" required value="{{ old('email') }}"
                                class="w-full py-3 px-4 rounded-xl border-none "
                                style="background-color: #FDE7EE;">
                        </div>

                    </div>
                </div>
            </form>
            
        </div>
    </div>
</x-app-layout>

<script>
document.addEventListener('input', function(e) {
    if (e.target.name === 'cpf') {
        let v = e.target.value;

        v = v.replace(/\D/g, '');

        if (v.length > 3 && v.length <= 6)
            v = v.replace(/(\d{3})(\d+)/, "$1.$2");
        else if (v.length > 6 && v.length <= 9)
            v = v.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
        else if (v.length > 9)
            v = v.replace(/(\d{3})(\d{3})(\d{3})(\d+)/, "$1.$2.$3-$4");

        e.target.value = v;
    }
});
</script>