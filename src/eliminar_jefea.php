<?php 
//error_reporting(0);
include("conexion.php");
session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
$id=$_GET["id"];
$sql=$conexion->query("SELECT jefe_area.id_jefeArea, jefe_area.nombre_jefeArea, jefe_area.apellido_jefeArea, login.usuario, login.contraseña, login.id_login FROM jefe_area, login WHERE (jefe_area.id_jefeArea = '$id') AND (jefe_area.id_login = login.id_login)");
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/estilos.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    <div class="flex items-center justify-between font-mont font-extrabold text-indigo-900 text-4xl ml-4">
        <h1 class="cursor-default select-none">ELIMINAR JEFE AREA</h1>
        <a href="administrador_index2.php" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont select-none font-bold px-10 py-2 text-lg rounded-xl mr-9">VOLVER</a>
    </div>

        <form method="post" class="mt-8 mx-auto ml-40 mr-40 rounded-2xl bg-gray-200 shadow-2xl shadow-indigo-300">

        <div class="grid grid-cols-2 gap-x-4 gap-y-10 pt-12 pb-8 ml-20 w-96 text-center text-white font-mont font-bold">
        <?php
            while ($datos = $sql->fetch_object()) {
            ?>
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">ID Jefe Area</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" type="text" name="txtID" readonly value="<?= $datos-> id_jefeArea ?>">

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Nombre Jefe Area</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" type="text" name="txtNom" readonly value="<?= $datos-> nombre_jefeArea ?>">

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Apellido Jefe Area</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" type="text" name="txtApe" readonly value="<?= $datos-> apellido_jefeArea ?>">

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">ID Login</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" type="text" name="txtIDL" readonly value="<?= $datos-> id_login ?>">

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Usuario</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" type="text" name="txtUsu" readonly value="<?= $datos-> usuario ?>">

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Contraseña</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" type="text" name="txtPass" readonly value="<?= $datos-> contraseña ?>">
            <?php }?>
        </div>
        <div class="text-center">
        <input type="submit" name="btnEliminar" value="Eliminar" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont font-bold px-28 py-2 mb-10 mt-4 text-lg rounded-xl cursor-pointer">
        </div>
        </form>
        <?php
            if (isset($_POST['btnEliminar']) && $_POST['btnEliminar'] == "Eliminar") {
            $IDJefe = $_POST['txtID'];
            $IDLogin = $_POST['txtIDL'];
             
            $insertarUno = $conexion->query("DELETE FROM jefe_area where id_jefeArea='$IDJefe'");
            if ($insertarUno==true) {

                $insertarDos = $conexion->query("DELETE FROM login where id_login='$IDLogin'");

                if ($insertarDos==true) {
                    echo "<script>Swal.fire({
                        title: 'Exito',
                        text: 'Se ha eliminado el Usuario exitosamente',
                        icon: 'success'
                      });</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
                }
            }
            
            }             
        ?>        
    </div>   
    </body>
</html>