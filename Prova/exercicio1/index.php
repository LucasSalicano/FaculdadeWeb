<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROVA</title>
</head>
<body>
    <form action="" method="POST">
        <textarea name="texto" id="texto" cols="80" rows="7">
1;CEMIL;Neymar Junior;25;Umuarama;PR;Cirurgia;3320,90;Pago#
2;Norospar;Silvio Santos;70;Maringa;PR;Cirurgia;5730,30;Pendente#
3;Uopecan;Gisele Bundchen;36;Campo Grande;MS;Consulta medica;200,00;Pago#
4;Norospar;Luciano Huck;49;Umuarama;PR;Fisioterapia;150,00;Pendente#
5;CEMIL;Luan Santana;30;Campo Grande;MS;Consulta medica;200,00;Pago#
6;Uopecan;Danilo Gentili;37;Sao Paulo;SP;Cirurgia;7200,00;Pago#
7;Norospar;Cristiano Ronaldo;35;Europa;EXT;Cirurgia;14000,00;Pago#        
        </textarea><br>
        <input type="submit" name="enviar" value="Enviar">        
    </form>
<?php
    if(isset($_POST['enviar'])):
        $texto = $_POST['texto'];
        $texto = explode("#", $texto);
        $totalPacientes = $transacoesCemil = $vrstatusPago = $vrstatusPedente = $vrTotalUmuarama =  $vrTotalPR = $vrTotalMS = $vrTotalSP = $vrTotalEXT = 0;
        foreach($texto as $posicao => $valor){            
            $colunas = explode(";", $valor); 
            $colunas = explode(";", $valor); 
            
            if(isset($colunas[7])){
                $valor = str_replace(array('.',','), array('','.'), $colunas[7]);
            }     
            if(isset($colunas[1])){
                $totalPacientes++;
            }                   
            if(isset($colunas[1]) && $colunas[1]=="CEMIL"){
                $transacoesCemil++;
            }   
            if(isset($colunas[8]) && $colunas[8]=="Pago"){
                $vrstatusPago += $valor;
            }   
            if(isset($colunas[8]) && $colunas[8]=="Pendente"){
                $vrstatusPedente += $valor;
            }     
            if(isset($colunas[4]) && $colunas[4]=="Umuarama"){
                $vrTotalUmuarama += $valor;
            }  
            if(isset($colunas[5]) && $colunas[5]=="PR"){
                $vrTotalPR += $valor;
            }else if(isset($colunas[5]) && $colunas[5]=="MS"){
                $vrTotalMS += $valor;
            }else if(isset($colunas[5]) && $colunas[5]=="SP"){
                $vrTotalSP += $valor;
            }else if(isset($colunas[5]) && $colunas[5]=="EXT"){
                $vrTotalEXT += $valor;
            }  

        }
        echo "<br>";
        echo "O total de pacientes atendidos? ".$totalPacientes."<br>";
        echo "A quantidade de transações realizadas no Hospital CEMIL? ".$transacoesCemil."<br>";
        echo "O valor total das transações que estão com o status “Pago”? ".$vrstatusPago."<br>";
        echo "O valor total das transações que estão com o status “Pendente”? ".$vrstatusPedente."<br>";
        echo "O valor total das transações realizadas na cidade de “Umuarama”? ".$vrTotalUmuarama."<br>";
        echo "O valor total das transações realizadas em cada estado? "."<br> PR = ".$vrTotalPR."<br>"." MS = ".$vrTotalMS."<br> SP = ".$vrTotalSP."<br> EXT = ".$vrTotalEXT;
    endif;    
?>    
</body>
</html>