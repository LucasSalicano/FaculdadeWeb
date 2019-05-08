<?php
    session_start();
    if(!isset($_SESSION['usuario']) &&  !isset($_SESSION['datanasc']) && !isset($_SESSION['senha'])){
        header("Location: index.php");
    }else{
        unset($_SESSION['tentativas']);
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bem Vindo</title>
</head>
<body>
    <fieldset>
        <p>Bem Vindo, <?php echo $_SESSION['usuario']; ?> (<a href="sair.php">Sair</a>)</p>
    </fieldset>
</body>
</html>