<?php use \route\Route;

	switch ($_SESSION['rol']) { case 10: ?>

		<li class="nav-item <?= Route::Active("site") ?>">
			<a class="nav-link" href="<?= Route::Ruta(["site"]) ?>">inicio<span class="sr-only"></span></a>
		</li>

		<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Catalogos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item <?= Route::Active("clientes") ?>" href="<?= Route::Ruta(["clientes"]) ?>">Clientes</a>
          <a class="dropdown-item <?= Route::Active("habitaciones") ?>" href="<?= Route::Ruta(["habitaciones"]) ?>">habitaciones</a>
          <a class="dropdown-item <?= Route::Active("productos") ?>" href="<?= Route::Ruta(["productos"]) ?>">Productos</a>
          <a class="dropdown-item <?= Route::Active("servicios") ?>" href="<?= Route::Ruta(["servicios"]) ?>">Servicios</a>
          <a class="dropdown-item <?= Route::Active("usuarios") ?>" href="<?= Route::Ruta(["usuarios"]) ?>">Usuarios</a>
          
          <a class="dropdown-item <?= Route::Active("zonas") ?>" href="<?= Route::Ruta(["zonas"]) ?>">zonas</a>
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>

      <li class="nav-item <?= Route::Active("almacen") ?>">
		<a class="nav-link" href="<?= Route::Ruta(["almacen"]) ?>">Almacen</a>
	 </li>

		<?php	break; ?>

		<?php	case 20: ?>
	 <li class="nav-item <?= Route::Active("site") ?>">
		<a class="nav-link" href="<?= Route::Ruta(["site"]) ?>">Inicio<span class="sr-only"></span></a>
	</li>

		<?php	break; ?>

		<?php	case 30: ?>

		<?php	break; ?>
		
		
<?php }?>
<li class="nav-item">
	<a class="nav-link" href="<?= Route::Ruta(["site", "salir"]) ?>">Salir (<?= $_SESSION["nombre"] ?>)</a>
</li>