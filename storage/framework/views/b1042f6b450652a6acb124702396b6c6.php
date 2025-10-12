<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar procedimento</title>
</head>
<body>
    <h1>Cadastrar novo procedimento</h1>
    <form action="<?php echo e(route('catalogs.update', $catalog->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        <label>Nome: </label>
        <input type="text" name="name" value="<?php echo e($catalog->name); ?>"> 

        <label>Preço: </label>
        <input type="float" name="price" value="<?php echo e($catalog->price); ?>">

        <label>Descrição: </label>
        <input type="text" name="description" value="<?php echo e($catalog->description); ?>">

        <label>Tempo médio: </label>
        <input type="text" name="average_time" value="<?php echo e($catalog->average_time); ?>">
        
        <label>Materiais utilizados: </label>
        <input type="text" name="materials_used" value="<?php echo e($catalog->materials_used); ?>">
        
        <label>Contraindicações: </label>
        <input type="text" name="contraindications" value="<?php echo e($catalog->contraindications); ?>"> 

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/catalogs/edit.blade.php ENDPATH**/ ?>