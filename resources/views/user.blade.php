<!DOCTYPE html>
<html lang="es">
@include('skeleton.head')
<body style="overflow-x: hidden;background-color: #E8E8E8;">
	<div class="container-fluid p-0 h-100">
		@include('skeleton.header')
		<div class="row h-100">
			<div class="col-md-2 admin-menu h-100">
				@include('dashboard.menu')
			</div>
			<div class="col-md-10 admin-header p-0">
				@include('dashboard.header')

				@include('dashboard.file-icons')

				@include('dashboard.files')
			</div>
		</div>
	</div>
@include('skeleton.scripts')
</body>
</html>