<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Create User</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger" style="display:none"></div>

  <form action="{{route('users.store')}}" class="form-horizontal" method="POST" id="formInsert">
    @csrf
    <div class="form-group">
      <label class="control-label col-md-3">NIP</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="nip" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Nama Lengkap</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="name" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Email</label>
      <div class="col-md-8">
        <input type="email" class="form-control" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Telp/HP</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="phone">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Jabatan</label>
      <div class="col-md-8">
        <select name="position" class="form-control" required="">
          <option selected disabled>-Pilih Jabatan-</option>
          <option value="CSR">CSR</option>
          <option value="MKA/BO/SPV/OFFICER">MKA/BO/SPV/OFFICER</option>
          <option value="Security">Security</option>
          <option value="Teller">Teller</option>
          <option value="Kepala Cabang">Kepala Cabang</option>
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
  $("#formInsert").submit(function(e){
    e.preventDefault();
    
    var data = $("#formInsert").serialize();
    var url = $("#formInsert").attr('action');

    $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "JSON",
      success: function(data){
        if (data.status == 'errors') {
          $('.alert-danger').html('');
          $.each(data.message, function(key, value){
            $('.alert-danger').show();
            $('.alert-danger').append('<p>'+value+'</p>');
          });
        } else if(data.status == 'success') {
          document.getElementById('formInsert').reset();
          $("#modal").modal("hide");
          loadData();
        }
      }
    });
  });
</script>