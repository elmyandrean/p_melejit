<div class="table-responsive">
  <table class="table" id="data-kkb">
    <thead>
      <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Product Content</th>
        <th class="text-center">Nama Nasabah</th>
        <th class="text-center">Nama FL</th>
        <th class="text-center">Branch</th>
        <th class="text-center">Status</th>
        <th class="text-center">Kondisi</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($kkbs as $kkb)
      <tr>
        <td class="text-center">{{date('d-m-Y', strtotime($kkb->date_serve))}}</td>
        <td class="text-center">{{$kkb->product_content->product_holding->name}}</td>
        <td>{{$kkb->customer_name}}</td>
        <td>{{$kkb->user->name}}</td>
        <td class="text-center">{{$kkb->user->branch->name}}</td>
        <td class="text-center">{{$kkb->condition}}</td>
        <td class="text-center">{{$kkb->status}}</td>
        <td class="text-center">
          <form action="{{route('kkbs.destroy', $kkb->id)}}" method="POST">
            @csrf
            {{-- @method('DELETE') --}}
            <input type="hidden" name="_method" value="DELETE">
            @if(Auth::user()->type == 1 || Auth::user()->type == 4)
              @if($kkb->status == 'Pending')
              <button type="button" class="btn btn-warning btn-xs" title="Edit Data" onclick="modalEdit('{{$kkb->id}}')"><i class="fa fa-edit"></i></button>
              <button type="submit" class="btn btn-danger btn-xs delete-button" title="Delete User" data-userid="{{$kkb->id}}"><i class="fa fa-trash"></i></button>
              @else
              -
              @endif
            @elseif(Auth::user()->type == 2)
              @if($kkb->status != 'Approved')
              <button type="button" class="btn btn-xs btn-success approve-button" title="Approve Data" data-id="{{$kkb->id}}"><i class="fa fa-check"></i></button>
              <button type="button" class="btn btn-xs btn-danger delete-button" data-id="{{$kkb->id}}" title="Reject Data"><i class="fa fa-times"></i></button>
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
  $("#data-kkb").dataTable();

  $(".delete-button").click(function(e){
    e.preventDefault();
    
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this Alliance!",
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
            swal("Success", "Alliance has ben deleted!")
            loadData();
          }
        });
      }
    });
  });

  $(".approve-button").click(function(e){
    e.preventDefault();

    swal({
      title: "Are you sure?",
      text: "to Approve this Alliance!",
      icon: "warning",
      buttons: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var id = $(this).data('id');
        
        var data =  $(this).closest("form").serialize();
        var url =  baseUrl+'/kkbs/'+id+'/approve';

        $.ajax({
          type: "PUT",
          url: url,
          data: data,
          dataType: "JSON",
          success: function(data){
            swal("Success", "Alliance has ben approved!")
            loadData();
          }
        });
      }
    });

    // $(this).closest("[_method]").value = 'PUT';

  });
</script>