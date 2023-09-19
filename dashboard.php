<?php
session_start();
$token = $_SESSION['logged_user'];

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "username not found";
}

if (!isset($_SESSION['logged_user'])) {
    header("location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <h1> Bem vindo <?php $username ?></h1>
    <div class="wrapper">
        <a href="#register" class="btn btn-primary">Cadastro</a>
        <?php
        if (isset($_SESSION['logged_user'])) {
            session_destroy();
            header("location: index.php");
            exit();
        } else {
            echo '<a class="btn btn-secondary" href="doLogout.php?token=' . $token . '>Confirmar logLogoutout</a>';
        }
        ?>
    </div>
</body>

</html>