<?php $__env->startSection('title', 'Categorias'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Lista de Categorias</h2>
        <a href="<?php echo e(route('categorias.create')); ?>" class="btn btn-success">Nova Categoria</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Nº Produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($categoria->id); ?></td>
                    <td><?php echo e($categoria->nome); ?></td>
                    <td><?php echo e($categoria->descricao ?? '-'); ?></td>
                    <td><?php echo e($categoria->produtos_count); ?></td>
                    <td>
                        <a href="<?php echo e(route('categorias.edit', $categoria)); ?>" class="btn" style="padding: 5px 10px;">Editar</a>
                        <form method="POST" action="<?php echo e(route('categorias.destroy', $categoria)); ?>" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px;" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhuma categoria cadastrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?php echo e($categorias->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /workspaces/Trabalho_Final/trabalho-final/resources/views/categorias/index.blade.php ENDPATH**/ ?>