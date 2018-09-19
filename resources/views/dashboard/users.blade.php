<div class="row">
	<div class="col-md-12 files-container">
		<div class="row">
			@forelse($users as $user)
			<div class="col-md-6 ">
				<div class="file-block">
					<a class="" href="/dashboard/admin/user/{{$user->id}}/all" style="display: block;">
						<span class="oi oi-person"></span>
						<span class="filename">{{$user->name}}</span>
					</a>
				</div>
			</div>
			@empty
			<div class="col-md-12">
				<h2 class="text-center">Sin usuarios</h2>
			</div>
			@endforelse
		</div>
	</div>
</div>