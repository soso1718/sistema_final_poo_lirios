<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
</head>
<body>
    <h1>Editar paciente</h1>
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
</body>
</html>