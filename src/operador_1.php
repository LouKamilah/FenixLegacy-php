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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<nav class="relative px-4 py-2 flex justify-between items-center bg-white font-mont font-semibold">
    <p class="font-mont font-extrabold text-black text-3xl ml-6 select-none">FENIX</p>
    <ul
        class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li>
            <div class=" relative mx-auto text-gray-600">
                <img class=" h-12 hidden sm:block select-none" src="/img/agrosuper-logo.png" alt>
            </div>
        </li>
    </ul>

    <div class=" lg:flex">
        <button class="cursor-auto py-1.5 px-3 m-1 text-center bg-black border rounded-md text-white select-none">
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

        <form class="bg-white shadow-6xl flex flex-col justify-center p-12 rounded-2xl w-auto h-auto" action=""
            method="POST">

            <h1 class="py-6 text-xl font-bold">Cargas</h1>

            <!--Search Bar-->

            <label for="text" class="mb-2 text-sm font-medium text-gray-900 sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="buscar" name="buscar"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 outline-none"
                    placeholder=" Buscar cliente"
                    value="<?php echo isset($_POST["buscar"]) ? $_POST["buscar"] : '' ?>" />
                <button type="submit" id="busqueda" name="Busqueda" value="Busqueda"
                    class="text-white absolute end-2.5 bottom-2.5 bg-black focus:outline-none font-medium rounded-lg text-sm px-4 py-2">Buscar</button>
            </div>


            <!--Tabla Start-->
            <div class="relative overflow-x-auto shadow-md mt-4 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">

                    <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N° Carga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cliente
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Sacos
                            </th>
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

                    <tbody>
                        <tr class="bg-white border-b text-center">
                            <th scope="row" class="px-6 py-6 font-medium text-gray-900 whitespace-nowrap">
                                <?= $numero_carga?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $nombre_cliente ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $cantidad_sacos ?>
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" onclick="openModal(<?= $id_carga ?>)"
                                    class="text-white bg-black font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none cursor-pointer">Escanear</button>
                            </td>
                        </tr>
                        <?php   
                            }
                        ?>
                    </tbody>
                </table>
            </div>

            <div>
                <a href="controlador/controlador_logout.php"
                    class="ml-36 mr-36 mt-5 py-1.5 px-3 m-1 -mb 4 cursor-pointer text-center bg-black border rounded-md text-white hover:text-gray-100 lg:block select-none">Cerrar
                    Sesión</a>
            </div>
        </form>
    </div>

    <!-- Modal para el escaneo -->
    <div id="scannerModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-5 rounded-lg relative w-full max-w-lg mx-auto">
            <button type="button" onclick="closeModal()" class="absolute top-2 right-2 text-gray-500"><svg
                    class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </button>
            <div class="text-center pt-2 pb-2 font-mont font-semibold text-xl" id="modalTitle"></div>
            <div id="camera" class="h-96"></div>
            <form id="scannerForm" action="operador_2.php" method="GET" class="flex flex-col items-center">
                <input type="hidden" name="id" id="modalId">
                <input type="text" name="idsaco" id="resultado" readonly
                    class="text-center border border-gray-950 outline-none">
                <input type="submit" value="Guardar"
                    class="bg-gray-900 rounded-xl text-white w-32 py-2 cursor-pointer font-semibold mt-4">
            </form>
        </div>
    </div>

    <!-- QuaggaJS -->
    <script src="quagga.min.js"></script>
    <script>
    function openModal(id) {
        document.getElementById("modalId").value = id;
        document.getElementById("modalTitle").innerText = "Carga = " + id;
        document.getElementById("scannerModal").classList.remove("hidden");
        startQuagga();
    }

    function closeModal() {
        document.getElementById("scannerModal").classList.add("hidden");
        stopQuagga();
    }

    function startQuagga() {
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera')
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function(data) {
            console.log(data);
            document.getElementById("resultado").value = data.codeResult.code;
        });
    }

    function stopQuagga() {
        Quagga.stop();
    }

    document.getElementById("scannerForm").addEventListener("submit", function(event) {
        if (document.getElementById("resultado").value === "") {
            event.preventDefault();
            alert("Por favor, escanee un código antes de guardar.");
        } else {
            closeModal();
        }
    });
    </script>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

</body>
<script src="js/page_operador.js"></script>

</html>