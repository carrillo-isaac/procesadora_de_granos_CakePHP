<?php
$title = 'Nuevo Usuario';
echo $this->element('admin/page-header', compact('title'));
?>

<style>
    .usuarios-form-wrapper {
        display: flex;
        justify-content: center;
        padding: 50px;
        background-color: #f4f7f6;
    }

    .usuario-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        width: 450px;
        border-top: 8px solid #2e4a2a;
    }

    .usuario-card h2 {
        color: #2e4a2a;
        text-align: center;
        margin-bottom: 30px;
    }

    .input label {
        font-weight: bold;
        color: #333;
        margin-top: 15px;
        display: block;
    }

    .input input,
    .input select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background: #2e4a2a;
        color: white;
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 5px;
        margin-top: 25px;
        cursor: pointer;
    }

    button:hover {
        background: #243d22;
    }
</style>

<div class="usuarios-form-wrapper">
    <div class="usuario-card">
        <h2>Nuevo Usuario</h2>

        <?= $this->Form->create($usuario) ?>

        <?= $this->Form->control('nombre', [
            'label' => 'Nombre',
            'placeholder' => 'Nombre completo'
        ]) ?>

        <?= $this->Form->control('email', [
            'label' => 'Correo',
            'placeholder' => 'correo@ejemplo.com'
        ]) ?>

        <?= $this->Form->control('password', [
            'label' => 'Contraseña'
        ]) ?>

        <?= $this->Form->control('rol', [
            'label' => 'Rol',
            'type' => 'select',
            'options' => [
                'cliente' => 'Cliente',
                'admin' => 'Admin'
            ]
        ]) ?>

        <?= $this->Form->button('Guardar Usuario') ?>

        <?= $this->Form->end() ?>
    </div>
</div>
