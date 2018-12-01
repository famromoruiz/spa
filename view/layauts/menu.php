<?php
use \route\Route;

	switch ($_SESSION['rol']) { case 10: ?>

		<li class="nav-item <?= Route::Active('site') ?>">
	<a class="nav-link" href="<?= Route::Ruta(['site']) ?>">inicio<span class="sr-only"></span></a>
</li>

<li class="nav-item dropdown">
	 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catalogos
        </a>
         <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="<?= Route::Ruta(['clientes']) ?>">Clientes</a></li>
          <li><a href="#" class="dropdown-item">Usuarios</a></li>
          <li><a href="<?= Route::Ruta(['productos']) ?>" class="dropdown-item">Productos</a></li>
          <li><a href="#" class="dropdown-item">Servicios</a></li>
      </ul>
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

	

