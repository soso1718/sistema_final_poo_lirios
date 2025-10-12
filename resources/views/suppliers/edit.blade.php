<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fornecedor</title>
</head>
<body>
    <h1>Editar fornecedor</h1>
    <form action="{{route('suppliers.update', $supplier->id)}}" method="POST">
        @method('PUT')
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" value="{{$supplier->name}}">

        <label>CNPJ: </label>
        <input type="text" name="cnpj" value="{{$supplier->cnpj}}">

        <label>Contato: </label>
        <input type="email" name="contact" value="{{$supplier->contact}}">

        <label>Produtos oferecidos: </label>
        <input type="text" name="products_supplied" value="{{$supplier->products_supplied}}">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html>