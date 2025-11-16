<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar profissional</title>
</head>
<body>
    <h1>Editar profissional</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{route('professionals.update', $professional->id)}}" method="POST">
        @method('PUT')
        @csrf
    
        <label>Nome: </label>
        <input type="text" name="name" value="{{$professional->name}}">

        <label>Especialidade: </label>
        <input type="text" name="specialty" value="{{$professional->specialty}}">

        <label>Horários: </label>
        <input type="text" name="available_times" id="available_times" value="{{$professional->available_times}}">

        <input type="submit" value="Atualizar">

    </form>

   <script>
document.getElementById('available_times').addEventListener('input', function(e) {
    let v = e.target.value.replace(/\D/g, ''); 

    if (v.length > 8) v = v.slice(0, 8);

    let formatted = '';

    if (v.length >= 1) formatted = v.substring(0, 2);
    if (v.length >= 3) formatted += ':' + v.substring(2, 4);

    if (v.length >= 5) formatted += ' às ';

    if (v.length >= 5) formatted += v.substring(4, 6);
    if (v.length === 8) formatted += ':' + v.substring(6, 8);

    e.target.value = formatted;
});
</script>


</body>
</html>