<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>
<body>
    <h1>Estoque</h1>
    <button><a href="{{route('stocks.create')}}">Adicionar lote</a></button>

     @if(session('success'))
        {{ session('success') }}
    @endif <br>

    @foreach($stocks as $stock)
    <h2>Nome: {{$stock->name}}</h2>
    <button><a href="{{ route('stocks.edit', $stock->id) }}">Editar</a></button>
            <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse lote?')">Excluir</button>
            </form>
    @endforeach
</body>
</html>