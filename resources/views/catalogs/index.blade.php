<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
</head>
<body>
    <h1>Catálogo</h1>
    <button><a href="{{route('catalogs.create')}}">Cadastrar um novo procedimento</a></button>

     @if(session('success'))
        {{ session('success') }}
    @endif <br>

    @foreach($catalogs as $catalog)
    <h2>Nome: {{$catalog->name}}</h2>
    <button><a href="{{ route('catalogs.edit', $catalog->id) }}">Editar</a></button>
            <form action="{{ route('catalogs.destroy', $catalog->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse procedimento?')">Excluir</button>
            </form>
    @endforeach
</body>
</html>