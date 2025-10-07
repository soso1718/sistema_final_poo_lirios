<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de pacientes</title>
</head>
<body>
    <h1>Listagem de pacientes</h1>
    <button><a href="<?php echo e(route('patients.create')); ?>">Cadastrar um novo paciente</a></button>

    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2>Nome: <?php echo e($patient->name); ?></h2>
    <button><a href="<?php echo e(route('patients.edit', $patient->id)); ?>">Editar</a></button>
            <form action="<?php echo e(route('patients.destroy', $patient->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse paciente?')">Excluir</button>
            </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/patients/index.blade.php ENDPATH**/ ?>