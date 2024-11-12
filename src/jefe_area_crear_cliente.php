<?php
session_start();
include("conexion.php");
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
                    <a href="jefe_area_maxisacos_1.php" aria-label="dashboard"
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
                        <span class="-mr-1 font-medium">LISTA MAXISACOS</span>
                    </a>
                </li>
                <!--Dashboard Opcion Maxisacos-->
                <!--Dashboard Opcion Lista Completa-->
                <li>
                    <a href="jefe_area_listacompleta_1.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">LISTA
                            COMPLETA</span>
                    </a>
                </li>
                <!--Dashboard Opcion Lista Completa-->
                <!--Dashboard Opcion INFORMES-->
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
    </aside>

    <!-- Nav Bar-->
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
            <h1>CREAR CLIENTE</h1>
        </div>

        <form class="flex flex-col justify-center bg-gray-300 shadow-6xl p-12 mt-12 rounded-2xl w-auto h-auto" action
            method="post">

            <!--Button Volver-->

            <a href="jefe_area_maxisacos_1.php"
                class="flex items-center justify-center h-12 px-6 w-72 bg-indigo-900 hover:bg-indigo-800 mt-8 rounded-2xl font-semibold text-l text-blue-50">VOLVER</a>

            <!--Button Volver-->

            <!--Nom Cliente-->
            <div class="flex items-center justify-center mt-16 ml-60">
                <div class="bg-indigo-900 text-white font-mont font-semibold rounded-md px-14 py-2 text-center">
                    <p>Nombre Cliente</p>
                </div>
                <!--Caja Texto-->
                <div class="container mx-auto p-4">
                    <input required type="text" name="txtNcliente" placeholder="Inserte Nombre Cliente"
                        class="border rounded w-full py-1 px-5 max-w-xs">
                </div>
            </div>
            <!--Guardar-->
            <div class="flex justify-center mt-14">
                <td class="p-4">
                    <input type="submit" name="btnguardar" id="btnguardar" value="GUARDAR"
                        class="bg-indigo-900 text-white text-xl button font-semibold rounded-md ml-8 px-20 py-2 hover:bg-indigo-800 cursor-pointer">
                </td>
            </div>
        </form>


        <?php
        if (isset($_POST['btnguardar']) && $_POST['btnguardar'] == "GUARDAR") {
            $idcliente = $_POST['txtNcliente'];

            include("conexion.php");

            $sql = "INSERT INTO cliente (nombre_cliente) VALUES ('$idcliente')";

            if (mysqli_query($conexion, $sql)) {
                echo "<script>alert('Se han grabado los datos')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
        }
        ?>
</body>

</html>