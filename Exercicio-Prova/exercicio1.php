 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Exercicio 1</title>
 </head>
 <body>
 	<!-- EXERCICIO 1 -->	
 	<fieldset>
 	<form action="" method="POST">
 		<textarea name="texto" id="texto" cols="80" rows="10">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum 			
 		</textarea>
 		<input type="submit" name="botao" value="enviar">
 	</form>
 </fieldset>
 <?php
 	if(isset($_POST['botao'])) //se exitir (isset) um clique no botão
 	{ //executa o codigo
 		$texto = $_POST['texto']; // pega os dados dentro do textarea
 		$quantidadeCaracteres = strlen($texto); //total de caracteres
 		$primeiroCaractere = substr($texto, 0, 1); //primeiro caracteres
 		$ultimoCaractere = substr($texto, -1); //ultimo caractere
 		$primeiraPosicaA =  strpos($texto, "a", true);// retorna a posição da letra A na variavel
 		$substituirEspaco = str_replace(" ", "$", $texto); //susbstitui todos os espaços por $
 		$primeiro15caracteres = substr($texto, 0, 15); //primeiros 15 caracteres da variavel

 		echo "<hr>"; //para separar os resultados
 		echo "TOTAL DE CARACTERES: ".$quantidadeCaracteres."<br>";
 		echo "PRIMEIRO CARACTERE: ".$primeiroCaractere."<br>";
 		echo "ULTIMO CARACTERE: ".$ultimoCaractere."<br>";
 		echo "PRIMEIRA POSICA DA LETRA A: ".$primeiraPosicaA."<br>";
 		echo "SUBSTITUIR ESPAÇOS POR $: ".$substituirEspaco."<br>";
 		echo "PRIMEIRO 15 CARACTERES: ".$primeiro15caracteres;
 		
 	}
 ?>
 </body>
 </html>