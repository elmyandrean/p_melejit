<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Product Content</th>
        <th class="text-center">Nama Nasabah</th>
        <th class="text-center">Nama FL</th>
        <th class="text-center">Cabang</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fundings as $funding)
      <tr>
        <td class="text-center">{{date('d-m-Y', strtotime($funding->date_serve))}}</td>
        <td>{{$funding->product_content->product_holding->name}}</td>
        <td>{{$funding->customer_name}}</td>
        <td>{{$funding->user->name}}</td>
        <td>{{$funding->user->branch->name}}</td>
        <td>{{$funding->status}}</td>
        <td class="text-center">
          <form action="{{route('fundings.destroy', $funding->id)}}" method="POST">
            @csrf
            @method('DELETE')
            @if(Auth::user()->type == 1)
              @if($funding->status == 'pending')
              <button type="button" class="btn btn-warning btn-xs" title="Edit Data" onclick="modalEdit('{{$funding->id}}')"><i class="fa fa-edit"></i></button>
              <button type="submit" class="btn btn-danger btn-xs delete-button" title="Delete User" data-userid="{{$funding->id}}"><i class="fa fa-trash"></i></button>
              @else
              -
              @endif
            @elseif(Auth::user()->type == 2)
              @if($funding->status != 'approved')
              <button type="button" class="btn btn-xs btn-success approve-button" title="Approve Data" data-id="{{$funding->id}}"><i class="fa fa-check"></i></button>
              <button type="button" class="btn btn-xs btn-danger delete-button" data-id="{{$funding->id}}" title="Reject Data"><i class="fa fa-times"></i></button>
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
  $(".table").dataTable();

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

    document.getElementsByName('_method')[0].value = "PUT";

    var id = $(this).data('id');
    
    var data =  $(this).closest("form").serialize();
    var url =  baseUrl+'/fundings/'+id+'/approve';

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