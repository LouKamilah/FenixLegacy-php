<?php
include("conexion.php");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Administrador</title>
</head>

<body>

    <aside class="fixed pb-3 px-6 flex flex-col justify-between h-screen border-r bg-white md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
            <div>
                <div class="-mx-6 px-6 py-4">
                        <p class="font-mont font-extrabold text-indigo-900 text-4xl text-center cursor-default select-none">FENIX</p>
                </div>

                <div class="mt-8 text-center">
                    <img
                        src="https://cdn1.iconfinder.com/data/icons/marketing-19/100/Profile-512.png"
                        alt
                        class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28 select-none">
                    <span class="hidden text-gray-400 lg:block cursor-default select-none pt-4">Administrador</span>
                </div>

            <ul class="space-y-2 tracking-wide mt-8 select-none">

                <li>
                    <a href="administrador_index.php" aria-label="dashboard"
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                                class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                                class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                                class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">PANEL DE OPERADORES</span>
                    </a>
                </li>
                <li>
                    <a href="administrador_index2.php"
                    class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-indigo-600 to-indigo-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">PANEL JEFES AREA</span>
                    </a>
                </li>
            </ul>
            </div>

            <div
                class="px-6 -mx-6 pt-4 flex justify-between items-center border-t">
                <button
                    class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <a href="controlador/controlador_logout.php" class="group-hover:text-gray-700 select-none">Cerrar Sesión</a>
                </button>
            </div>
    </aside>

    <nav class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div
                    class="px-6 flex items-center justify-between space-x-4 2xl:container">
                    <h5 hidden
                        class="text-2xl text-gray-600 font-medium lg:block cursor-default select-none">Administrador</h5>

                    <div class="flex space-x-4">
                        <img class="h-10 w-auto select-none"
                            src="...\img/agrosuper-logo.png"
                            alt>
                    </div>
                </div>
            </div>
    </nav>

    <div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

        <div class="font-mont font-extrabold text-indigo-900 text-4xl ml-4">
            <h1 class="cursor-default select-none">REGISTRO JEFES AREA</h1>
        </div>

        <div class="flex flex-row justify-between mt-10">
            <div
            class="flex items-center justify-center h-10 w-80 ml-12 cursor-pointer select-none bg-indigo-800 rounded-2xl font-semibold text-xl text-blue-50 hover:bg-indigo-900">
                <a href="crear_jefea.php">Nuevo jefe Area</a>
            </div>
        </div>

        <form method="post" class="mt-0 py-6 px-12 rounded-xl">


            <div>
                <table class="mt-8 min-w-full border-collapse block md:table" id="tblDatos">
                    <thead class="block md:table-header-group">
                        <tr class="bg-indigo-800 text-white font-bold h-10">
                            <th class="">ID</th>
                            <th class="">Nombre</th>
                            <th class="">Apellido</th>
                            <th class="">ID Session</th>
                            <th class="">Usuario</th>
                            <th class="">Contraseña</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        <?php
                        $sql = $conexion->query("SELECT jefe_area.id_jefeArea, jefe_area.nombre_jefeArea, jefe_area.apellido_jefeArea, jefe_area.id_login, login.usuario, login.contraseña
                        FROM jefe_area,login
                        WHERE jefe_area.id_login = login.id_login ORDER BY jefe_area.id_jefeArea ASC");
                        while ($datos = $sql->fetch_object()) {
                         ?>
                            <tr class="h-14 bg-gray-300 border border-grey-500 md:border-none block md:table-row text-center">
                                <td><?= $datos->id_jefeArea ?></td>
                                <td><?= $datos->nombre_jefeArea ?></td>
                                <td><?= $datos->apellido_jefeArea ?></td>
                                <td><?= $datos->id_login ?></td>
                                <td><?= $datos->usuario ?></td>
                                <td><?= $datos->contraseña ?></td>
                                <td>
                                    <div class="flex flex-row space-x-4 justify-center">
                                        <button class=" bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-1 px-2 w-20 border border-indigo-900 rounded">
                                        <a href="editar_jefea.php?id=<?= $datos->id_jefeArea ?>">Editar</a>
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border w-20 border-red-500 rounded">
                                        <a href="eliminar_jefea.php?id=<?= $datos->id_jefeArea ?>">Eliminar</a></button>
                                    </div>
                                </td>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div id="paginador" class="flex items-center justify-center py-6 select-none"></div>
        </form>
    </div>
</body>
<script src="js/page.js"></script>

</html>