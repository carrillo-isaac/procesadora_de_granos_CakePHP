<div class="login-container">
    <h2>Iniciar sesión</h2>

    <?= $this->Flash->render() ?>

    <form method="post" action="/login" class="login-form">
        <div class="form-group">
            <label>Correo electrónico</label>
            <input type="email" name="correo" required>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="contrasena" required>
        </div>

        <button class="btn-primary">Ingresar</button>
    </form>
</div>
