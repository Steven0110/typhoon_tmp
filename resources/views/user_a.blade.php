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
				@include('dashboard.u_header')

				@include('dashboard.u_file-icons')

				@include('dashboard.files')
			</div>
		</div>
	</div>
@include('skeleton.scripts')
</body>
<script type="text/javascript">
	$(document).ready(function(){
		//Trigger file upload
		$("#upload-trigger").on("click", function(){
			$("#upload-file").click();
		});

		//Change file name on view
		$("#upload-file").on("change", function(){
			$("#upload-trigger").text( $("#upload-file")[0].files[0].name );
			$("#org").val( $("#upload-file")[0].files[0].name );
		});

		//Show Modal
		$(".btn-add-files").on("click", function(){
			$(".add-files-modal").removeClass("d-none");
		});

		//Close odal
		$(".add-files-modal .closer").on("click", function(){
			$(".add-files-modal").addClass("d-none");
		});

		//Show Delete object modal
		$(".btn-erase").on("click", function(e){
			e = $(e.currentTarget);
			$(".filename_e").text(e.attr("data-name"));
			$(".delete-file-modal").removeClass("d-none");
			$("#file_id").val(e.attr("data-id"));
		});

		//Hide Delete object modal
		$("#cancel_e").on("click", function(){
			$(".delete-file-modal").addClass("d-none");
			$(".filename_e").text("");
		});
	});
</script>
</html>