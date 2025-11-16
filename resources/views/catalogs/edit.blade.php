<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar procedimento</title>
</head>
<body>
    <h1>Cadastrar novo procedimento</h1>

     @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $erro)
            <li>{{$erro}}</li>
        @endforeach
    </ul>
    @endif
    
    <form action="{{route('catalogs.update', $catalog->id)}}" method="POST">
        @method('PUT')
        @csrf

        <label>Nome: </label>
        <input type="text" name="name" value="{{$catalog->name}}"> 

        <label>Preço: </label>
        <input type="text" name="price" id="price" value="{{$catalog->price}}">

        <label>Descrição: </label>
        <input type="text" name="description" value="{{$catalog->description}}">

        <label>Tempo médio: </label>
        <input type="text" name="average_time" value="{{$catalog->average_time}}">
        
        <label>Materiais utilizados: </label>
        <input type="text" name="materials_used" value="{{$catalog->materials_used}}">
        
        <label>Contraindicações: </label>
        <input type="text" name="contraindications" value="{{$catalog->contraindications}}"> 

        <input type="submit" value="Editar">

    </form>

   <script>
    document.getElementById('price').addEventListener('input', function(e) {
        let v = e.target.value.replace(/\D/g, ''); 

        if (v.length === 0) {
            e.target.value = '';
            return;
        }

        v = (v / 100).toFixed(2);
        v = v.replace('.', ','); 

        v = v.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        e.target.value = v;
    });
</script>


</body>
</html>