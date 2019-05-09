@extends('layouts.app')

@section('title', 'User')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" >Data User</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary btn-sm pull-right" onclick="modalInsert()">
            New Data
          </button>
        </div>
      </div>
      <div class="box-body" id="data-user">
        
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
  <!-- DataTables -->
  <script src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    loadData();
  });

  function loadData()
  {
    var url = '{{route('data.users')}}';
    $('#data-user').html(loadingHTML);
    $('#data-user').load(url);

    return false;
  }

  function modalInsert()
  {
    var url = '{{route('users.create')}}';

    $("#modal").modal("show");
    $('#modal-content').html(loadingHTML);
    $('#modal-content').load(url);

    return false;
  }

  function modalEdit(id)
  {
    var url = baseUrl+'/users/'+id+'/edit';

    $("#modal").modal("show");
    $('#modal-content').html(loadingHTML);
    $('#modal-content').load(url);

    return false;
  }

  function resetPassword(id, elem)
  {
    event.preventDefault();
    
    swal({
      title: "Are you sure?",
      text: "One the password is resetted, the password is back to default!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data =  jQuery(elem).closest("form").serialize();
        var url =  jQuery(elem).closest("form").attr('action')+'/reset_password';

        $.ajax({
          type: "PUT",
          url: url,
          data: data,
          dataType: "JSON",
          success: function(data){
            swal("Success", "Password has ben resetted!")
            loadData();
          }
        });
      }
    }); 
  }

  function delteUser(id, elem)
  {
    event.preventDefault();
    
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this User!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data =  jQuery(elem).closest("form").serialize();
        var url =  jQuery(elem).closest("form").attr('action');

        $.ajax({
          type: "PUT",
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
  }
</script>
@endsection