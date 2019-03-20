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
      <label class="control-label col-md-3">Product Holding</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="name" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Product Content</label>
      <div class="col-md-8">
        <div class="radio" style="padding-top:0px;">
          <label class="control-label radio-inline"><input type="radio" name="product_content" onclick="productContent(this.value)" value="y">Ada</label>
          <label class="control-label radio-inline"><input type="radio" name="product_content" onclick="productContent(this.value)" value="n">Tidak Ada</label>
        </div>
      </div>
    </div>
    <div class="form-group" id="pc_yes" style="display: none">
      <div class="col-md-offset-3 col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Name</th>
              <th class="text-center" width="21%">Point</th>
              <th class="text-center" width="10%">#</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
          <tfoot>
            <tr>
              <td style="padding-left: 0px;"><input type="text" class="form-control" placeholder="Nama Product Content" id="pc_name"></td>
              <td><input type="numeric" class="form-control" placeholder="Point" id="pc_point"></td>
              <td><button class="btn btn-default"><i class="fa fa-plus"></i></button></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="form-group" id="pc_no" style="display: none">
      <label class="label-control col-md-3">Point</label>
      <div class="col-md-8">
        <input type="numeric" class="form-control" name="no_point">
        <input type="hidden" name="no_name" value="-">
      </div>
    </div>
    <div class="form-group text-right">
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

  function productContent(data)
  {
    if (data == 'y') {
      document.getElementById('pc_no').style.display = 'none';
      document.getElementById('pc_yes').style.display = 'block';
    } else if(data == 'n') {
      document.getElementById('pc_no').style.display = 'block';
      document.getElementById('pc_yes').style.display = 'none';
    }
  }
</script>