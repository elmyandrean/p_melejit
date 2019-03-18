@extends('layouts.app')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      User Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="padding-top:5px;">Data User</h3>

        <div class="box-tools pull-right">
          <a href="#" class="btn btn-primary" onclick="showModal();"><i class="fa fa-plus"></i> New Data</a>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-hover" id="data_user">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Position</th>
              <th>#</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection

@section('js')
  <!-- DataTables -->
  <script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <!-- Custom JS -->
  <script src="{{asset('js/custom.js')}}"></script>
@endsection

@section('script')
<script>
  $(document).ready(function(){
    load_data_user('{{route('data.get_user')}}');
  });

  $(function(){
    $('#data-funding').DataTable();
  })

  function showModal()
  {
    var url = '{{route('user.create')}}';
    
    $("#modal").modal({
      backdrop: 'static',
      keyboard: false
    },
    "show");
    $('#modal-content').html(loadingHtml);
    $('#modal-content').load(url,function(data){
      if(data!=""){
        //$('#lampiran_id').html('');
      }
      else{
        //alert(id);
        //$('#notifInsert').html(failText);
      }
    });

    return false;
  }

  function showModalEditUser(id)
  {
    var url = base_url+"/user/"+id+"/edit";
    $("#modal").modal({
      backdrop: 'static',
      keyboard: false
    },
    "show");
    $('#modal-content').html(loadingHtml);
    $('#modal-content').load(url,function(data){
      if(data!=""){
        //$('#lampiran_id').html('');
      }
      else{
        //alert(id);
        //$('#notifInsert').html(failText);
      }
    });

    return false;
  }

  function deleteUser(id)
  {
    var url = base_url+"/user/"+id;
  }
</script>
@endsection