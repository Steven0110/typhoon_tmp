<div class="menu">
	<div class="client">
		<h3 class="text-center title-icon"><span class="oi oi-person"></span></h3>
		<p class="text-center">
			@if($user->rol == 1)
				CLIENTE
			@else
				ADMINISTRADOR
			@endif
		</p>
		<h4 class="text-center">{{$user->name}}</h4>
		<br/>
		<br/>
	</div>
	<div class="options">
		<p><a href="#"><span class="oi oi-file"></span> ARCHIVOS</a></p>
		<p><a href="{{URL::route('logout')}}"><span class="oi oi-account-logout"></span> CERRAR SESIÓN</a></p>
	</div>
</div>