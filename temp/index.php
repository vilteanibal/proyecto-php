<!DOCTYPE html>
<html lang="es_AR">
<head>
 	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="assets/css/mistyle.css">
 	<title>Blog de Videos Juegos</title>
</head>
<body>
	<!-- Cabecera -->
	<header id="cabecera">
		<!-- Logo-->
		<div id="logo">
			<a href="index.php">Blog de Video Juegos</a>
		</div>
	
		<!-- Menu -->
		<nav id="menu">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="http://">Catgoria1</a></li>
				<li><a href="http://">Catgoria2</a></li>
				<li><a href="http://">Catgoria3</a></li>
				<li><a href="sobremi.php">Sobre Mi</a></li>
				<li><a href="contacto.php">Contacto</a></li>
			</ul>
		</nav>
		<div class="clearfix"></div>
	</header>

	<div id="contenedor">
		<!-- Barra Lateral -->
		<aside id="siderbar">
			<div id="login" class="bloque">
				<h3>Identificate</h3>
				<form action="login.php" method="POST">
					<label for="email">Email: </label>
					<input type="email" name="email" placeholder="Ingresa tu e-mail...">
					<label for="password">Contraseña: </label>
					<input type="password" name="password" placeholder="Ingresa tu Contraseña...">
					<input type="submit" name="Entrar" value="Entrar">
				</form>
			</div>

			<div id="register" class="bloque">
				<form action="registro.php" method="POST">
					<h3>Registrate</h3>

					<label for="nombre">Nombre/s:</label>
					<input type="text" name="nombre" placeholder="Escribe tu/s Nombre/s...">

					<label for="apellidos">Apellido/s: </label>
					<input type="text" name="apellidos" placeholder="Ingresa tu/s Apellido/s...">

					<label for="email">Email: </label>
					<input type="email" name="email" placeholder="Ingresa tu e-mail..." />

					<label for="password">Contraseña</label>
					<input type="password" name="password" placeholder="Ingresa tu Contraseña...">

					<input type="submit" value="Registrar">
				</form>
			</div>
		</aside>
		<!-- Caja Principal -->
		<div id="principal">
			<h1>Ultimas Entradas</h1>
				<article class="entrada">
					<a href="">
					<h2>Titulo de mi Entrada </h2>
					<p>Descripcion</p>
					</a>
				</article>
				<article class="entrada">
					<a href="">
					<h2>Titulo de mi Entrada </h2>
					<p>Descripcion</p>
					</a>
				</article>
				<article class="entrada">
					<a href="">
					<h2>Titulo de mi Entrada </h2>
					<p>Descripcion</p>
					</a>
				</article>
				<article class="entrada">
					<a href="">
					<h2>Titulo de mi Entrada </h2>
					<p>Descripcion</p>
					</a>
				</article>
			<div id="ver-todas">
				<a href="">Ver todas las Entradas</a>
			</div>
		</div> <!--   Fin principal 	 -->
		
		<div class="clearfix"></div>
	</div>
	<!-- Pie de Pagina-->
	<footer id="pie">
		<p>Desarrollado por Vilte Anibal &copy; 2019</p>
	</footer>
</body>
</html> 