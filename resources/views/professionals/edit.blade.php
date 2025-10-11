<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
</head>
<body>
    <h1>Editar paciente</h1>
    <form action="{{route('professionals.update', $professional->id)}}" method="POST">
        @method('PUT')
        @csrf
    
        <label>Nome: </label>
        <input type="text" name="name" value="{{$professional->name}}">

        <label>Especialidade: </label>
        <input type="text" name="specialty" value="{{$professional->specialty}}">

        <label>Horários: </label>
        <input type="text" name="available_times" value="{{$professional->available_times}}">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html>