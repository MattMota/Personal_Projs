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
	    <link href="CSS/manutencao.css" rel="stylesheet" type="text/css" />
	    <script src="JS/jquery-3.2.1.js"></script>
	    <script src="JS/jquery-ui-1.8.7.custom.min.js"></script>
	    <script src="JS/jquery.autocomplete-1.1.js"></script>
	    <script src="JS/manutencao.js"></script>
	</head>
	<body>
		<div class="frame-container">
			<div class="row-fluid">
				<nav class="navbar navbar-fixed-top">
					<div class="col-sm-12">
						<h2>
							Chamados de Sustentabilidade
						</h2>
						<button id="config">
							Reabrir chamado(s)
						</button>
						<hr>
					</div>
				</nav>
			</div>
			<div class="row-fluid" id="chamados">
				<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<?php 
						$fe = 1;
						include "./PHP/escreve.php";
					?>
				</div>
				<div class="col-sm-1"></div>
			</div>
		</div>
	</body>
</html>