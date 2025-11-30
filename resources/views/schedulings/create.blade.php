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
                    <a href="{{ route('catalogs.index') }}" class="hover:underline">Catálogo</a>
                    <a href="{{ route('suppliers.index') }}" class="hover:underline">Fornecedores</a>
                </div>
            </div>
        </nav>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
            
            <form action="{{route('schedulings.store')}}" method="POST" id="scheduling-form">
                @csrf
                
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-5xl font-serif" style="color: #4CAF50;">
                        Novo Agendamento
                    </h1>
                    <a href="{{route('home')}}"><button type="submit" 
                            class="py-2 px-6 rounded-lg text-white text-lg font-semibold transition duration-300 ease-in-out hover:opacity-90"
                            style="background-color: #58A663;">
                        Cadastrar Agendamento
                    </button></a>
                </div>
                
                @if ($errors->any())
                    <div class="p-4 mb-4 rounded-lg bg-red-100 text-red-700 font-medium">
                        <p>Houve um erro ao tentar criar o agendamento:</p>
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
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Nome do paciente:</label>
                            <input type="text" name="patient_name" required value="{{ old('patient_name') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>
                        
                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">CPF:</label>
                            <input type="text" name="patient_id" required value="{{ old('patient_id') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>
                        
                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Serviço:</label>
                            <select name="service" id="service" required
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                                <option value="">Selecione um procedimento</option>
                                @foreach ($catalog as $item)
                                    <option value="{{ $item->name }}" {{ old('service') == $item->name ? 'selected' : '' }}>
                                        {{ $item->name }} — R$ {{ number_format($item->price, 2, ',', '.') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Profissional:</label>
                            <select name="professional" id="professional" required
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                                <option value="">Selecione um profissional</option>
                                @foreach ($professionals as $p)
                                    <option value="{{ $p->name }}" {{ old('professional') == $p->name ? 'selected' : '' }}>
                                        {{ $p->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Data:</label>
                            <input type="text" name="date" id="date" required value="{{ old('date') }}"
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                        </div>

                        <div>
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Horário:</label>
                            <select name="time" id="time" required
                                class="w-full py-3 px-4 rounded-xl border-none shadow-inner text-lg transition duration-150"
                                style="background-color: #FDE7EE; color: #333333;">
                                @php
                                    $start = strtotime("08:00");
                                    $end = strtotime("18:00");
                                    while ($start <= $end) {
                                        // Ignora horário de almoço
                                        if ($start >= strtotime("11:00") && $start < strtotime("13:00")) {
                                            $start = strtotime("+1 hour", $start);
                                            continue;
                                        }
                                        $timeFormatted = date("H:i", $start) . "h";
                                        $selected = old('time') == $timeFormatted ? 'selected' : '';
                                        echo "<option value='$timeFormatted' $selected>$timeFormatted</option>";
                                        $start = strtotime("+1 hour", $start);
                                    }
                                @endphp
                            </select>
                        </div>
                        
                        <div class="col-span-2">
                            <label class="block text-xl font-serif mb-1" style="color: #F0A5B7;">Observações:</label>
                            <input type="text" name="notes" value="{{ old('notes') }}"
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
    // Máscara de Data (DD/MM/AAAA)
    document.getElementById('date').addEventListener('input', function(e) {
        let v = e.target.value.replace(/\D/g, ''); 
        if (v.length > 8) v = v.slice(0, 8); 

        if (v.length >= 5) {
            v = v.replace(/(\d{2})(\d{2})(\d+)/, '$1/$2/$3');
        } else if (v.length >= 3) {
            v = v.replace(/(\d{2})(\d+)/, '$1/$2');
        }

        e.target.value = v;
    });

    // Máscara de CPF (XXX.XXX.XXX-XX)
    document.addEventListener('input', function(e) {
        if (e.target.name === 'patient_id') {
            let v = e.target.value;

            v = v.replace(/\D/g, '');
            v = v.substring(0, 11); // Limita a 11 dígitos

            if (v.length > 9)
                v = v.replace(/(\d{3})(\d{3})(\d{3})(\d+)/, "$1.$2.$3-$4");
            else if (v.length > 6)
                v = v.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
            else if (v.length > 3)
                v = v.replace(/(\d{3})(\d+)/, "$1.$2");
            
            e.target.value = v;
        }
    });
</script>