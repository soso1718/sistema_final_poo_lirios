<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar paciente</title>
</head>
<body>
    <h1>Cadastrar novo paciente</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{route('patients.store')}}" method="POST">
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" required> 

        <label>CPF: </label>
        <input type="text" name="cpf" required>

        <label>E-mail: </label>
        <input type="email" name="email" required>

        <input type="submit" value="Cadastrar">

    </form>

    <script>
    document.addEventListener('input', function(e) {
    if (e.target.name === 'cpf') {
        let v = e.target.value;

        v = v.replace(/\D/g, '');

        
        if (v.length > 3 && v.length <= 6)
            v = v.replace(/(\d{3})(\d+)/, "$1.$2");
        else if (v.length > 6 && v.length <= 9)
            v = v.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
        else if (v.length > 9)
            v = v.replace(/(\d{3})(\d{3})(\d{3})(\d+)/, "$1.$2.$3-$4");

        e.target.value = v;
    }
});
    </script>
</body>
</html>