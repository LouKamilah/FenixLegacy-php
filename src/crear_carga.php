<?php
session_start();
include ("conexion.php");
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!--Font-->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
            rel="stylesheet">

        <!--Font-->

        <title>Crear Carga</title>
    </head>
    <body>

    <aside
            class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen border-r bg-white transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
            <div>
                <div class="-mx-6 px-6 py-4">
                        <p class="font-mont font-extrabold text-indigo-900 text-4xl text-center cursor-default select-none">FENIX</p>
                </div>

                <div class="mt-8 text-center">
                    <img
                        src="https://cdn1.iconfinder.com/data/icons/marketing-19/100/Profile-512.png"
                        alt
                        class="w-10 h-10 m-auto rounded-full object-cover lg:w-28 lg:h-28 select-none">
                        <h5 class="hidden mt-4 text-xl font-semibold text-gray-600 lg:block cursor-default select-none">
                    <?php
                    include "conexion.php";
                    include "controlador/controlador_login.php";
                    echo $_SESSION["nombre_jefe"] . " " . $_SESSION["apellido_jefe"];
                    ?>
                </h5>
                    <span class="hidden text-gray-400 lg:block cursor-default select-none">Jefe de Área</span>
                </div>

            <ul class="space-y-2 tracking-wide mt-8 select-none">

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

                <li>
                    <a href="lista_completa_1.php"
                        class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-700">LISTA COMPLETA</span>
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

            <!--Logout-->

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

            <!--Logout-->

    </aside>

    <nav class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
            <div class="sticky z-10 top-0 h-16 border-b bg-white lg:py-2.5">
                <div
                    class="px-6 flex items-center justify-between space-x-4 2xl:container">
                    <h5 hidden
                        class="text-2xl text-gray-600 font-medium lg:block cursor-default select-none">Jefe
                        de Área</h5>

                    <div class="flex space-x-4">
                        <img class="h-10 w-auto select-none"
                            src="/img/agrosuper-logo.png"
                            alt>
                    </div>
                </div>
            </div>
    </nav>

    <div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">

        <div class="flex items-center justify-between font-mont font-extrabold text-indigo-900 text-4xl ml-4">
            <h1 class="cursor-default select-none">CREAR CARGA</h1>
            <a href="jefe_area_maxisacos_1.php" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont font-bold px-10 py-2 text-lg rounded-xl mr-9 select-none">VOLVER</a>
        </div>

        <form method="post" class="mt-8 mx-auto ml-40 mr-40 rounded-2xl bg-gray-200 shadow-2xl shadow-indigo-300">

        <div class="grid grid-cols-2 gap-x-4 gap-y-10 pt-12 pb-8 ml-20 w-96 text-center text-white font-mont font-bold">
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">N° Carga</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium select-none" oninput="this.value = this.value.replace(/[^0-9]/g, '')" type="text" placeholder="Inserte Numero Carga" required name="txtNumCarga">
            <?php
                date_default_timezone_set('America/Santiago');
                include("conexion.php");
                $sql="SELECT id_cliente, nombre_cliente From cliente";
                $result = mysqli_query($conexion,$sql);
            ?>
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Nombre Cliente</p>

            <select class="w-72 rounded-xl pl-2 text-black font-medium cursor-pointer outline-none select-none" name="cbx_cliente">
            <option value="0">Seleccione Cliente</option>
            <?php while($row = $result->fetch_assoc()) { ?>
            <option value="<?php echo $row['id_cliente']; ?>">
            <?php echo $row['nombre_cliente']; ?></option>
            <?php 
            } ?>
            </select>
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Cantidad de Sacos</p>
            <input type="text" class="w-72 rounded-xl text-black pl-4 font-medium select-none" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Inserte Cantidad de Sacos" name="txtcantSacos" required>

            <!-- Campo de Fecha No Editable -->
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Fecha de Elaboración</p>
            <input type="text" class="w-72 rounded-xl text-black pl-4 font-medium outline-none select-none" value="<?php echo date('d-m-Y'); ?>" readonly name="txtfecha">

        </div>
        <div class="text-center">
        <input type="submit" name="btncrear" value="Crear" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont font-bold px-28 py-2 mb-16 mt-8 text-lg rounded-xl cursor-pointer">
        </div>
        </form>
    </div>   

    <?php
        if (isset($_POST['btncrear']) && $_POST['btncrear'] == "Crear") {
        $ncarga = $_POST['txtNumCarga'];
        $sacos = $_POST['txtcantSacos'];
        $idcliente = $_POST['cbx_cliente'];

        $fecha = date('Y-m-d', strtotime($_POST['txtfecha']));

        if ($idcliente == 0) {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No has seleccionado Cliente',
            });</script>";
        } else {
            $sql = "INSERT INTO carga VALUES('null','$ncarga','$sacos','Asignado','En planta','$idcliente','1', '$fecha', 'Activo')";
            mysqli_query($conexion, $sql);
            echo "<script>Swal.fire({
                title: 'Exito',
                text: 'Se ha creado la carga exitosamente',
                icon: 'success'
                });</script>";
            }
        }
    ?>

    </body>
</html>