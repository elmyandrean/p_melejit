<div class="table-responsive">
  <table class="table" id="data-productcontent">
    <thead>
      <tr>
        <th class="text-center">Menu</th>
        <th class="text-center">Nama Product Holding</th>
        <th class="text-center" width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($product_holdings as $ph)
      <tr>
        <td>{{$ph->menu}}</td>
        <td>{{$ph->name}}</td>
        <td class="text-center">
          <form action="{{route('product_holdings.destroy', $ph->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-warning btn-xs" title="Edit Product Holding" onclick="modalEdit('{{$ph->id}}')"><i class="fa fa-edit"></i></button>
            <button type="submit" class="btn btn-danger btn-xs delete-button" title="Delete Product Holding" data-userid="{{$ph->id}}"><i class="fa fa-trash"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  $("#data-productcontent").dataTable();

  $(".delete-button").click(function(e){
    e.preventDefault();
    
    var data =  $(this).closest("form").serialize();
    var url =  $(this).closest("form").attr('action');

    $.ajax({
      type: "POST",
      url: url,
      data: data,
      dataType: "JSON",
      success: function(data){
        loadData();
      }
    });
  });
</script>