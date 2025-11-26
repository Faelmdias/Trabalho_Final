<?php $__env->startSection('title', 'Detalhes do Produto'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <h2 style="margin-bottom: 20px;">Detalhes do Produto</h2>
    
    <?php if($produto->imagem): ?>
        <div style="margin-bottom: 20px;">
            <img src="<?php echo e(asset('storage/' . $produto->imagem)); ?>" alt="<?php echo e($produto->nome); ?>" style="max-width: 300px; border-radius: 8px;">
        </div>
    <?php endif; ?>

    <p><strong>Nome:</strong> <?php echo e($produto->nome); ?></p>
    <p><strong>Descrição:</strong> <?php echo e($produto->descricao ?? 'Sem descrição'); ?></p>
    <p><strong>Categoria:</strong> <?php echo e($produto->categoria->nome); ?></p>
    <p><strong>Preço:</strong> R$ <?php echo e(number_format($produto->preco, 2, ',', '.')); ?></p>
    <p><strong>Estoque:</strong> <?php echo e($produto->quantidade_estoque); ?> unidades</p>

    <div style="margin-top: 20px;">
        <a href="<?php echo e(route('produtos.edit', $produto)); ?>" class="btn">Editar</a>
        <a href="<?php echo e(route('produtos.index')); ?>" class="btn">Voltar</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /workspaces/Trabalho_Final/trabalho-final/resources/views/produtos/show.blade.php ENDPATH**/ ?>