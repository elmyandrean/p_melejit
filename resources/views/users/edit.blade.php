<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">Create New User</h4>
</div>
<div class="modal-body">
	<form action="{{route('user.update', $user->id)}}" class="form-horizontal" id="form_user">
		@csrf
		@method('PUT')

		<div class="form-group">
			<label class="control-label col-md-2">NIP</label>
			<div class="col-md-7">
				<input type="text" class="form-control" name="nip" value="{{$user->nip}}">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">Nama Lengkap</label>
			<div class="col-md-7">
				<input type="text" class="form-control" name="name" value="{{$user->name}}">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">Email</label>
			<div class="col-md-7">
				<input type="text" class="form-control" name="email" value="{{$user->email}}">
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-md-2">Posisi</label>
			<div class="col-md-7">
				<input type="text" class="form-control" name="position" value="{{$user->position}}">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-offset-2 col-md-7">
				<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
				<button class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
			</div>
		</div>
	</form>
</div>

<script src="{{asset('js/custom.js')}}"></script>
	
<script type="text/javascript">
	$("#form_user").submit(function(){
	    event.preventDefault();

	    var data = $('#form_user').serialize();

	    $.ajax({
			url: '{{route('user.update', $user->id)}}',
			type: 'PUT', 
			data: data,
			success: function(data) {
				$("#modal").modal('hide');

				load_data_user('{{route('data.get_user')}}');
			}
		});

	    return false;
	});
</script>