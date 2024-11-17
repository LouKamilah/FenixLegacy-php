<?php
session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
include "conexion.php";

$id = isset($_GET["id"]) ? $_GET["id"] : '';
$codsaco = isset($_GET["idsaco"]) ? $_GET["idsaco"] : '';

$sqlLogin = "select * from operador where $_SESSION[id_login] = id_login";
$rs = mysqli_query($conexion, $sqlLogin);
if ($row = mysqli_fetch_array($rs)) {
    $_SESSION['idOp'] = $row[0];
}

if ($codsaco == "") {
    $vanum = "";
    $valote = "";
    $valotenuevo = "";
    $vahumedad = "";
    $vatemp = "";
    $vafelab = "";
    $vakilos = "";
    $vaproteina = "";
} else {
    $rs = mysqli_query($conexion, "select * from tablaexternasacos where numeroSaco='$codsaco'");
    if ($row = mysqli_fetch_array($rs)) {
        $vanum = $row[0];
        $valote = $row[1];
        $valotenuevo = $row[2];
        $vahumedad = $row[3];
        $vatemp = $row[4];
        $vafelab = $row[5];
        $vakilos = $row[6];
        $vaproteina = $row[7];
    }
}

$sql = $conexion->query("SELECT carga.id_carga As idcarga, carga.numero_carga As ncarga, cliente.nombre_cliente As cliente, carga.cantidad_sacos_asignados As cantsacos FROM carga, cliente WHERE (carga.id_cliente = cliente.id_cliente) AND (carga.id_carga = '$id')");
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Operador</title>
</head>

