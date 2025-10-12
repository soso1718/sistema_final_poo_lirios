<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
</head>
<body>
    <h1>Catálogo</h1>
    <button><a href="<?php echo e(route('catalogs.create')); ?>">Cadastrar um novo procedimento</a></button>

     <?php if(session('success')): ?>
        <?php echo e(session('success')); ?>

    <?php endif; ?> <br>

    <?php $__currentLoopData = $catalogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catalog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2>Nome: <?php echo e($catalog->name); ?></h2>
    <button><a href="<?php echo e(route('catalogs.edit', $catalog->id)); ?>">Editar</a></button>
            <form action="<?php echo e(route('catalogs.destroy', $catalog->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse procedimento?')">Excluir</button>
            </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/catalogs/index.blade.php ENDPATH**/ ?>