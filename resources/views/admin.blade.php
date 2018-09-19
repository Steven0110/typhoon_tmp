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
				@include('dashboard.a_header')

				@include('dashboard.users')
			</div>
		</div>
	</div>
@include('skeleton.scripts')
</body>
<script type="text/javascript">
	$(document).ready(function(){
		//Add user modal
		$(".btn-add-user").on("click", function(){
			$(".add-user-modal").removeClass("d-none");
		});

		//Close user modal
		$(".add-user-modal .closer").on("click", function(){
			$(".add-user-modal").addClass("d-none");
		});
		//Validate form
		$("#submitForm").on("click", function(){
			if($("#psw1").val() == $("#psw2").val())
				$("#submit_trigger").click();
			else
				alert("Las contraseñas no coinciden");
		});
	});
</script>
</html>