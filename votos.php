<?php
require_once('config.php');
session_start();



if (!isset($_SESSION['correo'])) {
header("Location: index.html");
exit();
}



$user_email = $_SESSION['correo'];
$user_has_voted = false;



$sql_check_vote = "SELECT id FROM votos WHERE correo = ?";
$stmt_check = $connection->prepare($sql_check_vote);
$stmt_check->execute([$user_email]);



if ($stmt_check->fetch()) {
$user_has_voted = true;
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['voto']) && !$user_has_voted) {
$voto = $_POST['voto'];
$sql_insert_vote = "INSERT INTO votos (universidad, correo) VALUES (?, ?)";
$stmt_insert = $connection->prepare($sql_insert_vote);
if ($stmt_insert->execute([$voto, $user_email])) {
$user_has_voted = true;
}
}

$sql_conteo = "SELECT universidad, COUNT(*) as total_votos FROM votos GROUP BY universidad";
$stmt_conteo = $connection->query($sql_conteo);
$results = $stmt_conteo->fetchAll();



$conteo_final = ['itcj' => 0, 'tec' => 0, 'urn' => 0, 'uacj' => 0, 'uach' => 0];



foreach ($results as $row) {
if (isset($conteo_final[$row['universidad']])) {
$conteo_final[$row['universidad']] = $row['total_votos'];
}
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo Academia STEM</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cal+Sans&display=swap" rel="stylesheet">
</head>

<body>
    <h1>Torneo Academia STEM</h1> <img class="stem" src="STEM.png" alt="Logo STEM">
    <h2>Votos por proyecto</h2>
    <p>Categorías</p>
    <?php if ($user_has_voted): ?>
    <p style="color: green; font-weight: bold;">¡Gracias por tu voto!</p>
    <?php else: ?>
    <p style="color: red; font-weight: bold;">¡Aún no has votado! Elige tu proyecto favorito.</p>
    <?php endif; ?>
    <div class="conteo">
        <div id="conta1" class="contador">ITCJ:
            <?php echo $conteo_final['itcj']; ?>
        </div>
        <div id="conta2" class="contador">TEC:
            <?php echo $conteo_final['tec']; ?>
        </div>
        <div id="conta3" class="contador">URN:
            <?php echo $conteo_final['urn']; ?>
        </div>
        <div id="conta4" class="contador">UACJ:
            <?php echo $conteo_final['uacj']; ?>
        </div>
        <div id="conta5" class="contador">UACH:
            <?php echo $conteo_final['uach']; ?>
        </div>
    </div>
    <form action="votos.php" method="POST">
        <div class="uni">
            <div><img src="ITCJ.png" alt="Logo ITCJ"><button type="submit" name="voto" value="itcj" <?php echo
                    $user_has_voted ? 'disabled' : '' ; ?>>Votar</button></div>
            <div><img src="TEC.png" alt="Logo TEC"><button type="submit" name="voto" value="tec" <?php echo
                    $user_has_voted ? 'disabled' : '' ; ?>>Votar</button></div>
            <div><img src="URN.jpg" alt="Logo URN"><button type="submit" name="voto" value="urn" <?php echo
                    $user_has_voted ? 'disabled' : '' ; ?>>Votar</button></div>
            <div><img src="UACJ.png" alt="Logo UACJ"><button type="submit" name="voto" value="uacj" <?php echo
                    $user_has_voted ? 'disabled' : '' ; ?>>Votar</button></div>
            <div><img src="UACH.png" alt="Logo UACH"><button type="submit" name="voto" value="uach" <?php echo
                    $user_has_voted ? 'disabled' : '' ; ?>>Votar</button></div>
        </div>
    </form>
</body>

</html>