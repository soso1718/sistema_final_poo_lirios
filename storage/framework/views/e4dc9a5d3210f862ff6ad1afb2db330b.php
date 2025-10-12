<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de profissionais</title>
</head>
<body>
    <h1>Listagem de profissionais</h1>
    <button><a href="<?php echo e(route('professionals.create')); ?>">Cadastrar um novo paciente</a></button>

     <?php if(session('success')): ?>
        <?php echo e(session('success')); ?>

    <?php endif; ?> <br>

    <?php $__currentLoopData = $professionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2>Nome: <?php echo e($professional->name); ?></h2>
    <button><a href="<?php echo e(route('professionals.edit', $professional->id)); ?>">Editar</a></button>
            <form action="<?php echo e(route('professionals.destroy', $professional->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse profissional?')">Excluir</button>
            </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/professionals/index.blade.php ENDPATH**/ ?>