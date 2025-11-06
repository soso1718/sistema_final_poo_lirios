<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar fornecedor</title>
</head>
<body>
    <h1>Adicionar fornecedor</h1>

     @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

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

    <script>
        document.addEventListener('input', function (e) {
    if (e.target.name === 'cnpj') {
        let v = e.target.value.replace(/\D/g, '');

        if (v.length <= 2)
            v = v.replace(/(\d{1,2})/, '$1');
        else if (v.length <= 5)
            v = v.replace(/(\d{2})(\d+)/, '$1.$2');
        else if (v.length <= 8)
            v = v.replace(/(\d{2})(\d{3})(\d+)/, '$1.$2.$3');
        else if (v.length <= 12)
            v = v.replace(/(\d{2})(\d{3})(\d{3})(\d+)/, '$1.$2.$3/$4');
        else
            v = v.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d+)/, '$1.$2.$3/$4-$5');

        e.target.value = v;
    }
});
    </script>
</body>
</html>