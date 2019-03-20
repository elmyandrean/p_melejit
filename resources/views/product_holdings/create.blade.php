<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Create Product Holding</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger" style="display:none"></div>

  <form action="{{route('product_holdings.store')}}" class="form-horizontal" method="POST" id="formInsert">
    @csrf
    <div class="form-group">
      <label class="control-label col-md-3">Nama Product Holding</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="name" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Menu</label>
      <div class="col-md-8">
        <select name="menu" class="form-control">
        	<option value="funding">Funding</option>
        	<option value="kkb">KKB</option>
        	<option value="kredit_retail">Kredit Retail</option>
        	<option value="transactional">Transactional</option>
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