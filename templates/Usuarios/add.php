<<<<<<< HEAD
<style>
    
    .usuarios-form-wrapper {
        display: flex !important;
        justify-content: center !important;
        padding: 50px !important;
        background-color: #f4f7f6 !important;
    }
    .usuario-card {
        background: white !important;
        padding: 40px !important;
        border-radius: 15px !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
        width: 450px !important;
        border-top: 8px solid #2e4a2a !important; /* El verde de tu logo */
    }
    .usuario-card h2 { color: #2e4a2a; text-align: center; }
    .input label { font-weight: bold; color: #333; display: block; margin-top: 10px; }
    .input input, .input select { 
        width: 100%; 
        padding: 10px; 
        border: 1px solid #ccc; 
        border-radius: 5px; 
    }
    button {
        background: #2e4a2a !important;
        color: white !important;
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 5px;
        margin-top: 20px;
        cursor: pointer;
    }
</style>

<div class="usuarios-form-wrapper">
    <div class="usuario-card">
        <h2>Nuevo Usuario</h2>
        <div class="input"><label>Nombre</label><input type="text" placeholder="Nombre completo"></div>
        <div class="input"><label>Correo</label><input type="email" placeholder="correo@ejemplo.com"></div>
        <div class="input"><label>Contraseña</label><input type="password"></div>
        <div class="input">
            <label>Rol</label>
            <select><option>Cliente</option><option>Admin</option></select>
=======
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Usuario $usuario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Usuarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="usuarios form content">
            <?= $this->Form->create($usuario) ?>
            <fieldset>
                <legend><?= __('Add Usuario') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('password');
                    echo $this->Form->control('email');
                    echo $this->Form->control('rol');
                    echo $this->Form->control('creado_en');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
>>>>>>> a369773260269c4791bfdf972695e8436dcf92ac
        </div>
        <button>Guardar Usuario</button>
    </div>
</div>