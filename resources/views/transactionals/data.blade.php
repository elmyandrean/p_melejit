<div class="table-responsive">
  <table class="table" id="data-transactional">
    <thead>
      <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Product Content</th>
        <th class="text-center">Nama Nasabah/Merchant</th>
        <th class="text-center">Nama FL</th>
        <th class="text-center">Branch</th>
        <th class="text-center">Kondisi</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($transactionals as $transactional)
      <tr>
        <td class="text-center">{{date('d-m-Y', strtotime($transactional->date_serve))}}</td>
        <td>{{$transactional->product_content->product_holding->name}}</td>
        <td>{{$transactional->customer_name == "" ? $transactional->merchant_name : $transactional->customer_name}}</td>
        <td>{{$transactional->user->name}}</td>
        <td>{{$transactional->user->branch->name}}</td>
        <td>{{$transactional->condition}}</td>
        <td>{{$transactional->status}}</td>
        <td class="text-center">
          <form action="{{route('transactionals.destroy', $transactional->id)}}" method="POST">
            @csrf
            @method('DELETE')
            @if(Auth::user()->type == 1)
              @if($transactional->status == 'Pending')
              <button type="button" class="btn btn-warning btn-xs" title="Edit Data" onclick="modalEdit('{{$transactional->id}}')"><i class="fa fa-edit"></i></button>
              <button type="submit" class="btn btn-danger btn-xs delete-button" title="Delete User" data-userid="{{$transactional->id}}"><i class="fa fa-trash"></i></button>
              @else
              -
              @endif
            @elseif(Auth::user()->type == 2)
              @if($transactional->status != 'Approved')
              <button type="button" class="btn btn-xs btn-success approve-button" title="Approve Data" data-id="{{$transactional->id}}"><i class="fa fa-check"></i></button>
              <button type="button" class="btn btn-xs btn-danger delete-button" data-id="{{$transactional->id}}" title="Reject Data"><i class="fa fa-times"></i></button>
              @else
              -
              @endif
            @endif
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  $("#data-transactional").dataTable();

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

  $(".approve-button").click(function(e){
    e.preventDefault();

    $(this).closest("[_method]").value = 'PUT';

    var id = $(this).data('id');
    
    var data =  $(this).closest("form").serialize();
    var url =  baseUrl+'/transactionals/'+id+'/approve';

    $.ajax({
      type: "PUT",
      url: url,
      data: data,
      dataType: "JSON",
      success: function(data){
        loadData();
      }
    });
  });
</script>