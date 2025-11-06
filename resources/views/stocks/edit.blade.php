<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar lote</title>
</head>
<body>
    <h1>Editar lote</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{route('stocks.update', $stock->id)}}" method="POST">
        @method('PUT')
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" value="{{$stock->name}}">

        <label>Quantidade: </label>
        <input type="integer" name="amount" value="{{$stock->amount}}">

        <label>Categoria: </label>
        <input type="text" name="category" value="{{$stock->category}}">

        <label>Validade: </label>
        <input type="date" name="validity" value="{{$stock->validity}}">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html>