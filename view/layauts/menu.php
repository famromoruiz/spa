<?php
use \route\Route;

	switch ($_SESSION['rol']) { case 10: ?>

		<li class="nav-item <?= Route::Active('site') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['site']) ?>">inicio<span class="sr-only"></span></a>
</li>

<li class="nav-item <?= Route::Active('clientes') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['clientes']) ?>">Clientes</a>
</li>

<li class="nav-item <?= Route::Active('usuarios') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['#']) ?>">Usuarios</a>
</li>

<li class="nav-item <?= Route::Active('almacen') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['#']) ?>">Almacen</a>
</li>


		
		<?php	break; ?>

		<?php	case 20; ?>
			<li class="nav-item <?= Route::Active('site') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['site']) ?>">Inicio<span class="sr-only"></span></a>
</li>
<li class="nav-item <?= Route::Active('sale') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['sale']) ?>">Ventas<span class="sr-only"></span></a>
</li>
	<li class="nav-item <?= Route::Active('citas') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['citas']) ?>">Citas<span class="sr-only"></span></a>
</li>
		<?php	break; ?>

		<?php	case 30; ?>

		<?php	break; ?>
		
		
<?php	} ?>

<li class="nav-item">
	<a class="nav-link" href="<?= Route::Ruta(['site', 'salir']) ?>">Salir (<?= $_SESSION['nombre'] ?>)</a>
</li>

	

