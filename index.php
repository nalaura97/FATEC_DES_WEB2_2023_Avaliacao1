<?php
$errorMsg = ''; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $_SESSION['username'] = "Admin";

    if (empty($username)) { 
        $errorMsg = "Digite um username valido.";
    }

    if ($username == "portaria") { 
        if (isset($_SESSION['logged_user'])) {
            header("location: dashboard.php");
            die();
        } else {
            $_SESSION['logged_user'] = $username;
            header("location: dashboard.php");
            die();
        }
    } else {
        $errorMsg = "Username incorreto";
    }
}
?>


<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <title>Index</title>
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
        <h2>Estacionamento</h2>
        <p>Favor inserir login e senha.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="portaria">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="FatecAraras">
                <span class="help-block"></span>
            </div>
            <div>
                <span><?php echo $errorMsg; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Acessar">
            </div>
        </form>
    </div>
</body>

<!-- 
<body>
    <div class="wrapper">
        <h2>Estacionamento</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>RA</label>
                <input type="text" name="username" class="form-control">
                <span class="help-block"></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>

            <div>
                <span><?php echo $errorMsg; ?></span>
            </div>
        </form>


        <div class="text-center">
            <p><a href="register.php">Register</a></p>
        </div>
    </div>
</body> -->

</html>