<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>
<body>
    <h1>Estoque</h1>
    <button><a href="<?php echo e(route('stocks.create')); ?>">Adicionar lote</a></button>

     <?php if(session('success')): ?>
        <?php echo e(session('success')); ?>

    <?php endif; ?> <br>

    <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <h2>Nome: <?php echo e($stock->name); ?></h2>
    <button><a href="<?php echo e(route('stocks.edit', $stock->id)); ?>">Editar</a></button>
            <form action="<?php echo e(route('stocks.destroy', $stock->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esse paciente?')">Excluir</button>
            </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/stocks/index.blade.php ENDPATH**/ ?>