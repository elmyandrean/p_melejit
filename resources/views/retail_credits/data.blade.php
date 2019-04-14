<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Product Content</th>
        <th class="text-center">Nama Nasabah</th>
        <th class="text-center">Nama FL</th>
        <th class="text-center">Branch</th>
        <th class="text-center">Kondisi</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($retail_credits as $retail_credit)
      <tr>
        <td class="text-center">{{date('d-m-Y', strtotime($retail_credit->date_serve))}}</td>
        <td class="text-center">{{$retail_credit->product_content->product_holding->name}}</td>
        <td>{{$retail_credit->customer_name}}</td>
        <td>{{$retail_credit->user->name}}</td>
        <td class="text-center">{{$retail_credit->user->branch->name}}</td>
        <td class="text-center">{{$retail_credit->condition}}</td>
        <td class="text-center">{{$retail_credit->status}}</td>
        <td class="text-center">
          <form action="{{route('retail_credits.destroy', $retail_credit->id)}}" method="POST">
            @csrf
            @method('DELETE')
            @if(Auth::user()->type == 1)
              @if($retail_credit->status == 'Pending')
              <button type="button" class="btn btn-warning btn-xs" title="Edit Data" onclick="modalEdit('{{$retail_credit->id}}')"><i class="fa fa-edit"></i></button>
              <button type="submit" class="btn btn-danger btn-xs delete-button" title="Delete User" data-userid="{{$retail_credit->id}}"><i class="fa fa-trash"></i></button>
              @else
              -
              @endif
            @elseif(Auth::user()->type == 2)
              @if($retail_credit->status != 'Approved')
              <button type="button" class="btn btn-xs btn-success approve-button" title="Approve Data" data-id="{{$retail_credit->id}}"><i class="fa fa-check"></i></button>
              <button type="button" class="btn btn-xs btn-danger delete-button" data-id="{{$retail_credit->id}}" title="Reject Data"><i class="fa fa-times"></i></button>
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

<!-- SweetAlert -->
<script src="{{asset('js/sweetalert.min.js')}}"></script>

<script>
  $(".table").dataTable();

  $(".delete-button").click(function(e){
    e.preventDefault();
    
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Retail Credit!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data =  $(this).closest("form").serialize();
        var url =  $(this).closest("form").attr('action');

        $.ajax({
          type: "POST",
          url: url,
          data: data,
          dataType: "JSON",
          success: function(data){
            swal("Success", "Retail Credit has ben deleted!")
            loadData();
          }
        });
      }
    });
  });

  $(".approve-button").click(function(e){
    e.preventDefault();

    $(this).closest("[_method]").value = 'PUT';

    var id = $(this).data('id');
    
    var data =  $(this).closest("form").serialize();
    var url =  baseUrl+'/retail_credits/'+id+'/approve';

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