@if(session('success'))
    <div class="p-3 mb-4 rounded-lg text-green-700 bg-green-100 font-medium">
        {{ session('success') }}
    </div>
@endif 

<div> 
    
    @forelse($schedulings as $scheduling)
        <div class="flex items-center justify-between p-4 mb-3 rounded-xl shadow-md" style="background-color: #FDE7EE; border: 1px solid #F0A5B7;">
            
            <h2 class="text-xl font-serif" style="color: #4CAF50;">
                {{ $scheduling->patient_name }} - {{ \Carbon\Carbon::parse($scheduling->time)->format('H\h') }}
            </h2>
            
            <div>
                <a href="{{ route('schedulings.show', $scheduling->id) }}">
                    <button class="py-1 px-4 rounded-lg text-white text-md font-semibold transition duration-300 ease-in-out hover:opacity-90"
                            style="background-color: #58A663;">
                        Mais detalhes
                    </button>
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-xl font-serif p-4" style="color: #F0A5B7;">
            Nenhum agendamento encontrado para hoje. Clique em "AGENDAR" para começar.
        </p>
    @endforelse
    
</div>