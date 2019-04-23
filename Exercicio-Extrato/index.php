<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TETSE</title>
</head>
<body>
	<?php 	
	$arq = fopen("Extrato.txt", "r");
	$debito = 0;
	$deposito = 0;
	$saldo = "1000";

	while (!feof($arq)) {
		$linha =  fgets($arq);
		$arr = explode(";", $linha); //explode no ;
		$linha = str_replace(";", " - ", $linha); //substitui o ; pelo - isso server apenas para uma boa vizualização
		echo $linha."<br>"; //faço impressao das linhas
		foreach ($arr as $posicao => $valor) {	//percorro todas as linhas	
			if($posicao==3){ //POSICAO 3 É DOS VALORES
				if($valor != "VALOR"){ // PARA NAO SOMAR A PALAVRA VALOR COM NUMERO PORQUE DA MERDA
					$valor = str_replace(array(".",","), array("","."), $valor); //TROCO OS . E , POR APENAS .
					if($arr[4]=="D"){	//D - DEBITO	
						$debito += $valor;							
					}else{ // C - DEPOSITOS
						$deposito += $valor;
					}									
				}
			}						
		}		
	}
	fclose($arq); 
	$total = ($saldo+$deposito) - $debito;	//FAZ A CONTA
	?>	
	<hr>
	<h3> R$ <?php echo number_format($total,2,".",","); // E ARQUI IMPRIME O TOTAL ?></h3>
	<hr>
</body>
</html>