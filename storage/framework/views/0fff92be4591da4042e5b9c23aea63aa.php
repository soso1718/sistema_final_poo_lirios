<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fornecedor</title>
</head>
<body>
    <h1>Editar fornecedor</h1>
    <form action="<?php echo e(route('suppliers.update', $supplier->id)); ?>" method="POST">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>

        <label>Nome: </label>
        <input type="text" name="name" value="<?php echo e($supplier->name); ?>">

        <label>CNPJ: </label>
        <input type="text" name="cnpj" value="<?php echo e($supplier->cnpj); ?>">

        <label>Contato: </label>
        <input type="email" name="contact" value="<?php echo e($supplier->contact); ?>">

        <label>Produtos oferecidos: </label>
        <input type="text" name="products_supplied" value="<?php echo e($supplier->products_supplied); ?>">

        <input type="submit" value="Atualizar">

    </form>
</body>
</html><?php /**PATH C:\laravel\sistema_final_poo_lirios\resources\views/suppliers/edit.blade.php ENDPATH**/ ?>