<nav class="relative px-4 py-2 flex justify-between items-center bg-white font-mont font-semibold">
    <p class="font-mont font-extrabold text-black text-3xl ml-6 select-none">FENIX</p>
    <ul
        class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li>
            <div class=" relative mx-auto text-gray-600">
                <img class="h-12 hidden sm:block select-none" src="/img/agrosuper-logo.png" alt>
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

    <div class="flex flex-col items-center justify-center">
        <form class="bg-white shadow-6xl p-12 rounded-2xl w-auto h-auto" action="" method="POST" id="formsaco">
            <?php 
            while ($datos = $sql->fetch_object()) {?>
            <div class="pt-7 text-md text-center font-mont font-bold text-indigo-900 select-none">
                <span
                    class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded"><?php echo "Carga n° ". $datos-> ncarga . " > " . $datos-> cliente; ?></span>
            </div>


            <?php
            $sqlCantSacos = "select count(*) from saco where id_carga = '$id'";
            $rs=mysqli_query($conexion,$sqlCantSacos);
            if ($row=mysqli_fetch_array($rs)) {
                $Registros= $row[0];

                $sqlSacosAsignados = "SELECT carga.cantidad_sacos_asignados FROM carga WHERE id_carga='$id'";
                $rs=mysqli_query($conexion,$sqlSacosAsignados);
                if ($row=mysqli_fetch_array($rs)) {
                    $Asigados= $row[0];

                    $cantidadSacosRestantes=$Asigados - $Registros;
                }
            } 
            ?>

            <br>

            <div class="bg-black text-white font-semibold w-60 rounded-2xl py-2 mx-auto">
                <input class="bg-black text-center ml-5 cursor-default outline-none" type="text" name="registro"
                    value="<?php echo $cantidadSacosRestantes ?>" readonly>
                <p class="text-center cursor-default select-none">Cantidad Sacos Restantes</p>
            </div>

            <br>

            <div class="flex flex-col justify-center">

                <label class="block mb-2 text-sm font-medium text-gray-900">Operador responsable</label>
                <p class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">
                    <?php
                include "conexion.php";
                include "controlador/controlador_login.php";
                echo $_SESSION["nombre_operador"] . " " . $_SESSION["apellido_operador"] . " - " . $_SESSION["nombre_turno"];
                ?>
                </p>
            </div>


            <?php }?>


            <div class=" flex flex-col justify-center mt-2">

                <label for="n_saco" class="block mb-2 text-sm font-medium text-gray-900">N° Saco</label>
                <input type="text" id="n_saco" name="txtn_saco" value="<?php echo $vanum ?>" readonly required
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">

            </div>

            <div class="flex flex-col justify-center mt-2">

                <label for="lote" class="block mb-2 text-sm font-medium text-gray-900">Lote</label>
                <input name="txtlote" id="lote" value="<?php echo $valote ?>" type="text" size="30" required readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">

            </div>

            <div class="flex flex-col justify-center mt-2">

                <label for="lote_nuevo" class="block mb-2 text-sm font-medium text-gray-900">Lote nuevo</label>
                <input name="txtlote_nuevo" id="lote_nuevo" value="<?php echo $valotenuevo ?>" type="text" size="30"
                    required readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">

            </div>

            <div class="flex flex-col justify-center mt-2">

                <label for="humedad" class="block mb-2 text-sm font-medium text-gray-900">Humedad</label>
                <input name="txthumedad" id="humedad" value="<?php echo $vahumedad ?>" type="text" size="30" required
                    readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">

            </div>

            <div class="flex flex-col justify-center mt-2">

                <label for="temperatura" class="block mb-2 text-sm font-medium text-gray-900">Temperatura</label>
                <input name="txttemperatura" id="temperatura" value="<?php echo $vatemp ?>" type="text" size="30"
                    required readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">

            </div>

            <div class="flex flex-col justify-center mt-2">

                <label for="fecha_elab" class="block mb-2 text-sm font-medium text-gray-900">Fecha
                    elaboración</label>
                <input name="txtfecha_elab" id="fecha_elab" value="<?php echo $vafelab ?>" type="text" size="30"
                    required readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">
            </div>

            <div class="flex flex-col justify-center mt-2">

                <label for="kilos" class="block mb-2 text-sm font-medium text-gray-900">Kilos</label>
                <input name="txtkilos" id="kilos" value="<?php echo $vakilos ?>" type="text" size="30" required readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">

            </div>

            <div class="flex flex-col justify-center mt-2">
                <label for="proteina" class="block mb-2 text-sm font-medium text-gray-900">Proteina</label>
                <input name="txtproteina" id="proteina" value="<?php echo $vaproteina ?>" type="text" size="30" required
                    readonly
                    class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg outline-none p-1.5">
            </div>

            <div class="flex flex-col justify-center mt-2">
                <input type="submit" name="btnguardar" value="GUARDAR"
                    class="bg-black text-white font-mont font-semibold rounded-xl p-2 w-[50%] text-center mx-auto cursor-pointer mt-4">
            </div>
            <br>
            <a href="operador_1.php"
                class="mx-auto flex items-center justify-center h-12 px-6 w-72 bg-black mt-5 rounded-2xl font-semibold text-lg text-blue-50 select-none">VOLVER</a>
            <input name="txtresponsable" id="responsable" value="<?php echo $_SESSION['idOp'] ?>" type="text" hidden>
            <?php 
            error_reporting(0);
                include "conexion.php";
                include "controlador/controlador_login.php";
                if ($_POST['btnguardar']=="GUARDAR") {

                    $valote=$_POST['txtlote'];
                    $valotenuevo=$_POST['txtlote_nuevo'];
                    $vahumedad=$_POST['txthumedad'];
                    $vatemp=$_POST['txttemperatura'];
                    $vafelab=$_POST['txtfecha_elab'];
                    $vakilos=$_POST['txtkilos'];
                    $vaproteina=$_POST['txtproteina'];
                    $varesponsable=$_POST['txtresponsable'];

                if ($valote=="") {
                    echo "<script>Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Formulario en Blanco',
                      });</script>";
                }else{
                    if ($cantidadSacosRestantes<=1) {
                        echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Exito',
                            text: 'Carga Completa',
                          }).then(() => {
                            window.location.replace('operador_1.php');
                          });</script>";

                        $sqlUpdateEstado = "UPDATE carga SET estado_carga = 'Inactivo' WHERE id_carga = '$id'";
                        mysqli_query($conexion, $sqlUpdateEstado);
                    }else{
                    $sql="INSERT INTO saco VALUES('null','$vafelab','$valote','$valotenuevo','$vahumedad','$vatemp','$vaproteina','$vakilos','$id','$varesponsable')";
                    mysqli_query($conexion, $sql);
                    echo "<script>
                        Swal.fire({
                        icon: 'info',
                        title: 'Exito',
                        text: 'Se han grabado los datos'
                        }).then(() => {
                        openModal();
                        });
                        </script>";

                    ?><?php
                    }
                } 
            }
            ?>


            <!-- Modal para el escaneo -->
            <div id="scannerModal"
                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
                <div class="bg-white p-5 rounded-lg relative w-full max-w-lg mx-auto">
                    <button type="button" onclick="closeModal()" class="absolute top-2 right-2 text-gray-500"><svg
                            class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg></button>
                    <div class="text-center pt-2 pb-2 font-mont font-semibold text-xl">
                        <?php echo "Carga = " . $id; ?>
                    </div>
                    <div id="camera" class="h-96"></div>
                    <form id="scannerForm" action="operador_2.php?id=<?= $id ?>" method="POST"
                        class="flex flex-col items-center">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <input type="text" name="resultado" id="resultado" readonly class="text-center">
                        <input type="submit" value="Guardar"
                            class="bg-gray-900 rounded-xl text-white w-32 py-2 cursor-pointer font-semibold mt-4">
                    </form>
                </div>
            </div>

            <!-- QuaggaJS -->
            <script src="quagga.min.js"></script>
            <script>
            function openModal() {
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

        </form>
    </div>

</body>

</html>