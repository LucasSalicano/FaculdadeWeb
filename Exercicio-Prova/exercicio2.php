 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Exercicio 2</title>
 </head>
 <body>
 	<!-- EXERCICIO 2 -->	
 	<fieldset>
 		<form action="" method="POST">
 			<textarea name="texto" id="texto" cols="120" rows="5">
23;HSBC;0715;55344-2;53927;Felipe Austin;800,50;Umuarama;PR;Pagamentos diversos#
28;Banco do Brasil;7388;13551-7;442243;Roberto Augusto;1315,33;Ponta Pora;MS;Pagamentos diversos#
31;HSBC;0715;22598-1;2211;Carla da Silva;230,02;Maringa;PR;Pagamentos diversos#
35;HSBC;0301;23878-0;43244;Reinaldo Junior;491,20;Campo Grande;MS;Transferencias#
28;Banco do Brasil;7388;13551-7;442243;Roberto Augusto;1315,33;Umuarama;PR;Transferencias# 				
 			</textarea>
 			<input type="submit" name="botao" value="enviar">
 		</form>
 	</fieldset>
 	<?php
 	if(isset($_POST['botao'])) //se exitir (isset) um clique no botão
 	{ //executa o codigo
 		$texto = $_POST['texto']; //pegando os dados
 		$texto = explode("#", $texto); //explodindo no #
 		//inicializando as variaveis com 0
 		$valorTotal = $valorTotalUmuarama =  $valorTotalMS = $totalOperacoesHSBC = $totalOperacoesTransferencias = $valorTotalTransferencias = 0;
 		//lendo os dados
 		foreach ($texto as $posicao => $valor) {
 			$colunas = explode(";", $valor);

 			//formatando valor para aparecer os centavos
 			if(isset($colunas[6])){
 				$valor = str_replace(array('.',','), array('','.'), $colunas[6]);
 			}
 			$valorTotal += $valor;	//POSICAO 6 SE REFERE AOS VALORES
 			//PEGAR VALOR SOMENTE DA CIDADE DE UMUARAMA
 			if(isset($colunas[7]) && $colunas[7] == "Umuarama"){ //POSICAO 7 SE REFERE AS CIDADADES
 				$valorTotalUmuarama += $valor;	
 			}
 			// total das transações realizadas no estado do Mato Grosso do Sul
 			if(isset($colunas[8]) && $colunas[8] == "MS"){ //POSICAO 8 SE REFERE aos ESTADOS
 				$valorTotalMS += $valor;	
 			} 			
 			//Quantas transações foram realizadas pelo banco HSBC
 			if(isset($colunas[1]) && $colunas[1] == "HSBC"){ //POSICAO 1 SE REFERE aos BANCOS
 				$totalOperacoesHSBC++;	
 			} 	
 			//Quantas transações e qual o valor total para o tipo de transação "Transferencias"?
 			if(isset($colunas[9]) && $colunas[9] == "Transferencias"){ //POSICAO 9 SE REFERE AO TIPO DE OPERAÇÃO
 				$totalOperacoesTransferencias++;
 				$valorTotalTransferencias += $valor;	
 			} 			
 		}
 		//MOSTRANDO O RESULTADO
 		echo "Qual o valor total das transações realizadas? R$ ",$valorTotal."<br>";
 		echo 'Qual o valor total das transações realizadas na cidade de “Umuarama”? R$'.$valorTotalUmuarama."<br>";
 		echo "Qual o valor total das transações realizadas no estado do Mato Grosso do Sul? R$ ".$valorTotalMS."<br>";
 		echo "Quantas transações foram realizadas pelo banco HSBC? ".$totalOperacoesHSBC."<br>";
 		echo 'Quantas transações e qual o valor total para o tipo de transação "Transferencias"? TOTAL DE TRANSÇÕES '.$totalOperacoesTransferencias." VALOR TOTAL R$ ".$valorTotalTransferencias;
 	}

 	?>
 	</body>
 	</html>