<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar fornecedor</title>
</head>
<body>
    <h1>Adicionar fornecedor</h1>
    <form action="{{route('suppliers.store')}}" method="POST">
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" required>

        <label>CNPJ: </label>
        <input type="string" name="cnpj" required>

        <label>Contato: </label>
        <input type="email" name="contact" required>

        <label>Produtos fornecidos: </label>
        <input type="string" name="products_supplied" required>

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>