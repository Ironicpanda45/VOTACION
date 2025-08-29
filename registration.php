<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);

    $query = $connection->prepare("SELECT * FROM usuario WHERE correo = :correo");
    $query->bindParam(":correo", $correo, PDO::PARAM_STR);
    $query->execute();

    $html_content = file_get_contents('votarporproyecto.html');

    if ($query->rowCount() > 0) {
        echo '<p class="error">Este correo ya ha sido registrado</p>';
    } else {
        $query = $connection->prepare("INSERT INTO usuario(CONTRASENA, CORREO) VALUES (:contrasena_hash, :correo)");
        $query->bindParam(":contrasena_hash", $contrasena_hash, PDO::PARAM_STR);
        $query->bindParam(":correo", $correo, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            echo $html_content;
            $dom = new DOMDocument();
        } else {
            echo '<p class="error">Algo anda mal!</p>';
        }
    }
}
?>