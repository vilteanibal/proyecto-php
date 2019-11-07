<?php 
      // Iniciar sesión
  if(!isset($_SESSION)){
    session_start();
  }
?>


<!-- Barra Lateral -->
<aside id="siderbar">
  <?php if (isset($_SESSION['usuario'])) : ?>
    <div id="usuario-logueado" class="bloque">
      <h3> Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?> </h3>
      <!--    Agregamos algunos botones      -->
      <a href="cerrar.php" class="boton boton-verde"> Crear Entradas</a>
      <a href="cerrar.php" class="boton boton"> Crear Categorias</a>
      <a href="cerrar.php" class="boton boton-naranja"> Mis Datos</a>
      <a href="cerrar.php" class="boton boton-rojo"> Cerrar Sesion</a>
    </div>
  <?php endif; ?>

  <div id="login" class="bloque">
    <h3>Identificate</h3>

    <?php if (isset($_SESSION['error_login'])) : ?>
      <div class="alerta alerta-error">
        <?=$_SESSION['error_login']; ?>      
      </div>
    <?php endif; ?>
    
    
    <form action="login.php" method="POST">
      <label for="email">Email: </label>
      <input type="email" name="email" placeholder="Ingresa tu e-mail...">
      <label for="password">Contraseña: </label>
      <input type="password" name="password" placeholder="Ingresa tu Contraseña...">
      <input type="submit" name="Entrar" value="Entrar">
    </form>
  </div>

    <div id="register" class="bloque">

        <h3>Registrate</h3>

        <!-- Mostrar errores -->
        <?php if(isset($_SESSION['completado'])): ?>
            <div class="alerta alerta-exito">
                <?=$_SESSION['completado']?>
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['errores']['general']?>
            </div>
        <?php endif; ?>


        <form action="registro.php" method="POST">
            <label for="nombre">Nombre/s:</label>
            <input type="text" name="nombre" placeholder="Escribe tu/s Nombre/s...">
            <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ; ?>

            <label for="apellidos">Apellido/s: </label>
            <input type="text" name="apellidos" placeholder="Ingresa tu/s Apellido/s...">
            <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ; ?>
            
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Ingresa tu e-mail..." />
            <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ; ?>
            
            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Ingresa tu Contraseña...">
            <?php echo isset ($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '';?>

            <input type="submit" name="submit" value="Registrar">
        </form>
        <?php borrarErrores(); ?>
    </div>
</aside>