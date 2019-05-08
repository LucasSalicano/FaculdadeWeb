<?php
        session_start();       
        if(!isset($_SESSION['tentativas'])){
            $_SESSION['tentativas'] = 0;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROVA</title>
</head>
<body>
<center>
<fieldset>
    <form action="" method="POST">
        <label>Nome: </label><br>
        <input type="text" name="nome"><br>
        <label>Ano de Nascimento: </label><br>
        <input type="text" name="datanasc"><br>
        <label>Senha: </label><br>
        <input type="password" name="senha"><br><br>
        <input type="submit" name="botao" value="Entrar">
    </form>    
</fieldset>
</center>
<?php
    if(isset($_POST['botao'])):
       //CREDENCIAIS DO SISTEMAS
       $usuarioSis = "lucas" ;
       $datanascSis = "1998" ;
       $senhaSis  = "123";
      //PEGANDO DADOS DO FORMULARIO
      $usuario  = $_POST['nome'];
      $datanasc = $_POST['datanasc'];       
      $senha    = $_POST['senha']; 

      if($usuario == $usuarioSis && $datanasc == $datanascSis && $senha == $senhaSis){
        $_SESSION['usuario'] = $usuario;
        $_SESSION['datanasc'] = $datanasc;
        $_SESSION['senha'] = $senhaSis;

        header("Location: home.php");
      }else if($_SESSION['tentativas'] < 3){
          //LOGIN ERRADO
          echo "<p style='color:#900;'> Login Incorreto!</p>";
          echo "<p style='color:#900;'> Você tem: ".(3-$_SESSION['tentativas'])." tentativas.</p>";
          $_SESSION['tentativas'] += 1;
      }else{
          header("Location: usuarioBloqueado.php");
      }  

    endif;    
?>
</body>
</html>