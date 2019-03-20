<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Edit Product Holding</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger" style="display:none"></div>

  <form action="{{route('product_holdings.update', $product_holding->id)}}" class="form-horizontal" method="POST" id="formEdit">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label class="control-label col-md-3">Nama Product Holding</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="name" value="{{$product_holding->name}}" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Menu</label>
      <div class="col-md-8">
        <select name="menu" class="form-control">
          <option value="funding" {{$product_holding->menu == 'funding' ? 'selected' : ''}}>Funding</option>
          <option value="kkb" {{$product_holding->menu == 'kkb' ? 'selected' : ''}}>KKB</option>
          <option value="kredit_retail" {{$product_holding->menu == 'kredit_retail' ? 'selected' : ''}}>Kredit Retail</option>
          <option value="transactional" {{$product_holding->menu == 'transactional' ? 'selected' : ''}}>Transactional</option>
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