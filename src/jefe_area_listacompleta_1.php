<?php
session_start();
if (empty($_SESSION["id_login"])) {
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/estilos.css">
	<script src="https://cdn.tailwindcss.com"></script>

	<!--Font-->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
		rel="stylesheet">

	<!--Font-->

	<title>Jefe Área</title>
</head>

<body>

	<aside
		class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
		<div>
			<div class="-mx-6 px-6 py-4">
				<a href="#" title="home">
					<!--Logo Fenix-->
					<p class="font-mont font-extrabold text-indigo-900 text-4xl text-center">FENIX</p>
					<!--Logo Fenix-->
				</a>
			</div>
			<!--PIC and Name Admin-->
			<div class="mt-8 text-center">
				<img src="https://cdn1.iconfinder.com/data/icons/marketing-19/100/Profile-512.png" alt
					class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28">
				<h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block">
					<?php
					include "conexion.php";
					include "controlador/controlador_login.php";
					echo $_SESSION["nombre_jefe"] . " " . $_SESSION["apellido_jefe"];
					?>
				</h5>
				<span class="hidden text-gray-400 lg:block">Jefe de Área</span>
			</div>
			<!--PIC and Name Admin-->

			<!--Opciones Barra lateral-->

			<ul class="space-y-2 tracking-wide mt-8">

				<!--Dashboard Opcion Maxisacos-->
				<li>
					<a href="jefe_area_maxisacos_1.php"
						class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							<path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
								d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
								clip-rule="evenodd" />
							<path class="fill-current text-gray-600 group-hover:text-cyan-600"
								d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
						</svg>
						<span class="group-hover:text-gray-700">LISTA
							MAXISACOS</span>
					</a>
				</li>

				<!--Dashboard Opcion Maxisacos-->

				<!--Dashboard Opcion Lista Completa-->

				<li>
					<a href="jefe_area_listacompleta_1.php" aria-label="dashboard"
						class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r  from-indigo-600 to-indigo-800">
						<svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
							<path
								d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
								class="fill-current text-cyan-400 dark:fill-slate-600"></path>
							<path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
								class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
							<path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
								class="fill-current group-hover:text-sky-300"></path>
						</svg>
						<span class="-mr-1 font-medium">LISTA COMPLETA</span>
					</a>
				</li>

				<!--Dashboard Opcion Lista Completa-->

				<!--Dashboard Opcion Infomres-->

				<li>
					<a href="jefe_area_informes.php"
						class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							<path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
								d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
								clip-rule="evenodd" />
							<path class="fill-current text-gray-600 group-hover:text-cyan-600"
								d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
						</svg>
						<span class="group-hover:text-gray-700">INFORMES</span>
					</a>
				</li>
			</ul>

			<!--Opciones Barra lateral-->

		</div>

		<!--Logout-->

		<div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
			<button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
					stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
						d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
				</svg>
				<a href="controlador/controlador_logout.php" class="group-hover:text-gray-700">Cerrar Sesión</a>
			</button>
		</div>

		<!--Logout-->

		<!-- Nav Bar-->

	</aside>
	<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
		<div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
			<div class="px-6 flex items-center justify-between space-x-4 2xl:container">
				<h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Jefe
					de Área</h5>

				<!--Boton Abrir Barra lateral en pantallas pequeñas-->

				<button class="w-12 h-16 -mr-2 border-r lg:hidden">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 my-auto" fill="none" viewBox="0 0 24 24"
						stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>

				<!--Boton Abrir Barra lateral en pantallas pequeñas-->

				<!--Logo Agrosuper Nav Bar-->

				<div class="flex space-x-4">
					<img class="h-10 w-auto" src="/img/agrosuper-logo.png" alt>
				</div>

				<!--Logo Agrosuper Nav Bar-->

			</div>
		</div>
	</div>

	<div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
		<div class="font-mont font-extrabold text-indigo-900 text-4xl ml-4">
			<h1>LISTA COMPLETA</h1>
		</div>
		<div>

			<form method="POST" class="flex flex-col justify-center mt-4 py-6 px-12 rounded-xl ">

				<!--Search Bar-->

				<div class="flex items-center justify-center mt-2 mb-8">
					<input
						class="w-96 border-2 border-indigo-900 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none font-mont"
						type="text" name="buscar" id="buscar"
						value="<?php echo isset($_POST["buscar"]) ? $_POST["buscar"] : '' ?>"
						placeholder="Buscar Cliente">
					<button
						class="bg-indigo-800 hover:bg-indigo-900 text-white font-bold px-4 py-2 ml-4 w-36 rounded-2xl"
						type="submit" id="busqueda" name="busqueda">Buscar</button>
				</div>

				<!--Tabla-->
				<table class=" min-w-full border-collapse md:table">
					<thead class="block md:table-header-group">
						<tr class="bg-indigo-800 text-white font-bold h-10">
							<th>ID Carga</th>
							<th>N° Carga</th>
							<th>Cliente</th>
							<th>Sacos</th>
							<th></th>
							<th></th>
						</tr>
					</thead>

					<!--Funcionalidad Tabla-->
					<?php

					include "conexion.php";
					// Verifica si se ha enviado un valor de búsqueda
					if (isset($_POST["buscar"]) && !empty($_POST["buscar"])) {
						// Utiliza un filtro de búsqueda en la consulta
						$filtro = $_POST["buscar"];
						$sql = "SELECT c.numero_carga, c.id_carga, cl.nombre_cliente, c.cantidad_sacos_asignados FROM carga c INNER JOIN cliente cl ON c.id_cliente = cl.id_cliente WHERE cl.nombre_cliente LIKE '%$filtro%'";
					} else {
						// Consulta sin filtro de búsqueda
						$sql = "SELECT c.numero_carga, c.id_carga, cl.nombre_cliente, c.cantidad_sacos_asignados FROM carga c INNER JOIN cliente cl ON c.id_cliente = cl.id_cliente";
					}
					$result = mysqli_query($conexion, $sql);

					while ($mostrar = mysqli_fetch_array($result)) {

						?>


						<tbody class="block md:table-row-group">
							<tr
								class="h-14 bg-gray-300 border border-grey-500 md:border-none block md:table-row text-center">
								<td>
									<?php echo $mostrar['id_carga'] ?>
								</td>
								<td>
									<?php echo $mostrar['numero_carga'] ?>
								</td>
								<td>
									<?php echo $mostrar['nombre_cliente'] ?>
								</td>
								<td>
									<?php echo $mostrar['cantidad_sacos_asignados'] ?>
								</td>
								<td>
									<a href="lista_sacos.php?id_carga=<?php echo $mostrar['id_carga']; ?>"
										class=" bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-1 w-32 border px-7 border-indigo-900 rounded">Ver
										Sacos</a>

								</td>
								</td>
							</tr>
							<?php
					}
					?>


					</tbody>
				</table>
			</form>
		</div>
	</div>



</body>

</html>