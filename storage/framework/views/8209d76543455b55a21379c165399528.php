<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar paciente</title>
</head>
<body>
    <h1>Cadastrar novo paciente</h1>
    <form action="<?php echo e(route('professionals.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label>Nome: </label>
        <input type="text" name="name" required> 

        <label>Especialidade: </label>
        <input type="text" name="specialty" required>

        <label>Horários: </label>
        <input type="text" name="available_times" required>

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/professionals/create.blade.php ENDPATH**/ ?>