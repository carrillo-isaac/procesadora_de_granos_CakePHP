<div class="usuarios form content" style="max-width: 400px; margin: 50px auto; padding: 30px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px;">
    <h3 style="text-align: center; margin-bottom: 30px;">
        <i class="bi bi-person-circle" style="font-size: 48px; display: block; margin-bottom: 10px;"></i>
        <?= __('Iniciar Sesión') ?>
    </h3>
    
    <?= $this->Form->create() ?>
    <fieldset style="border: none;">
        <?= $this->Form->control('email', [
            'label' => 'Correo electrónico',
            'type' => 'email',
            'required' => true,
            'placeholder' => 'correo@ejemplo.com'
        ]) ?>
        <?= $this->Form->control('password', [
            'label' => 'Contraseña',
            'type' => 'password',
            'required' => true,
            'placeholder' => '••••••••'
        ]) ?>
    </fieldset>
    
    <?= $this->Form->button(__('Ingresar'), [
        'style' => 'width: 100%; margin-top: 20px;'
    ]); ?>
    <?= $this->Form->end() ?>
    
    <p style="text-align: center; margin-top: 20px;">
        ¿No tienes cuenta? 
        <?= $this->Html->link('Regístrate aquí', ['action' => 'register']) ?>
    </p>
</div>