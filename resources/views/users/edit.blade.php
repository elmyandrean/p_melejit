<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Edit User [NIP: {{$user->name}}]</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger" style="display:none"></div>

  <form action="{{route('users.update', $user->id)}}" class="form-horizontal" method="POST" id="formEdit">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label class="control-label col-md-3">NIP</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="nip" value="{{$user->nip}}" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Nama Lengkap</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="name" value="{{$user->name}}" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Email</label>
      <div class="col-md-8">
        <input type="email" class="form-control" name="email" value="{{$user->email}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Telp/HP</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Position</label>
      <div class="col-md-8">
        <select name="position" class="form-control" required="">
          <option selected disabled>-Pilih Jabatan-</option>
          <option value="CSR" {{ $user->position == 'CSR' ? 'selected' : ''}}>CSR</option>
          <option value="MKA/BO/SPV/OFFICER" {{ $user->position == 'MKA/BO/SPV/OFFICER' ? 'selected' : ''}}>MKA/BO/SPV/OFFICER</option>
          <option value="Security" {{ $user->position == 'Security' ? 'selected' : ''}}>Security</option>
          <option value="Teller" {{ $user->position == 'Teller' ? 'selected' : ''}}>Teller</option>
          <option value="Kepala Cabang" {{ $user->position == 'Kepala Cabang' ? 'selected' : ''}}>Kepala Cabang</option>
          <option value="Administrator" {{ $user->position == 'Administrator' ? 'selected' : ''}}>Administrator</option>
          <option value="User Assistant" {{ $user->position == 'User Assistant' ? 'selected' : ''}}>User Assistant</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Cabang</label>
      <div class="col-md-8">
        <select name="branch_id" class="form-control" required="">
          <option selected disabled>-Pilih Cabang-</option>
          @foreach($branches as $branch)
          <option value="{{$branch->id}}" {{$user->branch_id == $branch->id ? 'selected' : ''}}>{{$branch->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-3 col-md-8">
        <button class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </form>
</div>

<script>
  $("#formEdit").submit(function(e){
    e.preventDefault();
    
    var data = $("#formEdit").serialize();
    var url = $("#formEdit").attr('action');

    $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "JSON",
      success: function(data){
        if (data.status == 'errors') {
          $.each(data.message, function(key, value){
            $('.alert-danger').show();
            $('.alert-danger').append('<p>'+value+'</p>');
          });
        } else if(data.status == 'success') {
          document.getElementById('formEdit').reset();
          $("#modal").modal("hide");
          loadData();
        }
      }
    });
  });
</script>