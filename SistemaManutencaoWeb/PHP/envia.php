<?php
	include "config.php";
	if (!($_SERVER["REQUEST_METHOD"] == "POST")){
		header($config['LOCATION']);
	}
	
	if(!(array_key_exists('tipo',$_POST) && array_key_exists('descr',$_POST))){
		header($config['LOCATION']);
	}
	if(!(array_key_exists('loca',$_POST) && array_key_exists('arquivo',$_FILES))){
		header($config['LOCATION']);
	}

	extract($_POST); //$tipo, $descr e &loca passam a existir
	extract($_FILES); // $arquivo passa a existir
	
	//header("Location: ../index.php?loca=$loca");

	$sql = "SELECT id as id_loca, loca FROM localidades WHERE :loca = loca";
	$stm = getConnection()->prepare($sql);
	$stm->bindValue(':loca', $loca, PDO::PARAM_STR);	

	if($stm->execute()){
 		$row = $stm->fetch(PDO::FETCH_ASSOC);
 		if(!$row){
 			header($config['LOCATION']);		
		}
		extract($row); //$id_loca passa a existir
		

		$aux= explode("T", $tipo);
		if(!(count($aux)==2 && !$aux[0])){
			header($config['LOCATION']);
		}
		
		$tipo = $aux[1];
		$sql = "SELECT * FROM ocorre WHERE :id_loca = loca AND :tipo = tipo" ;
		$stm2 = getConnection()->prepare($sql);
		$stm2->bindValue(':id_loca', $id_loca, PDO::PARAM_STR);
		$stm2->bindValue(':tipo', $tipo, PDO::PARAM_STR);
		
		if($stm2->execute()){
			$row = $stm2->fetch(PDO::FETCH_ASSOC);
			if(!$row){
				header($config['LOCATION']);	
			}	
		}
		else{	
			header($config['LOCATION']);
		}
		$stm2->closeCursor();


	}
	else{
		header($config['LOCATION']);
	}

	


	

	$type_image = $_FILES["arquivo"]["type"]; 
	$finalDir = "arquivos";

	$name = $_FILES["arquivo"]["name"];
	$name = strtolower($name);

	preg_match('/^(.*?)(\.\w+)?$/', $name, $matches);
	$name = $matches[1];
	$extension = isset($matches[2]) ? $matches[2] : '';
	$name = preg_replace('/\s+/', '_', $name);
	$name = preg_replace('/[^\w]/', '', $name);

	if (($extension != '') && (!preg_match('/^\.\w+$/', $extension))){
		die("Extensão ruim do arquivo");
	}
	if(!($type_image=='image/pjpeg' || $type_image=='image/jpeg' || $type_image=='image/jpg' || $type_image=='image/png')){
		header($config['LOCATION']);
	}

	$suffix = '';
	while (file_exists("../$finalDir/$name$suffix$extension")){
		if ($suffix == '')
	    	$suffix = '1';
		else 
	    	$suffix++;    
	} 

	$name = "$name$suffix$extension";
	$temp_name = $_FILES['arquivo']['tmp_name'];
	


	if($name){
		$file = "../$finalDir/$name";

		if ($type_image== 'image/jpeg' || $type_image=='image/jpeg' || $type_image=='image/pjpeg') {
        	$image = imagecreatefromjpeg($temp_name);
    	}else{
    	    $image = imagecreatefrompng($temp_name);
    	}
    	

		$razao = (imagesx($image)*imagesy($image)) / 921600;
		if($razao<1.1){
			$razao = 1;
		}

		$qualidade = (int) round(100/$razao);
    	if($razao==1){
    		move_uploaded_file($temp_name, $file);	
    	}else{
			if ($type_image== 'image/jpeg' || $type_image=='image/jpeg' || $type_image=='image/pjpeg') {
	    		imagejpeg($image, $file, $qualidade);
	    	}else{
	    		imagepng($image, $file, $qualidade);
	    	}
    	}
		
		$file = "./$finalDir/$name";
	
	}
	else{
		$file = NULL;
	}




	$sql = "INSERT INTO imagens (imagem) VALUES (:imagem)";
	$stm = getConnection()->prepare($sql);
	$stm->bindValue(':imagem',$file,PDO::PARAM_STR);
	$stm->execute();

	$sql = "SELECT id as id_imagem FROM imagens WHERE :imagem = imagem ";
	$stm = getConnection()->prepare($sql);
	$stm->bindValue(':imagem',$file,PDO::PARAM_STR);
	
	if($stm->execute()){
		$row = $stm->fetch(PDO::FETCH_ASSOC);
		extract($row); //$id_imagem passa a existir
	}else{
		header($config['LOCATION']);
	}


	$sql = "INSERT INTO chamados (tipo,descr,loca,data_ab,imagem) VALUES (:tipo,:descr,:loca,CURDATE(),:imagem)";
	$stm = getConnection()->prepare($sql);
	$stm->bindValue(':tipo',$tipo,PDO::PARAM_STR);
	$stm->bindValue(':descr',$descr,PDO::PARAM_STR);
	$stm->bindValue(':loca',$id_loca,PDO::PARAM_STR);
	$stm->bindValue(':imagem',$id_imagem,PDO::PARAM_STR);
	$stm->execute();
	$stm->closeCursor();
	header("Location: ../index.php?id=$id_loca");
?>
