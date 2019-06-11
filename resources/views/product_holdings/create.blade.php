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
          <option value="Funding">Funding</option>
          <option value="KKB">Alliance</option>
          <option value="Kredit Retail">Kredit Retail</option>
          <option value="Transactional">Transactional</option>
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
          <tbody id="data-content">
            
          </tbody>
          <tfoot>
            <tr>
              <td style="padding-left: 0px;"><input type="text" class="form-control" placeholder="Nama Product Content" id="pc_name"></td>
              <td><input type="numeric" class="form-control" placeholder="Point" id="pc_point"></td>
              <td><button class="btn btn-default" onclick="addRow()"><i class="fa fa-plus"></i></button></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="form-group" id="pc_no" style="display: none">
      <label class="control-label col-md-3">Point</label>
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
          // loadData();
          location.reload()
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

  function addRow(){
    event.preventDefault();

    var table = document.getElementById("data-content");
    var row = table.insertRow(-1);

    var jumlah_baris = document.getElementById("data-content").rows.length;
    jumlah_baris = jumlah_baris-2;
    jumlah_baris = jumlah_baris.toString();

    var pc_name = $("#pc_name").val();
    var pc_point = $("#pc_point").val();

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = pc_name+'<input type="hidden" name="yes_name[]" value="'+pc_name+'">';
    cell2.innerHTML = pc_point+'<input type="hidden" name="yes_point[]" value="'+pc_point+'">';
    cell3.innerHTML = '<a href="#" onclick="deleteRow(this); return false;"><i class="fa fa-trash"></i></a>';

    $("#pc_name").val('');
    $("#pc_point").val('');

    return false;
  }

  function deleteRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
</script>