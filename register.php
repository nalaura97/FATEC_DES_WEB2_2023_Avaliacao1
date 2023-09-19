<?php
session_start();

if (!isset($_SESSION['logged_user'])) {
    header("location: index.php");
    die();
}

if (!file_exists('users.txt')) {
    touch('users.txt');
}
$file = fopen("users.txt", "a") or die("Unable to open file!");

$success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $placa = $_POST['placa'];
    $user = "$ra|$nome|$placa|";

    fwrite($file, $user);
    $success = true;
}

fclose($file);
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Registrar</title>
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
    <div class="wrapper">
        <h2>Registrar</h2>
        <p>Estacionamento</p>

        <?php if ($success) : ?>
            <h2>Sucesso!</h2>
        <?php endif; ?>

        <?php if (!$success) : ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input type="text" name="nome" class="form-control" value="Caique Maurano">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Registro Academico (RA)</label>
                    <input type="text" name="ra" class="form-control" value="123mudar">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label>Placa do automovel</label>
                    <input type="text" name="placa" class="form-control" value="FOT0G47">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>

</html>