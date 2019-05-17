<div class="table-responsive">
  <table class="table" id="data-transactional">
    <thead>
      <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Product Content</th>
        <th class="text-center">Nama Nasabah/Merchant</th>
        @if(Auth::user()->type == 2)
        <th class="text-center">Nomor Rekening</th>
        @endif
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
        <td>
          @if($transactional->customer_name != "" && $transactional->merchant_name == "")
            {{$transactional->customer_name}}
          @elseif($transactional->customer_name == "" && $transactional->merchant_name != "")
            {{$transactional->merchant_name}}
          @elseif($transactional->customer_name != "" && $transactional->merchant_name != "")
            {{$transactional->customer_name." / ".$transactional->merchant_name}}
          @else
            - 
          @endif
        </td>
        @if(Auth::user()->type == 2)
        <td class="text-ceenter">{{$transactional->account_number}}</td>
        @endif
        <td>{{$transactional->user->name}}</td>
        <td>{{$transactional->user->branch->name}}</td>
        <td>{{$transactional->condition}}</td>
        <td>{{$transactional->status}}</td>
        <td class="text-center">
          <form action="{{route('transactionals.destroy', $transactional->id)}}" method="POST">
            @csrf
            @method('DELETE')
            @if(Auth::user()->type == 1 || Auth::user()->type == 4)
              @if($transactional->status == 'Pending')
              <button type="button" class="btn btn-warning btn-xs" title="Edit Data" onclick="modalEdit('{{$transactional->id}}')"><i class="fa fa-edit"></i></button>
              <button type="submit" class="btn btn-danger btn-xs delete-button"  onclick="deleteButton('{{$transactional->id}}', this)" title="Delete User" data-userid="{{$transactional->id}}"><i class="fa fa-trash"></i></button>
              @else
              -
              @endif
            @elseif(Auth::user()->type == 2)
              @if($transactional->status != 'Approved')
              <button type="button" class="btn btn-xs btn-success approve-button" onclick="approvedButton('{{$transactional->id}}', this)" title="Approve Data" data-id="{{$transactional->id}}"><i class="fa fa-check"></i></button>
              <button type="button" class="btn btn-xs btn-danger delete-button" data-id="{{$transactional->id}}"  onclick="deleteButton('{{$transactional->id}}', this)" title="Reject Data"><i class="fa fa-times"></i></button>
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
  $("#data-transactional").dataTable();

  // $(".delete-button").click(function(e){
  //   e.preventDefault();
    
  //   swal({
  //     title: "Are you sure?",
  //     text: "Once deleted, you will not be able to recover this Transactional!",
  //     icon: "warning",
  //     buttons: true,
  //     dangerMode: true,
  //   })
  //   .then((willDelete) => {
  //     if (willDelete) {
  //       var data =  $(this).closest("form").serialize();
  //       var url =  $(this).closest("form").attr('action');

  //       $.ajax({
  //         type: "POST",
  //         url: url,
  //         data: data,
  //         dataType: "JSON",
  //         success: function(data){
  //           swal("Success", "Transactional has ben deleted!")
  //           loadData();
  //         }
  //       });
  //     }
  //   });
  // });

  // $(".approve-button").click(function(e){
  //   e.preventDefault();

  //   swal({
  //     title: "Are you sure?",
  //     text: "to Approve this Transactional!",
  //     icon: "warning",
  //     buttons: true,
  //   })
  //   .then((willDelete) => {
  //     if (willDelete) {
  //       var id = $(this).data('id');
        
  //       var data =  $(this).closest("form").serialize();
  //       var url =  baseUrl+'/transactionals/'+id+'/approve';

  //       $.ajax({
  //         type: "PUT",
  //         url: url,
  //         data: data,
  //         dataType: "JSON",
  //         success: function(data){
  //           swal("Success", "Transactional has ben approved!")
  //           loadData();
  //         }
  //       });
  //     }
  //   });

  //   // $(this).closest("[_method]").value = 'PUT';

  // });
</script>