<?php

include('config.php');
session_start();

if (isset($_POST['register'])) {

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    
    $query = $connection->prepare("SELECT * FROM usuario WHERE correo = :correo");
    $query->bindParam(":correo", $correo, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($contrasena, $user['CONTRASENA'])) {
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['correo'] = $user['CORREO'];
            
            // Redirect to the PHP voting page
            header("Location: votos.php");
            exit();

        } else {
            echo '<p class="error">Contraseña incorrecta.</p>';
        }
    } else {
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);
        
        $query = $connection->prepare("INSERT INTO usuario(CONTRASENA, CORREO) VALUES (:contrasena_hash, :correo)");
        $query->bindParam(":contrasena_hash", $contrasena_hash, PDO::PARAM_STR);
        $query->bindParam(":correo", $correo, PDO::PARAM_STR);
        $result = $query->execute();

        if ($result) {
            $_SESSION['correo'] = $correo;
            
            $last_id = $connection->lastInsertId();
            $_SESSION['user_id'] = $last_id;
            
            // Redirect to the PHP voting page
            header("Location: votos.php");
            exit();
        } else {
            echo '<p class="error">Algo anda mal! No se pudo registrar la cuenta.</p>';
        }
    }
}
?>