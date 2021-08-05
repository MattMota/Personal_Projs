<?php
	include "config.php";
	$img = "<img class=\"seta\" src=\"https://image.flaticon.com/icons/png/512/60/60995.png\">";
	$TAB = "\t\t\t\t";
	if(array_key_exists("fe",$_GET)){
		extract($_GET);
	}
	
	$aux = ($fe=="1")? "not" : "";
	$W = ($fe=="1")? "N" : "C";

	$sql = "SELECT DISTINCT localidades.loca as loca,localidades.id as id_loca FROM localidades INNER JOIN (
			SELECT l.id AS id, COUNT(c.loca) AS quant
			FROM chamados AS c, localidades AS l
    		WHERE c.loca = l.id  AND data_fe IS $aux NULL
			GROUP BY id HAVING quant>0
			ORDER BY id DESC) AS cont ON cont.id = localidades.id 
		ORDER BY cont.quant DESC;";
	$stmt = getConnection()->query($sql);
	if($stmt->execute()){
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		while($row){
			extract($row); // $loca e $id_loca passam a existir
			echo "\n$TAB\t<span>\n$TAB\t\t<button>\n$TAB\t\t\t$loca<span></span>\n$TAB\t\t\t$img $TAB\t\t</button>";
			
			$consu = "SELECT chamados.id as id, tipos.tipo as tipo, chamados.data_ab as data_ab, chamados.descr as descr, imagens.imagem as imagem FROM chamados INNER JOIN tipos ON chamados.tipo = tipos.id INNER JOIN imagens ON chamados.imagem = imagens.id WHERE chamados.loca = $id_loca AND data_fe is $aux null"; 
			$select = getConnection()->prepare($consu);
			echo "\n$TAB\t\t<ul>";
			
			if($select->execute()){
				while($linha = $select->fetch(PDO::FETCH_ASSOC)){
					extract($linha);
					echo "\n$TAB\t\t\t<li>";
					echo "\n$TAB$TAB";
					
					echo "<input id=\"$W{$id}\" type=\"checkbox\">";
					
					echo "\n$TAB$TAB";
		   			echo "<div class=\"ocorrencia\">";
					
					if($imagem){
		   	 			if(file_exists($imagem)){
			    			echo "<a href='$imagem' class='foto'>\n\t<img src='$imagem'>\n\t</a>";
			    		}
		    			else{
		    				echo "<p class='foto' align='right' style='vertical-align: center; margin-top: 30px'>Imagem não encontrada</p>";
		    			}
		   	 		}
		   			 echo "<div class=\"texto_ocorrencia\">";
		   			
		   			echo "\n$TAB$TAB\t";
			   		echo "$tipo<br>";

			   		echo "\n$TAB$TAB\t";
			   		echo "<p style='font-size: 11px'>".ScrDateFormat($data_ab)."<br>";

			   		echo "\n$TAB$TAB\t";
			   		echo "<p class='texto_ocorrencia'>$descr</p>";
		
		   			echo "\n$TAB$TAB</div>";

		   			// echo "\n$TAB$TAB</div>";
		   			// if(!($imagem && file_exists($_SERVER['DOCUMENT_ROOT'].$imagem))){
		   			// 	echo "\n$TAB$TAB<br><br>";
		   			// }
		   			
		   			echo "\n$TAB\t\t\t</li>";
				}
			}

			echo "\n$TAB\t\t</ul>";
			echo "\n$TAB\t</span>";

			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		}
	}
?>
