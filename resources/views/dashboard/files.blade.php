<div class="row">
	<div class="col-md-12 files-container">
		<div class="row">
			@forelse($files as $file)
			<div class="col-md-6 ">
				<div class="file-block">
					<a class="file" href="/storage/{{$file->filename}}">
						<span class="oi oi-rss-alt"></span>
						<span class="filename">{{$file->original_filename}}</span>
					</a>
					<button type="button" class="btn btn-danger btn-erase float-right" data-id="{{$file->id}}" data-name="{{$file->original_filename}}">X</button>
				</div>
			</div>
			@empty
			<div class="col-md-12">
				<h2 class="text-center">Sin archivos</h2>
			</div>
			@endforelse
		</div>
	</div>
</div>