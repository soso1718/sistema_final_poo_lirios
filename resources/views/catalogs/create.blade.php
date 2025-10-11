<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar procedimento</title>
</head>
<body>
    <h1>Cadastrar novo procedimento</h1>
    <form action="{{route('catalogs.store')}}" method="POST">
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" required> 

        <label>Preço: </label>
        <input type="float" name="price" required>

        <label>Descrição: </label>
        <input type="text" name="description" required>

        <label>Tempo médio: </label>
        <input type="text" name="average_time" required>
        
        <label>Materiais utilizados: </label>
        <input type="text" name="materials_used" required>
        
        <label>Contraindicações: </label>
        <input type="text" name="contraindications" required> 

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>