<?php
session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
include("conexion.php");
$id = $_GET["id"];

$rs = mysqli_query($conexion, "SELECT carga.id_carga, carga.fecha_elab, carga.numero_carga, cliente.id_cliente, cliente.nombre_cliente, carga.cantidad_sacos_asignados, carga.fase, carga.estado FROM carga, cliente WHERE (carga.id_carga = $id) AND (carga.id_cliente = cliente.id_cliente)");
if ($row = mysqli_fetch_array($rs)) {
    $vaidcarga = $row[0];
    $vafecha_elab = $row[1];
    $vanumerocarga = $row[2];
    $vacliente_id = $row[3];
    $vacliente_nombre = $row[4];
    $vacantsacos = $row[5];
    $vaFase = $row[6];
    $vaEstado = $row[7];
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

        <title>Editar Carga</title>
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
            <h1 class="cursor-default select-none">EDITAR CARGA</h1>
            <a href="jefe_area_maxisacos_1.php" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont select-none font-bold px-10 py-2 text-lg rounded-xl mr-9">VOLVER</a>
        </div>

        <form method="post" class="mt-8 mx-auto ml-40 mr-40 rounded-2xl bg-gray-200 shadow-2xl shadow-indigo-300">

        <div class="grid grid-cols-2 gap-x-4 gap-y-10 pt-12 pb-8 ml-20 w-96 text-center text-white font-mont font-bold">
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">N° Carga</p>
            <input class="w-72 rounded-xl text-black pl-4 font-medium select-none" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  type="text" placeholder="Inserte Numero Carga" name="txtnCarga" required value="<?php echo $vanumerocarga ?>">
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Nombre Cliente</p>
            <?php
                $sql1 = "SELECT id_cliente, nombre_cliente FROM cliente";
                $result = mysqli_query($conexion, $sql1);
            ?>
            <select class="w-72 rounded-xl pl-2 text-black font-medium cursor-pointer outline-none select-none" name="cbonomCliente">
                <option value='<?php echo $vacliente_id; ?>'><?php echo $vacliente_nombre; ?></option>
                <option value=''>--------------------</option>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row["id_cliente"] . '">' . $row["nombre_cliente"] . '</option>';
                    }
                ?>
            </select>
            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Cantidad de Sacos</p>
            <input type="text" class="w-72 rounded-xl text-black pl-4 font-medium select-none" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  name="txtcantSacos" placeholder="Inserte Cantidad de Sacos" required value="<?php echo $vacantsacos ?>">

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Fase</p>
            <select class="w-72 rounded-xl pl-2 text-black font-medium cursor-pointer outline-none select-none" name="cbofase">
            <option value='<?php echo $vaFase; ?>'><?php echo $vaFase; ?></option>
            <option value=''>--------------------</option>
            <option value="Asignado">Asignado</option>
            <option value="Eliminado">Eliminado</option>
            <option value="Liberado">Liberado</option>
            <option value="Muestreado">Muestreado</option>
            <option value="Rechazado">Rechazado</option>
            <option value="Reprocesado">Reprocesado</option>
            <option value="Alta Temperatura">Alta Temperatura</option>
            </select>

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Estado</p>
            <select class="w-72 rounded-xl pl-2 text-black font-medium cursor-pointer outline-none select-none" name="cboestado">
            <option value='<?php echo $vaEstado; ?>'><?php echo $vaEstado; ?></option>
            <option value=''>--------------------</option>
            <option value="En planta">En Planta</option>
            <option value="Bodega">Bodega</option>
            <option value="Despachado">Despachado</option>
            <option value="Reetiquetado">Reetiquetado</option>
            <option value="Reprocesado">Reprocesado</option>
            <option value="Eliminado">Eliminado</option>
            </select>

            <p class="bg-indigo-800 rounded-2xl py-2 cursor-default select-none">Fecha Elaboración</p>
            <?php
            $fecha_mostrar = date("d-m-Y", strtotime($vafecha_elab));
            ?>
            <input class="w-72 rounded-xl text-black pl-4 font-medium outline-none" oninput="this.value = this.value.replace(/[^0-9-]/g, '')"  type="text" placeholder="DD-MM-AAAA" name="txtfecha" readonly value="<?php echo $fecha_mostrar; ?>">

        </div>
        <div class="text-center">
        <input type="submit" name="btnActualizar" value="Actualizar" class="bg-indigo-800 hover:bg-indigo-900 text-white font-mont font-bold px-28 py-2 mb-10 mt-4 text-lg rounded-xl cursor-pointer">
        </div>
        </form>
        <?php
            if (isset($_POST['btnActualizar']) && $_POST['btnActualizar'] == "Actualizar") {
                $nCarga = $_POST['txtnCarga'];
                $cliente = ($_POST['cbonomCliente'] != '') ? $_POST['cbonomCliente'] : $vacliente_id;
                $cantSacos = $_POST['txtcantSacos'];
                $fase = ($_POST['cbofase'] != '') ? $_POST['cbofase'] : $vaFase;
                $estado = ($_POST['cboestado'] != '') ? $_POST['cboestado'] : $vaEstado;
                $fecha_elab = $_POST['txtfecha'];

                $fecha_elab = date("Y-m-d", strtotime($_POST['txtfecha']));

                $sql = "UPDATE carga SET numero_carga='$nCarga', fecha_elab='$fecha_elab', cantidad_sacos_asignados='$cantSacos', fase='$fase', estado='$estado', id_cliente='$cliente' WHERE (id_carga='$id')";
                mysqli_query($conexion, $sql);
                echo "<script>Swal.fire({
                    title: 'Exito',
                    text: 'Los datos se han actualizado exitosamente',
                    icon: 'success'
                  });</script>";
                }
        ?>
    </div>   
    </body>
</html>