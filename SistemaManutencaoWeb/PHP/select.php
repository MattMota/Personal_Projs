<?php
	
	if(!array_key_exists("id",$_GET)){
		header($config['LOCATION']);
	}

	extract($_GET);//$id passa a existir
	
	$sql = "SELECT loca FROM localidades WHERE :id = id";
	$stm = getConnection()->prepare($sql);
	$stm->bindValue(':id', $id, PDO::PARAM_STR);	

	if($stm->execute()){
 		$row = $stm->fetch(PDO::FETCH_ASSOC);
 		if(!$row){
 			header($config['LOCATION']);		
		}
		extract($row); //$loca passa a existir
	}
	else{
		header($config['LOCATION']);
	}
	session_start();
	$_SESSION["id"] = $id;
	

	$sql = "SELECT DISTINCT tipo as id_tipo FROM ocorre WHERE :id = loca";
	$stm = getConnection()->prepare($sql);
	$stm->bindValue(':id', $id, PDO::PARAM_STR);
 
 	
 	if($stm->execute()){
 		$row = $stm->fetch(PDO::FETCH_ASSOC);

 		while($row){
 			extract($row); //$id_tipo passa a existir
 			$sql = "SELECT tipo as ocorre FROM tipos WHERE $id_tipo = id";
 			$stm2 = getConnection()->prepare($sql);

 			if($stm2->execute()){
 				$row2 = $stm2->fetch(PDO::FETCH_ASSOC);
 				if($row2){
 					extract($row2); //$ocorre passa a existir
 					echo "<option value= \"T".$id_tipo."\">$ocorre</option>";				
 				}
 			}
 			$row = $stm->fetch(PDO::FETCH_ASSOC);

 		}

 		$stm2->closeCursor();  	
 	}
 	else{
		header($config['LOCATION']);
	}

 	$stm->closeCursor();
?>