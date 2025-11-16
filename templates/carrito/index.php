<div class="carrito-container">
    <h2>🛒 Mi Carrito</h2>

    <?= $this->Flash->render() ?>

    <?php if (empty($productos)): ?>
        <p>Tu carrito está vacío.</p>
    <?php else: ?>
        <table class="carrito-table">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cant.</th>
                <th>Total</th>
                <th></th>
            </tr>

            <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?= h($p->nombre) ?></td>
                    <td>$<?= number_format($p->precio, 2) ?></td>
                    <td><?= $p->cantidad ?></td>
                    <td>$<?= number_format($p->subtotal, 2) ?></td>
                    <td>
                        <?= $this->Html->link("❌", ['action' => 'agregar', $p->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>$<?= number_format($totalGeneral, 2) ?></strong></td>
                <td></td>
            </tr>
        </table>

        <div class="pagar-container">
            <?= $this->Html->link('Vaciar carrito', ['action' => 'vaciar'], ['class' => 'btn btn-danger']) ?>
        </div>
    <?php endif; ?>
</div>
