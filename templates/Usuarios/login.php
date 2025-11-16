<div class="usuarios form content" style="max-width: 450px; margin: 80px auto; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border-radius: 12px; background: white; border-top: 5px solid #006747;">
    
    <!-- Icono y título con colores Miró -->
    <div style="text-align: center; margin-bottom: 40px;">
        <div style="width: 80px; height: 80px; margin: 0 auto 20px; background: linear-gradient(135deg, #006747 0%, #4CAF50 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
            <i class="bi bi-person-circle" style="font-size: 48px; color: white;"></i>
        </div>
        <h3 style="margin: 0; color: #006747; font-weight: 700; font-size: 28px;">
            <?= __('Bienvenido') ?>
        </h3>
        <p style="color: #666; margin-top: 10px; font-size: 14px;">Ingresa tus credenciales para continuar</p>
    </div>
    
    <!-- Formulario -->
    <?= $this->Form->create(null, ['style' => 'margin: 0;']) ?>
    <fieldset style="border: none; padding: 0;">
        
        <div style="margin-bottom: 25px;">
            <?= $this->Form->control('email', [
                'label' => [
                    'text' => 'Correo electrónico',
                    'style' => 'display: block; margin-bottom: 8px; color: #2c3e50; font-weight: 500;'
                ],
                'type' => 'email',
                'required' => true,
                'placeholder' => 'tucorreo@ejemplo.com',
                'style' => 'width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;',
                'templates' => [
                    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
                ]
            ]) ?>
        </div>
        
        <div style="margin-bottom: 30px;">
            <?= $this->Form->control('password', [
                'label' => [
                    'text' => 'Contraseña',
                    'style' => 'display: block; margin-bottom: 8px; color: #2c3e50; font-weight: 500;'
                ],
                'type' => 'password',
                'required' => true,
                'placeholder' => '••••••••',
                'style' => 'width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;',
                'templates' => [
                    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
                ]
            ]) ?>
        </div>
        
    </fieldset>
    
    <!-- Botón de submit -->
    <?= $this->Form->button(__('Ingresar'), [
        'style' => 'width: 100%; padding: 14px; background: #27ae60; color: white; border: none; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.3s;',
        'onmouseover' => "this.style.background='#229954'",
        'onmouseout' => "this.style.background='#27ae60'"
    ]); ?>
    <?= $this->Form->end() ?>
    
    <!-- Enlaces adicionales -->
    <div style="text-align: center; margin-top: 25px; padding-top: 25px; border-top: 1px solid #eee;">
        <p style="color: #7f8c8d; margin: 0;">
            ¿No tienes cuenta? 
            <?= $this->Html->link('Regístrate aquí', ['action' => 'register'], [
                'style' => 'color: #3498db; text-decoration: none; font-weight: 500;'
            ]) ?>
        </p>
        <p style="color: #7f8c8d; margin-top: 10px;">
            <?= $this->Html->link('← Volver al inicio', ['controller' => 'Pages', 'action' => 'display', 'home'], [
                'style' => 'color: #95a5a6; text-decoration: none;'
            ]) ?>
        </p>
    </div>
    
</div>

<style>
    .input.email input:focus,
    .input.password input:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    }
</style>