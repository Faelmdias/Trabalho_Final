<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="card" style="max-width: 400px; margin: 50px auto;">
    <h2 style="margin-bottom: 20px;">Login</h2>
    
    <form method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
        </div>

        <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="senha" required>
        </div>

        <button type="submit" class="btn btn-success" style="width: 100%;">Entrar</button>
    </form>

    <p style="margin-top: 20px; text-align: center;">
        Não tem conta? <a href="<?php echo e(route('register')); ?>">Cadastre-se</a>
    </p>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /workspaces/Trabalho_Final/trabalho-final/resources/views/auth/login.blade.php ENDPATH**/ ?>