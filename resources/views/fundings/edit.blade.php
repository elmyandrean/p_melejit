<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Create Funding</h4>
  </div>
  <div class="modal-body">
    <div class="alert alert-danger" style="display:none"></div>
  
    <form action="{{route('fundings.update', $funding->id)}}" class="form-horizontal" method="POST" id="formInsert">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label class="control-label col-md-3">Product Holding</label>
        <div class="col-md-8">
          <select name="product_holding" id="product_holding" class="form-control" onchange="getProductContent(this.value)">
            <option selected disabled>- Product Holding -</option>
            @foreach($product_holdings as $product_holding)
            <option value="{{$product_holding->id}}" {{$funding->product_content->product_holding->id == $product_holding->id ? "selected" : ""}}>{{$product_holding->name}}</option>
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
            <option value="{{$product_content->id}}" {{$funding->product_content->id == $product_content->id ? "selected" : ""}}>{{$product_content->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3">Cabang</label>
        <div class="col-md-8">
          <select name="branch" class="form-control">
            <option value="Cabang 1" {{$funding->branch == 'Cabang 1' ? "selected" : ""}}>Cabang 1</option>
            <option value="Cabang 2" {{$funding->branch == 'Cabang 2' ? "selected" : ""}}>Cabang 2</option>
            <option value="Cabang 3" {{$funding->branch == 'Cabang 3' ? "selected" : ""}}>Cabang 3</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3">Nama Nasabah</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="customer_name" value="{{$funding->customer_name}}">
        </div>
      </div>
      <div class="form-group" style="display:none;" id="view-account-number">
        <label class="control-label col-md-3">Nomor Rekening</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="account_number" id="account_number" value="{{$funding->account_number}}">
        </div>
      </div>
      <div class="form-group" style="display:none;" id="view-other">
        <label class="control-label col-md-3">Other</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="other" id="other" value="{{$funding->other}}">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-md-3">Setoran Awal</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="deposit" value="{{$funding->deposit}}">
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
      
      if(value == 'New Payroll'){
        $("#view-other").show();
        $("#view-account-number").hide();
  
        $("#account_number").val('');
      } else {
        $("#view-other").hide();
        $("#view-account-number").show();
  
        $("#other").val('');
      }
    }
  </script>