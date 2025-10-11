<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de pacientes</title>
</head>
<body>
    <h1>Listagem de pacientes</h1>
    <button><a href="{{route('patients.create')}}">Cadastrar um novo paciente</a></button>

     @if(session('success'))
        {{ session('success') }}
    @endif <br>

    @foreach($patients as $patient)
    <h2>Nome: {{$patient->name}}</h2>
    <button><a href="{{ route('patients.edit', $patient->id) }}">Editar</a></button>
            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse paciente?')">Excluir</button>
            </form>
    @endforeach
</body>
</html>