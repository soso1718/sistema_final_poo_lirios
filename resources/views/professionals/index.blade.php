<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de profissionais</title>
</head>
<body>
    <h1>Listagem de profissionais</h1>
    <button><a href="{{route('professionals.create')}}">Cadastrar um novo paciente</a></button>

     @if(session('success'))
        {{ session('success') }}
    @endif <br>

    @foreach($professionals as $professional)
    <h2>Nome: {{$professional->name}}</h2>
    <button><a href="{{ route('professionals.edit', $professional->id) }}">Editar</a></button>
            <form action="{{ route('professionals.destroy', $professional->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse profissional?')">Excluir</button>
            </form>
    @endforeach
</body>
</html>