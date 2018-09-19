<h4 class="text-center">
	Documentación de {{$_user->name}}
	<div class="add-files">
		<button class="btn btn-primary btn-add-files">+ Agregar nuevo archivo</button>
	</div>
</h4>

<div class="add-files-modal d-none">
	<form action="/dashboard/uploadFileToUser" method="POST" enctype="multipart/form-data">
		<div class="closer">
			<span><strong>X</strong></span>
		</div>
		{{csrf_field()}}

		<input type="text" class="d-none" name="user_id" value="{{$_user->id}}"/>

		<div class="row mb-2 mt-3">
			<div class="col-md-12">
				<h3>Agregar archivo</h3>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<button class="btn btn-block btn-upload" id="upload-trigger" type="button">Elegir archivo</button>
				<input type="file" class="d-none" id="upload-file" name="file" required="required" />
				<input type="text" class="d-none" id="org" name="original_filename"/>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<h4>Ícono:</h4>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 text-center">
						<img src="/storage/file0.png" height="30" width="30"/>
						<input type="radio" name="type" value="0" required="required"/>
					</div>
					<div class="col-md-4 text-center">
						<img src="/storage/file1.png" height="30" width="30"/>
						<input type="radio" name="type" value="1" required="required"/>
					</div>
					<div class="col-md-4 text-center">
						<img src="/storage/file2.png" height="30" width="30"/>
						<input type="radio" name="type" value="2" required="required"/>
					</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-md-12">
				<button class="btn btn-lg btn-block btn-add" type="submit">Agregar</button>
			</div>
		</div>
	</form>
</div>


<div class="delete-file-modal d-none">
	<form action="/dashboard/deleteFile" method="POST">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-12">
				<h3>¿Esá seguro de borrar el archivo <span class="filename_e"></span>?</h3>
				<h5>Ésta acción no se puede deshacer</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<button type="button" class="btn btn-danger btn-block" id="cancel_e">Cancelar</button>
			</div>
			<div class="col-md-6">
				<button type="submit" class="btn btn-block btn-del">Sí, borrar</button>
			</div>
		</div>
		<input type="text" class="d-none" name="file_id" id="file_id" value="" />
	</form>
</div>