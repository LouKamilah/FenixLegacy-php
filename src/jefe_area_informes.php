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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    

    <title>Jefe Área</title>
</head>

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
                    <a href="jefe_area_informes.php" aria-label="dashboard"
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
                        <span class="-mr-1 font-medium">INFORMES</span>
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

<body>

    <div class="ml-auto lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="font-mont font-extrabold text-indigo-900 text-4xl ml-4">
            <h1 class="cursor-default select-none">ESTADISTICAS E INFORMES</h1>
        </div>
    </div>

<form method="post" class="mt-8 py-6 px-12 rounded-xl">

<!--chart carga x cliente-->
<?php

    $sql = "SELECT c.id_cliente, COUNT(*) as cantidad_cargas, nombre_cliente 
        FROM carga c
        INNER JOIN cliente cl ON c.id_cliente = cl.id_cliente
        GROUP BY c.id_cliente, nombre_cliente";

    $result = mysqli_query($conexion, $sql);

    $data = array();
    $data[] = ['Cliente', 'Cantidad de Cargas'];

    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [$row['nombre_cliente'], (int)$row['cantidad_cargas']];
    }

    $jsonData = json_encode($data);
?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo $jsonData; ?>);

        var options = {
            title: 'Cargas por Cliente',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));

        chart.draw(data, options);
    }
</script>
<!--chart sacos x cliente-->
<?php
    $sqlSacos = "SELECT cl.id_cliente, COUNT(s.id_saco) as cantidad_sacos, nombre_cliente
    FROM cliente cl
    LEFT JOIN carga c ON cl.id_cliente = c.id_cliente
    LEFT JOIN saco s ON c.id_carga = s.id_carga
    GROUP BY cl.id_cliente, nombre_cliente";

    $resultSacos = mysqli_query($conexion, $sqlSacos);

    if (!$resultSacos) {
    die('Error en la consulta de sacos: ' . mysqli_error($conexion));
    }

    $dataSacos = array();
    $dataSacos[] = ['Cliente', 'Cantidad de Sacos'];

    while ($rowSacos = mysqli_fetch_assoc($resultSacos)) {
    $dataSacos[] = [$rowSacos['nombre_cliente'], (int)$rowSacos['cantidad_sacos']];
    }

    $jsonDataSacos = json_encode($dataSacos);
?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChartSacos);

    function drawChartSacos() {
    var dataSacos = google.visualization.arrayToDataTable(<?php echo $jsonDataSacos; ?>);

    var optionsSacos = {
    title: 'Sacos por Cliente',
    is3D: true,
    };

    var chartSacos = new google.visualization.PieChart(document.getElementById('pie_chart_sacos'));

    chartSacos.draw(dataSacos, optionsSacos);
    }
</script>

    <div class="flex flex-row ml-72 -mt-14">
        <div id="pie_chart" class="" style="width: 50%; height: 300px;"></div>
        <div id="pie_chart_sacos" class="" style="width: 50%; height: 300px;"></div>
    </div>
        <!--tabla informes-->
    <table class="ml-72">
        <tr>
        <h1 class="font-mont font-extrabold text-indigo-900 text-4xl ml-60 pb-12 select-none">CARGAS POR CLIENTE</h1>
            <td>
            <?php
            error_reporting(0);
            include("conexion.php");

            $sql="SELECT id_cliente, nombre_cliente From cliente";
            $result = mysqli_query($conexion,$sql);
            ?>
            <select name="cbx_cliente" id="cbx_cliente" class="px-4 py-2 text-black outline outline-indigo-900 rounded-xl outline-2">
                <option value="0">Seleccionar Cliente</option>
                <?php while($row = $result->fetch_assoc()) { ?>
                <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['nombre_cliente']; ?></option>
                <?php } ?>
            </select>
            </td>
            <td>
                <input type="submit" name="informe1" value="Generar Informe" class="h-10 w-52 ml-12 cursor-pointer select-none bg-indigo-800 rounded-2xl font-semibold text-center text-lg text-blue-50 hover:bg-indigo-900"></td>
        </tr>
        <table class="ml-72">
        <h1 class="font-mont font-extrabold text-indigo-900 text-4xl ml-60 pb-10 mt-12 select-none">SACOS POR FECHA</h1>
        <tr>
            <td><label class="mr-2 font-mont font-bold text-indigo-900 select-none">Desde:</label><input class="outline outline-indigo-900 rounded-xl text-center outline-2 px-4 py-1" type="date" id="fechaIn" name="fechaIn"></td>
            <td><label class="ml-10 mr-2 font-mont font-bold text-indigo-900 select-none">Hasta:</label><input class="outline outline-indigo-900 rounded-xl text-center outline-2 px-4 py-1" type="date" id="fechaFn" name="fechaFn"></td>
            <td><input type="submit" name="informe2" value="Generar Informe" class="h-10 w-52 ml-12 cursor-pointer select-none bg-indigo-800 rounded-2xl font-semibold text-center text-lg text-blue-50 hover:bg-indigo-900"></td>
        </tr>
        </table>
    </table>     
        <?php 
        if ($_POST['informe1']=="Generar Informe") {

            $id=$_POST['cbx_cliente'];
            if ($id == 0) {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'INFORME NO GENERADO',
                    text: 'Seleccione Cliente',
                });</script>";
            }else{
                ?> <script> window.location.replace('informe1.php?id=<?=$id?>'); </script><?php
            }
        }
        if ($_POST['informe2']=="Generar Informe") {
            $fechaIn=$_POST['fechaIn'];
            $fechaFin=$_POST['fechaFn'];

            if ($fechaIn == '' || $fechaFin == '') {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'INFORME NO GENERADO',
                    text: 'Seleccione Rango de Fechas',
                });</script>";
            }else{
                ?> <script> window.location.replace('informe2.php?FIn=<?= $fechaIn?>&FFn=<?= $fechaFin?>'); </script><?php
            }
        }
        ?>

</form>
</body>

</html>