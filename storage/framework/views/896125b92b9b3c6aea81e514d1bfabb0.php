<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
</head>
<body>
    <h1>Editar paciente</h1>
    <form action="<?php echo e(route('professionals.update', $professional->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
    
        <label>Nome: </label>
        <input type="text" name="name" value="<?php echo e($professional->name); ?>">

        <label>Especialidade: </label>
        <input type="text" name="specialty" value="<?php echo e($professional->specialty); ?>">

        <label>Horários: </label>
        <input type="text" name="available_times" value="<?php echo e($professional->available_times); ?>">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/professionals/edit.blade.php ENDPATH**/ ?>