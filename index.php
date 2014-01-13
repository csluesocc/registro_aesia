<!DOCTYPE html>
<html ng-app>
	<head>
		<title>Registro y asistencia | AESIA</title>
		<meta charset="utf-8"/>
				<link href="public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
		<link href="public/css/main.css" rel="stylesheet" media="all" type="text/css"/>
		<link href="public/css/asistencia/main.css" rel="stylesheet" media="all" type="text/css"/>
		<script type="text/javascript" src="public/js/jquery.min.js"></script>		
		<script type="text/javascript" src="public/js/bootstrap.min.js"></script>		
        <script type="text/javascript" src="public/js/admin/angular.js"></script>
        <script type="text/javascript" src="public/js/validar.js"></script>
        <script type="text/javascript" src="public/js/main.js"></script>
        <script type="text/javascript" src="public/js/admin/controllerEventos.js"></script>
        <script type="text/javascript" src="public/js/admin/controllerRegistro.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="top_level">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" id="home" href="index.php">Registro y asistencia</a>
		  </div>
		
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">
		    	<li id='lnIndex'><a href="index.php">Registrar</a></li>
		    	<li id='lnTaller'><a href="index.php?op=taller">Talleres</a></li>
		    	<li id='lnPonencia'><a href="index.php?op=ponencia">Ponencias</a></li>		      	              			
		    </ul>		     
		  </div><!-- /.navbar-collapse -->
		</nav>	<br>		
<?php
	if(empty($_GET)===false){
		if(isset($_GET['op'])){			
			$opcion = $_GET['op'];
			if($opcion=="taller"){				
				include('views/talleres.php');
			}elseif($opcion=="ponencia"){
				include('views/ponencias.php');
			}			
		}		
	}else{
		include('views/registro.php');
	}
?>
	</body>
</html>