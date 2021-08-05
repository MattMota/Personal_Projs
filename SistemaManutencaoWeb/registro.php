<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<title>Chamados de Sustentabilidade</title>
		<meta name="viewport" content="width=device-width" />
	    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css" rel="stylesheet">
	    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	    <link href="CSS/registro.css" rel="stylesheet" type="text/css" />
	    <script src="JS/jquery-3.2.1.js"></script>
	    <script src="JS/jquery-ui-1.8.7.custom.min.js"></script>
	    <script src="JS/jquery.autocomplete-1.1.js"></script>
	    <script src="JS/registro.js"></script>
	</head>
	<body>
		<div class="frame container">
			<div class="row-fluid">
				<div class="col-sm-12">
					<h2>
						Chamados de Sustentabilidade
					</h2>
					<hr>
				</div>
			</div>
			<form action="PHP/envia.php" method="post" enctype="multipart/form-data">
				<div class="row-fluid">
					<div class="col-sm-12">
						<br>
						<div id="ocorrencia" class="titulo">
							Ocorrência
						</div>
						<select id="tipo" name="tipo" class="form-group" required>
						  	<option selected disabled value="">Defina uma ocorrência</option>
							<?php include "./PHP/select.php";?>
						</select>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12">
						<div class="titulo">
							Descrição
						</div>
						<textarea id="descr" name="descr" placeholder="<?=array_key_exists('descr', $_REQUEST) ? $_REQUEST['descr'] : ''; ?>"></textarea>
					</div>	
				</div>
				<div class="row-fluid">
					<div class="col-sm-12" id="local">
						<div class="titulo">
							Localidade
						</div>
						<textarea id="loca" name="loca" readonly><?php echo $loca;?></textarea>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12 foto">
						<div>
							Adicionar Foto
						</div>
						<label>
							<img src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-camera-512.png" id="thumb">
							<input type="file" name="arquivo" id="arquivo" accept="image/*" capture="camera" style="display: none !important;" />
						</label>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-sm-12  form-bottom-buttons">
						<label id="enviar">
							Enviar<input type="submit" style="display: none !important;">
						</label>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>