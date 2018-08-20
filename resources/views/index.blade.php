<!DOCTYPE html>
<html lang="es">
@include('skeleton/head')
<body class="login-page" style="overflow-x: hidden;">
	<div class="container-fluid p-0">
		@include('skeleton/header')
		<div class="row">
			<div class="col-md-12">
			</div>
		</div>
		<div class="login-container">
			<form action="{{URL::route('login')}}" method="POST">
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-12">
						<p class="text-center title-icon"><span class="oi oi-person"></span></p>
						<h4 class="text-center">Inicio de sesión</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="text" name="username" placeholder="Nombre de usuario" class="form-control" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input type="password" name="password" placeholder="Contraseña" class="form-control" />
						</div>
					</div>
				</div>
				@if(Session::has('mensaje_error'))

					<div class="row">
						<div class="col-md-12">
                        	<div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
                        </div>
                    </div>
                @endif
				<div class="row">
					<div class="col-md-12">
						<p class="text-center">
							<button type="submit" class="btn btn-login">
								<span class="oi oi-chevron-right"></span>
							</button>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="text-center">
							<small>Si tienes dudas o problemas para iniciar sesion, favor de comunicarte al correo soporte@typhoon.com.mx o al teléfono 5556578899</small>
						</p>
					</div>
				</div>
			</form>
		</div>

		@include('skeleton/footer')
	</div>
@include('skeleton/scripts')
</body>
</html>