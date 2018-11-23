<?php
use \route\Route;
?>
<li class="nav-item active">
	<a class="nav-link" href="<?= Route::Ruta(['site']) ?>">inicio<span class="sr-only"></span></a>
</li>

<li class="nav-item">
	<a class="nav-link" href="<?= Route::Ruta(['#']) ?>">Clientes</a>
</li>

<li class="nav-item">
	<a class="nav-link" href="<?= Route::Ruta(['#']) ?>">Usuarios</a>
</li>

<li class="nav-item">
	<a class="nav-link" href="<?= Route::Ruta(['#']) ?>">Almacen</a>
</li>

<li class="nav-item">
	<a class="nav-link" href="<?= Route::Ruta(['site', 'salir']) ?>">Salir (<?= $_SESSION['nombre'] ?>)</a>
</li>