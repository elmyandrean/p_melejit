<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title">Edit Kredit Retail</h4>
</div>
<div class="modal-body">
  <div class="alert alert-danger" style="display:none"></div>

  <form action="{{route('retail_credits.update', $retail_credit->id)}}" class="form-horizontal" method="POST" id="formInsert">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label class="control-label col-md-3">Product Holding</label>
      <div class="col-md-8">
        <select name="product_holding" id="product_holding" class="form-control" onchange="getProductContent(this.value)">
          <option selected disabled>- Product Holding -</option>
          @foreach($product_holdings as $product_holding)
          <option value="{{$product_holding->id}}" {{$retail_credit->product_content->product_holding->id == $product_holding->id ? "selected" : ""}}>{{$product_holding->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Product Content</label>
      <div class="col-md-8">
        <select name="product_content_id" id="product_content_id" class="form-control" onchange="inputFunding()">
          <option selected  disabled>- Product Content -</option>
          @foreach($product_contents as $product_content)
          <option value="{{$product_content->id}}" {{$retail_credit->product_content->id == $product_content->id ? "selected" : ""}}>{{$product_content->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Nama Nasabah</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="customer_name" value="{{$retail_credit->customer_name}}">
      </div>
    </div>
    <div class="form-group" style="display:none;" id="view-account-number">
      <label class="control-label col-md-3">No. Rekening Gaji</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="account_number" id="account_number" value="{{$retail_credit->account_number}}">
      </div>
    </div>
    <div class="form-group" style="display:none;" id="view-nominal">
      <label class="control-label col-md-3">Nominal</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="nominal" id="nominal" value="{{$retail_credit->nominal}}">
      </div>
    </div>
    <div class="form-group" style="display:none;" id="view-limit">
      <label class="control-label col-md-3">Limit CC</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="limit" id="limit" value="{{$retail_credit->limit}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Tanggal Pelayanan</label>
      <div class="col-md-8">
        <input type="text" class="form-control" name="date_serve" id="datepicker" value="{{date('d-m-Y', strtotime($retail_credit->date_serve))}}">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3">Kondisi</label>
      <div class="col-md-8">
        <select name="condition" class="form-control">
          <option selected disabled>- Pilih Kondisi -</option>
          <option value="Pipeline" {{$retail_credit->condition == 'Pipeline' ? "selected" : ""}}>Pipeline</option>
          <option value="Closing" {{$retail_credit->condition == 'Closing' ? "selected" : ""}}>Closing</option>
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

<!-- bootstrap datepicker -->
<script src="{{asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script>
  $(document).ready(function () {
    inputFunding();
  })

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

  function getProductContent(id)
  {
    var url_link = baseUrl+"/data/"+id+"/product_content";
    $("#product_content_id").html('<option selected disabled>Loading...</option>')
    $.ajax({
      url: url_link,
      cache: false,
      success: function (msg) {
        $("#product_content_id").html(msg);

        inputFunding();
      }
    });
  }

  function inputFunding() {
    var value = $("#product_holding option:selected").text();
    
    if(value == 'KSM'){
      $("#view-account-number").show();
      $("#view-nominal").show();
      $("#view-limit").hide();

      $("#limit").val('');
    } else if(value == 'CC'){
      $("#view-account-number").hide();
      $("#view-nominal").hide();
      $("#view-limit").show();

      $("#account_number").val('');
      $("#nominal").val('');
    } else {
      $("#view-account-number").hide();
      $("#view-nominal").show();
      $("#view-limit").hide();

      $("#account_number").val('');
      $("#limit").val('');
    }
  }

  $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
  })
</script>