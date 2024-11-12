<?php

session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
$id_carga_seleccionada = $_GET["id_carga"];
if (!isset($_POST['buscar'])) {
    $_POST['buscar'] = '';
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
                    <p class="font-mont font-extrabold text-indigo-900 text-4xl text-center">FENIX</p>
            </div>
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

            <ul class="space-y-2 tracking-wide mt-8">
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
                        <span class="group-hover:text-gray-700">LISTA MAXISACOS</span>
                    </a>
                </li>
                <li>
                    <a href="lista_completa_1.php" aria-label="dashboard"
                        class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-indigo-600 to-indigo-800">
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
        </div>

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
</aside>

<nav>
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
            <div class="px-6 flex items-center justify-between space-x-4 2xl:container">
                <h5 hidden class="text-2xl text-gray-600 font-medium lg:block">Jefe
                    de Área</h5>
                <div class="flex space-x-4">
                    <img class="h-10 w-auto" src="/img/agrosuper-logo.png" alt>
                </div>
            </div>
        </div>
    </div>
</nav>

    <div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="flex items-center justify-between font-mont font-extrabold text-indigo-900 text-4xl ml-4">
            <h1 class="cursor-default">LISTA SACOS</h1>
            <a href="lista_completa_1.php" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont font-bold px-10 py-2 text-lg rounded-xl mr-9">VOLVER</a>
        </div>

            <form method="POST" class="flex flex-col justify-center mt-4 py-6 px-12 rounded-xl ">

                <div class="flex items-center justify-center mt-2 mb-8">
                    <input
                        class="w-96 border-2 border-indigo-900 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none font-mont"
                        placeholder="Buscar por ID Saco" type="text" id="buscar" name="buscar"
                        value="<?php echo $_POST["buscar"] ?>">
                    <button class="bg-indigo-900 text-white font-bold px-4 py-2 ml-4 w-36 rounded-2xl" type="submit"
                        id="busqueda" name="Busqueda" value="Busqueda">Buscar</button>
                </div>

                <table class=" min-w-full border-collapse md:table" id="tblDatos">
                    <thead class="block md:table-header-group">
                        <tr class="bg-indigo-800 text-white font-bold h-10">
                            <th>ID Saco</th>
                            <th>Fecha Elaboración</th>
                            <th>Lote</th>
                            <th>Lote Nuevo</th>
                            <th>ID Carga</th>
                            <th></th>
                        </tr>
                    </thead>

                    <?php
                    include "conexion.php";
                    $filtro = "WHERE s.id_carga = '$id_carga_seleccionada'";
                    // Verifica si se ha enviado un valor de búsqueda
                    if (isset($_POST['Busqueda']) && $_POST['Busqueda'] == "Busqueda") {
                        if ($_POST["buscar"] == '') {

                        } else {
                            if ($_POST["buscar"] != '') {
                                $filtro = "WHERE s.id_carga = '$id_carga_seleccionada' AND s.id_saco = '" . $_POST["buscar"] . "'";

                            }
                        }
                    }
                    $sql = $conexion->query("SELECT s.id_saco, s.fecha_elaboracion, s.lote, s.lote_nuevo, s.id_carga FROM saco s $filtro");
                    while ($datos = $sql->fetch_object()) {
                        $fecha_mostrar = date("d-m-Y", strtotime($datos->fecha_elaboracion));
                        ?>
                        <tbody class="block md:table-row-group">
                            <tr
                                class="h-14 bg-gray-300 border border-grey-500 md:border-none block md:table-row text-center">
                                <td><?= $datos->id_saco ?></td>
                                <td><?= $fecha_mostrar ?></td>
                                <td><?= $datos->lote ?></td>
                                <td><?= $datos->lote_nuevo ?></td>
                                <td><?= $datos->id_carga ?></td>
                                <td>
                                    <div class="">
                                        <a href="lista_completa_2.php?id_carga=<?=$id_carga_seleccionada?>&id_saco=<?= $datos->id_saco ?>"
                                            class=" bg-indigo-800 hover:bg-indigo-900 text-white font-bold py-1 w-32 border px-7 border-indigo-900 rounded">Seleccionar</a>
                                    </div>
                                </td>
                                </td>
                            </tr>
                            <?php
                    }
                    ?>
                    </tbody>
                </table>
                <div id="paginador" class="flex items-center justify-center py-6 select-none"></div>
            </form>
        </div>
    </div>
</body>
<script src="js/page.js"></script>
</html>