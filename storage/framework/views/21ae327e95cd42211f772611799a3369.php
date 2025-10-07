<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar lote</title>
</head>
<body>
    <h1>Editar lote</h1>
    <form action="<?php echo e(route('stocks.update', $stock->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        <label>Nome: </label>
        <input type="text" name="name" value="<?php echo e($stock->name); ?>">

        <label>Quantidade: </label>
        <input type="integer" name="amount" value="<?php echo e($stock->amount); ?>">

        <label>Categoria: </label>
        <input type="text" name="category" value="<?php echo e($stock->category); ?>">

        <label>Validade: </label>
        <input type="date" name="validity" value="<?php echo e($stock->validity); ?>">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/stocks/edit.blade.php ENDPATH**/ ?>