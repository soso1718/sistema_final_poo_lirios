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
        <input type="text" name="validity" id="validity" required>

        <input type="submit" value="Cadastrar">

    </form>

    <script>
    document.getElementById('validity').addEventListener('input', function(e) {
        let v = e.target.value.replace(/\D/g, ''); // remove tudo que não for número

        if (v.length > 8) v = v.slice(0, 8); // limita a 8 dígitos

        if (v.length >= 5) {
            v = v.replace(/(\d{2})(\d{2})(\d+)/, '$1/$2/$3');
        } else if (v.length >= 3) {
            v = v.replace(/(\d{2})(\d+)/, '$1/$2');
        }

        e.target.value = v;
    });
</script>


</body>
</html>