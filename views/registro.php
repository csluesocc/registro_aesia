<div id="registro">
            <div class="container">
                <div class="row" ng-controller="registroCtlr" data-ng-init="init()">
                	<h2>Registro de participantes</h2>
					<div class="col-md-5 pull-left" id="divForm">
						<div id="errorLog">
						</div>
	                    <form id="registro" method="POST">							
							<div class="form-group">
	                            <label for="id">Carnet:</label>
	                            <input type="text" valid-type="cod" required class="form-control " placeholder="Carnet" name="id" id="id"/>
	                        </div>
	                        <div class="form-group">
	                            <label for="nombres">Nombres:</label>
	                            <input type="text" valid-type="text" required class="form-control " placeholder="Nombres" name="nombre" id="nombre"/>
	                        </div>
	                        <div class="form-group">
	                            <label for="apellidos">Apellidos:</label>
	                            <input type="text"  valid-type="text" required class="form-control" placeholder="Apellidos" name="apellido" id="apellido"/>
	                        </div>
	                        <div class="form-group">
	                            <label for="email">Email:</label>
	                            <input type="email" valid-type="mail" required class="form-control" placeholder="Email" name="mail" id="mail" />
	                        </div>
	                        <div class="form-group">
	                            <label for="telefono">Telefono:</label>
	                            <input type="tel" valid-type="number" class="form-control" placeholder="22555555" name="tel" id="tel" />
	                        </div>
							<div class="form-group"  >
	                               <label for="tipo">Carrera:</label>
									<select name="carrera" id="carrera" required class="form-control" data-ng-init="getCarreras()">											
										<option ng-repeat="row in carreras" value="{{row.id}}">{{row.carrera}}</option>										
									</select>
							</div> 
	                        <div class="form-group">
	                            <label for="institucion">Institución:</label>
	                            <input type="tel" valid-type="text" required class="form-control" placeholder="Institución" name="insti" id="insti"/>
	                        </div>	
	                        <div class="form-group">
	                               <label for="tipo">Categoria:</label>
									<select name="categoria" id="categoria" required class="form-control" data-ng-init="getCategorias()">											
										<option ng-repeat="row in categorias" value="{{row.id}}">{{row.categoria}}</option>										
									</select>
							</div> 		
							<input type="submit" class="btn btn-primary btn-lg" value="Registrar" id="enviar"/>
	                   </form>
				</div>	
				<div class="col-md-7">
					<img src="public/imgs/congreso_logo.png" alt="Congreso" class="img-responsive" />
				</div>			
			</div>  <!-- row -->
		  </div>  <!-- Container-->
	</div>  <!-- principal-->
  </body>

</html>
