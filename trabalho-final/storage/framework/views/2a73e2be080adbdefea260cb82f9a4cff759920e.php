<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Sistema de Gestão'); ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
        .navbar { background: #2c3e50; color: white; padding: 15px 0; margin-bottom: 30px; }
        .navbar .container { display: flex; justify-content: space-between; align-items: center; }
        .navbar h1 { font-size: 24px; }
        .navbar nav a { color: white; text-decoration: none; margin-left: 20px; }
        .navbar nav a:hover { text-decoration: underline; }
        .btn { padding: 10px 20px; background: #3498db; color: white; border: none; cursor: pointer; text-decoration: none; display: inline-block; border-radius: 4px; }
        .btn:hover { background: #2980b9; }
        .btn-danger { background: #e74c3c; }
        .btn-danger:hover { background: #c0392b; }
        .btn-success { background: #27ae60; }
        .btn-success:hover { background: #229954; }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        table { width: 100%; background: white; border-collapse: collapse; margin-top: 20px; }
        table th, table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background: #34495e; color: white; }
        table tr:hover { background: #f5f5f5; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 20px; }
        .logout-form { display: inline; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="container">
            <h1>Sistema de Gestão Agrícola</h1>
            <nav>
                <?php if(session('usuario_id')): ?>
                    <a href="<?php echo e(route('produtos.index')); ?>">Produtos</a>
                    <a href="<?php echo e(route('categorias.index')); ?>">Categorias</a>
                    <span style="margin-left: 20px;">Olá, <?php echo e(session('usuario_nome')); ?></span>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="logout-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger" style="margin-left: 10px;">Sair</button>
                    </form>
                <?php endif; ?>
            </nav>
        </div>
    </div>

    <div class="container">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert-error">
                <ul style="margin-left: 20px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH /workspaces/Trabalho_Final/trabalho-final/resources/views/layouts/app.blade.php ENDPATH**/ ?>