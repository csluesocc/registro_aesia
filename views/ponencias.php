<div class="container contenido" ng-controller="getEventosCtrl" data-ng-init="init()" data-id="ponencia">
	<h2>Ponencias</h2>
	<div class="panel-group" id="accordion">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a  class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	          Dia #1 - Lunes 
	        </a>	        
	      </h4>	      
	    </div>
	    <div id="collapseOne" class="panel-collapse collapse in">
	      <div class="panel-body">
	      	<div class="table-responsive">
		        <table class="table table-striped" data-ng-init="getLunes()">
	  				<thead>
	  					<tr>
	  						<th>Titulo</th>
	  						<th>Area</th>
	  						<th>Lugar</th>
	  						<th>Inicio</th>
	  						<th>Fin</th>
	  					</tr>	  					
	  				</thead>
	  				<tbody>
	  					<tr ng-repeat="row in dataLu">	  						
	  						<td>{{row.titulo}}</td>
	  						<td>{{row.area}}</td>
	  						<td>{{row.lugar}}</td>
	  						<td>{{row.hora_inicio}}</td>
	  						<td>{{row.hora_fin}}</td>
	  					</tr>
	  				</tbody>
				</table>
				<a href ng-click="irA('lunes')" class="btn btn-primary pull-right">Asistencia dia Lunes</a>
			</div>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a  class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
	          Dia #2 - Martes
	        </a>
	      </h4>
	    </div>
	    <div id="collapseTwo" class="panel-collapse collapse">
	      <div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped" data-ng-init="getMartes()">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Area</th>
							<th>Lugar</th>
							<th>Inicio</th>
							<th>Fin</th>
						</tr>
					</thead>
					<tbody>
	  					<tr ng-repeat="row in dataMa">	  						
	  						<td>{{row.titulo}}</td>
	  						<td>{{row.area}}</td>
	  						<td>{{row.lugar}}</td>
	  						<td>{{row.hora_inicio}}</td>
	  						<td>{{row.hora_fin}}</td>
	  					</tr>
	  				</tbody>
				</table>
				<a href ng-click="irA('martes')" class="btn btn-primary pull-right">Asistencia dia martes</a>
			</div>
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a  class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
	          Dia #3 - Miercoles
	        </a>
	      </h4>
	    </div>
	    <div id="collapseThree" class="panel-collapse collapse">
	      <div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped" data-ng-init="getMiercoles()">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Area</th>
							<th>Lugar</th>
							<th>Inicio</th>
							<th>Fin</th>
						</tr>
					</thead>
					<tbody>
	  					<tr ng-repeat="row in dataMi">	  						
	  						<td>{{row.titulo}}</td>
	  						<td>{{row.area}}</td>
	  						<td>{{row.lugar}}</td>
	  						<td>{{row.hora_inicio}}</td>
	  						<td>{{row.hora_fin}}</td>
	  					</tr>
	  				</tbody>
				</table>
				<a href ng-click="irA('miercoles')" class="btn btn-primary pull-right">Asistencia dia miercoles</a>
			</div>
	      </div>
	    </div>
	  </div>
	  
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a  class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
	          Dia #4 - Jueves
	        </a>
	      </h4>
	    </div>
	    <div id="collapseFour" class="panel-collapse collapse">
	      <div class="panel-body">
	      	<div class="table-responsive">
				<table class="table table-striped" data-ng-init="getJueves()">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Area</th>
							<th>Lugar</th>
							<th>Inicio</th>
							<th>Fin</th>
						</tr>
					</thead>
					<tbody>
	  					<tr ng-repeat="row in dataJu">	  						
	  						<td>{{row.titulo}}</td>
	  						<td>{{row.area}}</td>
	  						<td>{{row.lugar}}</td>
	  						<td>{{row.hora_inicio}}</td>
	  						<td>{{row.hora_fin}}</td>
	  					</tr>
	  				</tbody>
				</table>
				<a href ng-click="irA('jueves')" class="btn btn-primary pull-right">Asistencia dia Jueves</a>
			</div>
	      </div>
	    </div>
	  </div>
	  
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
	          Dia #5 - Viernes
	        </a>
	      </h4>
	    </div>
	    <div id="collapseFive" class="panel-collapse collapse">
	      <div class="panel-body">
	      	<div class="table-responsive">
				<table class="table table-striped" data-ng-init="getViernes()">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Area</th>
							<th>Lugar</th>
							<th>Inicio</th>
							<th>Fin</th>
						</tr>
					</thead>
					<tbody>
	  					<tr ng-repeat="row in dataVi">	  						
	  						<td>{{row.titulo}}</td>
	  						<td>{{row.area}}</td>
	  						<td>{{row.lugar}}</td>
	  						<td>{{row.hora_inicio}}</td>
	  						<td>{{row.hora_fin}}</td>
	  					</tr>
	  				</tbody>
				</table>
				<a href ng-click="irA('viernes')" class="btn btn-primary pull-right">Asistencia dia Viernes</a>
			</div>
	      </div>
	    </div>
	  </div>
	  
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a  class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
	          2do Congreso de investigación cientifica 
	        </a>
	      </h4>
	    </div>
	    <div id="collapseSix" class="panel-collapse collapse">
	      <div class="panel-body">
	      	<div class="table-responsive">
				<table class="table table-striped" data-ng-init="getCongresoInvestigacion()">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Area</th>
							<th>Lugar</th>
							<th>Inicio</th>
							<th>Fin</th>
						</tr>
					</thead>
					<tbody>
	  					<tr ng-repeat="row in dataVi2">	  						
	  						<td>{{row.titulo}}</td>
	  						<td>{{row.area}}</td>
	  						<td>{{row.lugar}}</td>
	  						<td>{{row.hora_inicio}}</td>
	  						<td>{{row.hora_fin}}</td>
	  					</tr>
	  				</tbody>
				</table>
				<a href ng-click="irA('congresoInvestigacion')" class="btn btn-primary pull-right">Asistencia dia Viernes</a>
			</div>
	      </div>
	    </div>
	  </div>
	  
	</div>
</div>