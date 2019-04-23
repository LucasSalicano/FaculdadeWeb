<?php
    session_start();
    if(!isset($_COOKIE['usuario']) && !isset($_COOKIE['senha'])){
        $_COOKIE['usuario'] = "Lucas";
        $_COOKIE['senha'] = 123;
        /* OU 
         setcookie("usuario","Lucas", time() + 3600);
         setcookie("senha","123", time() + 3600);
        */
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<style>
.formulario{
    width:100%;
    height: 100%;
    text-align:center;
}
</style>
  <div class="formulario">
    <form action="" method="POST">
        <br><br>
        <input type="text" name="usuario" placeholder="USUARIO" value="<?php echo $_COOKIE['usuario'];?>"> <br><br>
        <input type="password" name="senha" placeholder="SENHA" value="<?php echo $_COOKIE['senha'];?>"> <br><br>
        <input type="submit" name="sendForm" value="Entrar">
    </form>
    </div>
<?php
    if(isset($_POST['sendForm'])):
        $usuario = $_POST['usuario'];
        $senha   = $_POST['senha'];
        if($usuario=="Lucas" && $senha=="123"){
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header("Location: sucesso.php");
        }else{
            echo "<hr>";
            echo "Login incorreto!";
            echo "<hr>";
        }
    endif;
?>    
</body>
</html>