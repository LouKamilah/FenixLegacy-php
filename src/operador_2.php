<?php
session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
include "conexion.php";

$id=$_GET["id"];
$codsaco=$_GET["idsaco"];

$sqlLogin="select * from operador where $_SESSION[id_login] = id_login";
$rs=mysqli_query($conexion,$sqlLogin);
    if ($row=mysqli_fetch_array($rs)) {
        $_SESSION['idOp']= $row[0];
}

if ($codsaco == "") {
    $vanum="";
    $valote="";
    $valotenuevo="";
    $vahumedad="";
    $vatemp="";
    $vafelab="";
    $vakilos="";
    $vaproteina="";
}else{
    $rs = mysqli_query($conexion,"select * from tablaexternasacos where numeroSaco='$codsaco'");
        if ($row=mysqli_fetch_array($rs)) {
            $vanum=$row[0];
            $valote=$row[1];
            $valotenuevo=$row[2];
            $vahumedad=$row[3];
            $vatemp=$row[4];
            $vafelab=$row[5];
            $vakilos=$row[6];
            $vaproteina=$row[7];
        }
}

$sql=$conexion->query("SELECT carga.id_carga As idcarga,carga.numero_carga As ncarga, cliente.nombre_cliente As cliente, carga.cantidad_sacos_asignados As cantsacos FROM carga,cliente WHERE(carga.id_cliente = cliente.id_cliente) AND (carga.id_carga = $id)");
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Operador</title>
</head>

<nav class="relative px-4 py-2 flex justify-between items-center bg-white font-mont font-semibold">
    <p class="font-mont font-extrabold text-indigo-900 text-3xl ml-6 select-none">FENIX</p>
    <ul class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li>
            <div class=" relative mx-auto text-gray-600">
                <img class="h-12 hidden sm:block select-none" src="/img/agrosuper-logo.png" alt>
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

    <div class="flex flex-col items-center justify-center">
        <form class="bg-white shadow-6xl shadow-indigo-400/100 p-12 rounded-2xl w-auto h-auto" action="" method="POST" id="formsaco">
        <?php 
            while ($datos = $sql->fetch_object()) {?>
            <div class="pt-7 text-md text-center font-mont font-bold text-indigo-900 select-none">
                <p><?php echo " N°Carga ‎ ‎ ". $datos-> ncarga . " ‎ ‎ |‎ ‎  Cliente‎ ‎ ‎   " . $datos-> cliente . " ‎ ‎ |‎ ‎  Sacos Asignados‎ ‎ ‎  " . $datos-> cantsacos; ?></p>
            </div>
            <br>
            <p class="text-center text-indigo-900 font-bold text-md select-none">Operador Responsable</p>
            <p class="text-center bg-indigo-100 ml-16 mr-16 py-1 mt-2 -mb-4 rounded-2xl text-indigo-900 font-bold select-none">
            <?php
                include "conexion.php";
                include "controlador/controlador_login.php";
                echo $_SESSION["nombre_operador"] . " " . $_SESSION["apellido_operador"] . " - " . $_SESSION["nombre_turno"];
            ?>
            </p>
            <br>

            <div class="flex justify-center">
            <a href="escanner.php?id=<?= $id ?>" class="text-white font-semibold bg-indigo-900 hover:bg-indigo-900 px-28 py-2 mt-5 rounded-2xl select-none">Escanear</a>
            </div>

            <?php }?>
            <br>
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

            <div class="bg-indigo-900 text-white font-semibold w-60 rounded-2xl py-2 mx-auto">
                <input class="bg-indigo-900 text-center ml-5 cursor-default outline-none" type="text" name="registro" value="<?php echo $cantidadSacosRestantes ?>" readonly>
                <p class="text-center cursor-default select-none">Cantidad Sacos Restantes</p>
            </div>

            <div class="flex flex-row items-center justify-center mt-8 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 rounded-2xl px-5 py-1 select-none"
                    for="n_saco">N° Saco</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txtn_saco" id="n_saco" value="<?php echo $vanum ?>" type="text" size="30" required readonly >
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="lote">Lote</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txtlote" id="lote" value="<?php echo $valote ?>" type="text" size="30" required readonly>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="lote_nuevo">Lote Nuevo</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txtlote_nuevo" id="lote_nuevo" value="<?php echo $valotenuevo ?>" type="text" size="30" required readonly>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="humedad">Humedad</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txthumedad" id="humedad" value="<?php echo $vahumedad ?>" type="text" size="30" required>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="temperatura">Temperatura</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txttemperatura" id="temperatura" value="<?php echo $vatemp ?>" type="text" size="30" required>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="fecha_elab">Fecha Elaboración</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txtfecha_elab" id="fecha_elab" value="<?php echo $vafelab ?>" type="text" size="30" required>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="kilos">Kilos</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txtkilos" id="kilos" value="<?php echo $vakilos ?>" type="text" size="30" required>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <label class="w-36 text-center text-white font-semibold bg-indigo-900 select-none rounded-2xl py-1" for="proteina">Proteina</label>
                <input class="border-2 rounded-xl border-indigo-900 outline-none pl-4" name="txtproteina" id="proteina" value="<?php echo $vaproteina ?>" type="text" size="30" required>
            </div>

            <div class="flex flex-row items-center justify-center mt-5 space-x-2">
                <input type="submit" name="btnguardar" value="GUARDAR" class="bg-indigo-900 hover:bg-indigo-800 text-white font-mont font-bold rounded-xl px-20 py-2 cursor-pointer mt-4">
            </div>
            <br>
            <a href="operador_1.php" class="mx-auto flex items-center justify-center h-12 px-6 w-72 bg-indigo-900  mt-8 rounded-2xl font-semibold text-l text-blue-50 hover:bg-indigo-800 select-none">VOLVER</a>
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
                    if ($cantidadSacosRestantes<=0) {
                        echo "<script>Swal.fire({
                            icon: 'success',
                            title: 'Exito',
                            text: 'Carga Completa',
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
                        window.location.replace('escanner.php?id=$id');
                        });
                        </script>";

                    ?><?php
                    }
                } 
            }
            ?>    
        </form>
    </div>

</body>

</html>