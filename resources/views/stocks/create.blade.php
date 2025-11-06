<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar lote</title>
</head>
<body>
    <h1>Adicionar lote</h1>
    
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{route('stocks.store')}}" method="POST">
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" required>

        <label>Quantidade: </label>
        <input type="integer" name="amount" required>

        <label>Categoria: </label>
        <input type="text" name="category" required>

        <label>Validade: </label>
        <input type="date" name="validity" required>

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>