<?php $__env->startSection('title', 'Produtos'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Lista de Produtos</h2>
        <a href="<?php echo e(route('produtos.create')); ?>" class="btn btn-success">Novo Produto</a>
    </div>

    <?php if($ultimaCategoria): ?>
        <p style="margin-bottom: 15px; color: #666;">
            Última categoria visualizada: <strong><?php echo e($ultimaCategoria); ?></strong>
        </p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($produto->id); ?></td>
                    <td><?php echo e($produto->nome); ?></td>
                    <td><?php echo e($produto->categoria->nome); ?></td>
                    <td>R$ <?php echo e(number_format($produto->preco, 2, ',', '.')); ?></td>
                    <td><?php echo e($produto->quantidade_estoque); ?></td>
                    <td>
                        <a href="<?php echo e(route('produtos.show', $produto)); ?>" class="btn" style="padding: 5px 10px;">Ver</a>
                        <a href="<?php echo e(route('produtos.edit', $produto)); ?>" class="btn" style="padding: 5px 10px;">Editar</a>
                        <form method="POST" action="<?php echo e(route('produtos.destroy', $produto)); ?>" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" style="padding: 5px 10px;" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Nenhum produto cadastrado</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        <?php echo e($produtos->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /workspaces/Trabalho_Final/trabalho-final/resources/views/produtos/index.blade.php ENDPATH**/ ?>