<?php
  	if(empty($_GET)===false){  		
		if(isset($_GET['op']) && empty($_GET['op'])===false){			
			$opcion = $_GET['op'];			
			if($opcion=='taller'){
				if(isset($_GET['id']) && empty($_GET['id'])===false){
					$id = $_GET['id'];
				}
				if(isset($_GET['titulo']) && empty($_GET['titulo'])===false){
					$titulo = $_GET['titulo'];
				}
			}elseif($opcion=='ponencia'){
				if(isset($_GET['fecha']) &&  empty($_GET['fecha'])===false){
					$fecha = $_GET['fecha'];
				}
			}			
		}		
	} 
?>
<!DOCTYPE html>
<html ng-app>
	<head>
		<title>Registro y asistencia | AESIA</title>
		<meta charset="utf-8"/>
		<link href="../public/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
		<link href="../public/css/main.css" rel="stylesheet" media="all" type="text/css"/>
		<link href="../public/css/asistencia/main.css" rel="stylesheet" media="all" type="text/css"/>
		<script type="text/javascript" src="../public/js/jquery.min.js"></script>
		<script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../public/js/admin/angular.js"></script>
        <script type="text/javascript" src="../public/js/admin/controllerParticipantes.js"></script>     
        <script type="text/javascript" src="../public/js/main.js"></script>         
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="top_level">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="navbar-ex1-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" id="home" href="../index.php">Registro y asistencia</a>
		  </div>
		
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse navbar-ex1-collapse">
		    <ul class="nav navbar-nav">
		    	<li id='lnIndex'><a href="../index.php">Registrar</a></li>
		    	<li id='lnTaller'><a href="../index.php?op=taller">Talleres</a></li>
		    	<li id='lnPonencia'><a href="../index.php?op=ponencia">Ponencias</a></li>		      	              			
		    </ul>		     
		  </div><!-- /.navbar-collapse -->
		</nav>	<br>		
		
		<div class="container contenido" ng-controller="getParticipantesCtrl" data-ng-init="init()" 
		data-evento=" <?php echo $opcion;?>" data-criterio=" <?php echo (empty($fecha)===FALSE)?$fecha:$id;?>">
			<h1>Pasar asistencia a <?php echo $opcion;?> (<?php echo (empty($fecha)===FALSE)?$fecha:$titulo;?>)</h1>			
			<div class="row">
				<div class="col-md-4 search-bar pull-right">					
					<input type="text" ng-model="searchText" ng-change="search()" class="form-control" placeholder="Buscar Estudiante">
				</div>
			</div><br/>
			<div class="table-responsive">
		        <table class="table table-striped table-bordered table-hover table-condensed" data-ng-init="getDataParticipantes()">
	  				<thead>
	  					<tr>	  						
	  						<th>Cernet</th>
	  						<th>Nombre</th>
	  						<th>Apellido</th>
	  						<th>Carrera</th>
	  						<th></th>	  						
	  					</tr>	  					
	  				</thead>
	  				<tbody>
	  					<tr ng-repeat="row in pagedData[currentPage] | filter:searchText">	 	  						 						
	  						<td>{{row.carnet}}</td>
	  						<td>{{row.nombre}}</td>
	  						<td>{{row.apellido}}</td>
	  						<td>{{row.carrera}}</td>
	  						<td>
	  							<a href class="btn btn-primary btn-xs"  data="{{row.carnet}}" ng-click="tomarAsistencia(row.carnet)">Asistencia</a>
	  						</td>
	  					</tr>
	  				</tbody>
				</table>
				<div class="pagination pull-right">
					<ul class="pagination pagination-sm"  ng-class="{disabled: currentPage == 0}">
					  <li><a href ng-click="prevPage()">&laquo;</a></li>
					  <li ng-repeat="n in range(pagedData.length)" ng-class="{active: n == currentPage}" ng-click="setPage()">
					  	<a href ng-bind="n + 1">1</a>
					  </li>					  
					  <li  ng-class="{disabled: currentPage == pagedData.length - 1}">
					  	<a href ng-click="nextPage()">&raquo;</a>
					  </li>
					</ul>
              	</div>
			</div>
		</div>
	</body>
</html>