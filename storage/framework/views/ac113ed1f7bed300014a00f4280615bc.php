<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar paciente</title>
</head>
<body>
    <h1>Editar paciente</h1>
    <form action="<?php echo e(route('patients.update', $patient->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
    
        <label>Nome: </label>
        <input type="text" name="name" value="<?php echo e($patient->name); ?>">

        <label>CPF: </label>
        <input type="text" name="cpf" value="<?php echo e($patient->cpf); ?>">

        <label>E-mail: </label>
        <input type="text" name="email" value="<?php echo e($patient->email); ?>">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/patients/edit.blade.php ENDPATH**/ ?>