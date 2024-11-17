<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Login</title>
</head>

<body>
    <nav class="mx-20 mt-10 mb-2 relative px-4 py-2 flex justify-between items-center bg-white font-mont">
        <p class="font-mont font-extrabold text-black text-5xl hidden sm:block cursor-default select-none">FENIX
        </p>
        <div class=" lg:flex">
            <img class="h-20 hidden sm:block cursor-default select-none" src="/img/agrosuper-logo.png" alt>
        </div>
    </nav>

    <div class="flex flex-col items-center justify-center">
        <h1 class="font-extrabold font-mont text-4xl text-black cursor-default select-none">INICIO DE SESIÓN</h1>
        <?php
        include "conexion.php";
        include "controlador/controlador_login.php";
        ?>
        <form method="post" class="form py-60 bg-white shadow-6xl">
            <label class="font-semibold text-sm select-none" for="usuario">Usuario</label>
            <input
                class="flex items-center h-96 px-4 py-2 w-72 bg-gray-200 mt-2 focus:outline-none rounded-xl border-2 border-black"
                type="text" required id="usuario" name="usuario" title="Inserte su Usuario">
            <label class="font-semibold text-sm mt-3 select-none" for="password">Contraseña</label>
            <input
                class="flex items-center h-96 px-4 py-2 w-72 bg-gray-200 mt-2 focus:outline-none rounded-xl border-2 border-black"
                type="password" required id="password" name="password">

            <div class="mt-5 py-2">
                <div class="g-recaptcha" data-sitekey="6LdIeR8pAAAAALYhjdMOAsPaCmMfAG2QegLnvgfN"></div>
            </div>

            <button
                class="flex items-center justify-center h-96 p-3 px-6 w-72 bg-black select-none mt-8 rounded-2xl font-semibold text-l text-white"
                type="submit" name="btnEntrar" Value="Acceder">ENTRAR</button>

            <div class="flex mt-6 justify-center text-xs">
                <a class="text-black select-none" href="account_recovery.php">¿Has
                    olvidado la contraseña?</a>
            </div>
        </form>
    </div>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

</body>

</html>