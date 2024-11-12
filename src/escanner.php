<div class="text-center pt-2 pb-2 font-mont font-semibold text-xl">
<?php
session_start();
if (empty($_SESSION["id_login"])) {
    header("location:index.php");
}
include "conexion.php";
$id = $_GET["id"];
echo "Carga = " . $id;
?>
</div>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilos.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title> Escanner </title>
</head>

<body class="">
<div id="camera" class="flex flex-col justify-center px-96"></div>

<div class="flex flex-row-reverse items-center justify-center -mt-96 -translate-y-12 font-mont">
    <form action="" method="post">
        <input type="text" name="resultado" id="resultado" readonly class="text-center">
        <input type="submit" value="Guardar" class="bg-indigo-900 rounded-xl text-white w-32 py-2 cursor-pointer font-semibold">
    </form>

    <div class="font-semibold -translate-y-1 pr-1">
    <?php
    error_reporting(0);
    $codigo = $_POST["resultado"];
    echo "Codigo Escaneado = " . $codigo;
    ?>
    </div>
</div>
<div class="text-center -mt-8 ml-96 translate-x-40 font-mont font-semibold bg-indigo-900 text-white w-64 py-2 rounded-xl cursor-pointer">
    <a href="operador_2.php?id=<?= $id ?>&idsaco=<?= $codigo ?>">REGISTRAR/VOLVER</a>
</div>

    <script src="quagga.min.js"></script>

    <script>

        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#camera')
            },
            decoder: {
                readers: ["code_128_reader"]
            }
        }, function (err) {
            if (err) {
                console.log(err);
                return
            }
            console.log("Initialization finished. Ready to start");
            Quagga.start();
        });

        Quagga.onDetected(function (data) {
            console.log(data);

            document.getElementById("resultado").value = data.codeResult.code;

            Quagga.stop();
        });


    </script>


</body>

</html>