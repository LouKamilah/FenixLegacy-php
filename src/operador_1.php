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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<nav class="relative px-4 py-2 flex justify-between items-center bg-white font-mont font-semibold">
        <p class="font-mont font-extrabold text-indigo-900 text-3xl ml-6 select-none">FENIX</p>
        <ul class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
            <li>
                <div class=" relative mx-auto text-gray-600">
                    <img class=" h-12 hidden sm:block select-none" src="/img/agrosuper-logo.png" alt>
                </div>
            </li>
        </ul>

        <div class=" lg:flex">
            <button class="cursor-auto py-1.5 px-3 m-1 text-center bg-indigo-900 border rounded-md text-white select-none">
                <?php
                include "conexion.php";
                include "controlador/controlador_login.php";
                echo $_SESSION["nombre_operador"] . " " . $_SESSION["apellido_operador"] . " - " . $_SESSION["nombre_turno"];
                ?>
            </button>
        </div>
</nav>

<body>
    <title>Operador</title>
    <div class="flex flex-col items-center justify-center">

        <form class="bg-white shadow-6xl shadow-indigo-400/100 flex flex-col justify-center p-12 rounded-2xl w-auto h-auto" action="" method="POST">

    <!--Search Bar-->
    <div class="flex items-center justify-center mt-2 mb-8">
        <input class="w-96 border-2 border-indigo-900 h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none font-mont select-none" placeholder="Buscar por Nombre Cliente" type="text" id="buscar" name="buscar" value="<?php echo isset($_POST["buscar"]) ? $_POST["buscar"] : '' ?>">
        <button class="bg-indigo-900 text-white font-bold px-4 py-2 ml-4 w-36 rounded-2xl select-none" type="submit" id="busqueda" name="Busqueda" value="Busqueda">Buscar</button>
    </div>
    <!--Search Bar-->

            <div class="flex items-center justify-center">
                <div class="overflow-auto lg:overflow-visible">
                    <table class="text-center table text-white font-mont border-separate space-y-6 text-sm mt-4" id="tblDatos">
                        <thead class="bg-indigo-900 text-white font-mont select-none">
                            <tr>
                                <th class="p-4 text-center">N° Carga</th>
                                <th class="p-4 text-center">Cliente</th>
                                <th class="p-4 text-center">Sacos</th>
                                <th class="p-4 "></th>
                                <th class="p-4 "></th>
                            </tr>
                        </thead>
                        <?php
                        include "conexion.php";
                        $filtro = isset($_POST['buscar']) ? $_POST['buscar'] : '';
                        $sql = $conexion->prepare("SELECT carga.id_carga, carga.numero_carga, cliente.nombre_cliente, carga.cantidad_sacos_asignados FROM carga INNER JOIN cliente ON carga.id_cliente = cliente.id_cliente WHERE carga.estado = 'En planta' AND cliente.nombre_cliente LIKE ? AND carga.estado_carga = 'Activo' ORDER BY carga.numero_carga ASC");
                        
                        $filtro = "%$filtro%";
                        $sql->bind_param("s", $filtro);
                        $sql->execute();
                        
                        $sql->bind_result($id_carga, $numero_carga, $nombre_cliente, $cantidad_sacos);

                        while ($sql->fetch()) { ?>


                        <tbody class="text-black font-semibold select-none">
                            <tr class="bg-gray-300">

                                <td class="p-4">
                                    <div class>
                                        <div class="ml-4">
                                            <p><?= $numero_carga?></p>
                                        </div>
                                </td>
                                <td class="p-4 text-center"><?= $nombre_cliente ?></td>
                                <td class="p-4 font-bold"><?= $cantidad_sacos ?></td>

                                <td class="p-4">
                                    <a href="operador_2.php?id=<?= $id_carga ?>&idsaco=" class="bg-indigo-900 text-white hover:bg-indigo-800 font-mont font-semibold rounded-md ml-8 px-14 py-2 select-none">Seleccionar</a>
                                </td>
                                <td>
                                </td>
                            </tr>
                        <?php   
                            }
                        ?>
                        </tbody>
                        <style>
        .table {
            border-spacing: 0 15px;
        }
        tr td:nth-child(n+5),
        tr th:nth-child(n+5) {
            border-radius: 0 .625rem .625rem 0;
        }

        tr td:nth-child(1),
        tr th:nth-child(1) {
            border-radius: .625rem 0 0 .625rem;
        }
    </style>
                    </table>
                </div>
            </div>
            <div id="paginador" class="flex items-center justify-center py-6 select-none"></div>

            <div>
                <a href="controlador/controlador_logout.php" class="ml-36 mr-36 mt-5 py-1.5 px-3 m-1 -mb 4 cursor-pointer text-center bg-indigo-900 border rounded-md text-white hover:bg-indigo-800 hover:text-gray-100 lg:block select-none">Cerrar Sesión</a>
            </div>
        </form>
    </div>
</body>
<script src="js/page_operador.js"></script>
</html>