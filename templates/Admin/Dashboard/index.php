<?php
$this->Html->css('dashboard', ['block' => true]);
?>

<h1>Panel Administrativo</h1>
<p>Bienvenido al sistema de gestión</p>

<div class="dashboard-grid">

    <a href="/admin/productos" class="dashboard-card">
        <i class="bi bi-box-seam"></i>
        <h3>Productos</h3>
    </a>

    <a href="/admin/usuarios" class="dashboard-card">
        <i class="bi bi-people"></i>
        <h3>Usuarios</h3>
    </a>

    <a href="/admin/facturas" class="dashboard-card">
        <i class="bi bi-receipt"></i>
        <h3>Facturas</h3>
    </a>

</div>
