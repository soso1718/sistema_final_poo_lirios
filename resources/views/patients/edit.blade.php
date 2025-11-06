<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
</head>
<body>
    <h1>Editar paciente</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{route('patients.update', $patient->id)}}" method="POST">
        @method('PUT')
        @csrf
    
        <label>Nome: </label>
        <input type="text" name="name" value="{{$patient->name}}">

        <label>CPF: </label>
        <input type="text" name="cpf" value="{{$patient->cpf}}">

        <label>E-mail: </label>
        <input type="text" name="email" value="{{$patient->email}}">

        <input type="submit" value="Atualizar">

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