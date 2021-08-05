<?php 
	include 'config.php';

	$id = $_GET["id"];
	$letra = substr($id,0,1);
	$letra = ($letra == "C")? "CURDATE()" : "null"; 
	$id = preg_split("/[CN]/",$id);
	
	for($i=1; $i<count($id); $i++){
		$ident = $id[$i];
		$sql = "UPDATE chamados SET data_fe = $letra WHERE id = $ident";
		
		$stm = getConnection()->prepare($sql);
		$stm->execute();
		$stm->closeCursor();
	}