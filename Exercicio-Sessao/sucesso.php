<?php
    session_start();
    if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
        header("Location: index.php");
        exit();
    }
    $usuario = $_SESSION['usuario'];
    echo "Olá, ".$usuario."<a href='logout.php'>(Sair)</a><br>";
    echo "Usuario logado com sucesso!";
?>