<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar paciente</title>
</head>
<body>
    <h1>Cadastrar novo paciente</h1>
    <form action="<?php echo e(route('patients.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <label>Nome: </label>
        <input type="text" name="name">

        <label>CPF: </label>
        <input type="text" name="cpf">

        <label>E-mail: </label>
        <input type="text" name="email">

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/patients/create.blade.php ENDPATH**/ ?>