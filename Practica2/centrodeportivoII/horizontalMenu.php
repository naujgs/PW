<article id="horizontalMenu">
  <!-- code included -->
        <ul>
          <li><a href="./index.php">Inicio</a></li>
          <li><a href="./actividades.php">Actividades</a></li>
          <li><a href="./horario.php">Horario</a></li>
          <li><a href="./tecnicos.php">Tecnicos</a></li>
          <li><a href="./localizacion.php">Localización</a></li>
          <li><a href="./altausuario.php">Alta de usuarios</a></li>
          <li><a href="./foro.php">Foro</a></li>
          <?php if( !empty($_SESSION) ){ ?>
            <li><a href="./edit_my_info.php">Modifica tu info</a></li>
            <?php if ($_SESSION['rol'] != "cliente" ) { ?>
              <li><a href="./show_clients.php">Lista Clientes</a></li>
            <?php } ?>
          <?php } ?>
      </ul>
    </article>
