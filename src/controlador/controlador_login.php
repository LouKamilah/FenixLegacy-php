<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if (!empty($_POST["btnEntrar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {

        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretkey = "6LdIeR8pAAAAAAF6ZeZdwuSk49UpWPz3Szlf0KhR";

        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

        $atributos = json_decode($respuesta, TRUE);

        if(!$atributos['success']){
            echo '<script>Swal.fire({
                icon: "error",
                title: "Error",
                text: "Verificar Captcha",
              });</script>';
        } else { // Si el captcha es válido
            $password = $_POST["password"];
            $usuario = $_POST["usuario"];
            $sql = $conexion->query("SELECT * FROM login WHERE usuario='$usuario' AND contraseña='$password'");
            if ($sql && $sql->num_rows > 0) {
            $datos = $sql->fetch_object();
            $_SESSION["id_login"] = $datos->id_login;
            if ($datos->tipo_usu === 'Jefe Area') {
                $sqlJefe = $conexion->query("SELECT nombre_jefeArea, apellido_jefeArea FROM jefe_area WHERE id_login = $datos->id_login");
                if ($sqlJefe && $sqlJefe->num_rows > 0) {
                    $jefe = $sqlJefe->fetch_object();
                    $_SESSION["nombre_jefe"] = $jefe->nombre_jefeArea;
                    $_SESSION["apellido_jefe"] = $jefe->apellido_jefeArea;
                }
                header("location: jefe_area_maxisacos_1.php");
            } elseif ($datos->tipo_usu === 'Operador') {
                $sqlOperador = $conexion->query("SELECT id_operador, nombre_operador, apellido_operador, turno FROM operador WHERE id_login = $datos->id_login");
                if ($sqlOperador && $sqlOperador->num_rows > 0) {
                    $operador = $sqlOperador->fetch_object();
                    $_SESSION["id_operador"] = $operador->id_operador;
                    $_SESSION["nombre_operador"] = $operador->nombre_operador;
                    $_SESSION["apellido_operador"] = $operador->apellido_operador;
                    $idTurno = $operador->turno;
                    $sqlTurno = $conexion->query("SELECT turno FROM turno WHERE id_turno = $idTurno");
                    if ($sqlTurno && $sqlTurno->num_rows > 0) {
                        $turno = $sqlTurno->fetch_object();
                        $_SESSION["nombre_turno"] = $turno->turno;
                    }
                }
                header("location: operador_1.php");
            } elseif ($datos->tipo_usu === 'Administrador'){
                header("location: administrador_index.php");
            }
        } else {
            echo '<script>Swal.fire({
                icon: "error",
                title: "Error",
                text: "El usuario o la contraseña son incorrectos",
              });</script>';
        }
    }
}
}

?>
