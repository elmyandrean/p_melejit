<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">NIP</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Email</th>
        <th class="text-center">Telp/HP</th>
        <th class="text-center">Position</th>
        <th class="text-center">Cabang</th>
        <th class="text-center" width="15%">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->nip}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->phone}}</td>
        <td>{{$user->position}}</td>
        <td>{{$user->branch->name}}</td>
        <td class="text-center">
          <form action="{{route('users.destroy', $user->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-default btn-xs" onclick="resetPassword('{{$user->id}}', this)" title="Reset Password"><i class="fa fa-refresh"></i></button>
            <button type="button" class="btn btn-warning btn-xs" title="Edit User" onclick="modalEdit('{{$user->id}}')"><i class="fa fa-edit"></i></button>
            <button type="submit" class="btn btn-danger btn-xs delete-button" title="Delete User" data-userid="{{$user->id}}"><i class="fa fa-trash"></i></button>
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
      text: "Once deleted, you will not be able to recover this User!",
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
            swal("Success", "User has ben deleted!")
            loadData();
          }
        });
      }
    });
    
  });

  // $(".reset-password").click(function(e){
  //   e.preventDefault();

  //   swal({
  //     title: "Are you sure?",
  //     text: "One the password is resetted, the password is back to default!",
  //     icon: "warning",
  //     buttons: true,
  //     dangerMode: true,
  //   })
  //   .then((willDelete) => {
  //     if (willDelete) {
  //       var data =  $(this).closest("form").serialize();
  //       var url =  $(this).closest("form").attr('action')+'/reset_password';

  //       $.ajax({
  //         type: "PUT",
  //         url: url,
  //         data: data,
  //         dataType: "JSON",
  //         success: function(data){
  //           swal("Success", "Password has ben resetted!")
  //           loadData();
  //         }
  //       });
  //     }
  //   });
  // });
</script>