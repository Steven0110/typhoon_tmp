<h4 class="text-center">
	Usuarios
	<div class="add-users">
		<button class="btn btn-add-user">+ Agregar nuevo usuario</button>
	</div>
</h4>


<div class="add-user-modal d-none">
	<form action="/dashboard/addUser" method="POST" id="userForm">
		<button class="d-none" type="submit" id="submit_trigger"></button>
		<div class="closer">
			<span><strong>X</strong></span>
		</div>
		{{csrf_field()}}
		<div class="row mb-2 mt-3">
			<div class="col-md-12">
				<h3>Agregar usuario</h3>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Nombre:</label>
					<input type="text" name="name" class="form-control" required="required">
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label">Correo:</label>
					<input type="email" name="email" class="form-control" required="required">
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Contraseña:</label>
					<input type="password" id="psw1" name="password" class="form-control" required="required">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="control-label">Repetir contraseña:</label>
					<input type="password" id="psw2" name="password" class="form-control" required="required">
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-6">
				<button class="btn btn-danger" type="button">Cancelar</button>
			</div>
			<div class="col-md-6">
				<button class="btn btn-success" type="button" id="submitForm">Agregar</button>
			</div>
		</div>
	</form>
</div>
