<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fornecedores</title>
</head>
<body>
    <h1>Fornecedores</h1>
    <button><a href="{{route('suppliers.create')}}">Adicionar fornecedor</a></button>

     @if(session('success'))
        {{ session('success') }}
    @endif <br>

    @foreach($suppliers as $supplier)
    <h2>Nome: {{$supplier->name}}</h2>
    <button><a href="{{ route('suppliers.edit', $supplier->id) }}">Editar</a></button>
            <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse fornecedor?')">Excluir</button>
            </form>
    @endforeach
</body>
</html>