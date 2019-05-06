@extends('layouts.app')

@section('title', 'Kredit Retail')

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
        <h3 class="box-title" >Data Kredit Retail</h3>
        @if(Auth::user()->type == 1 || Auth::user()->type == 4)
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-primary btn-sm pull-right" onclick="modalInsert()">
            New Data
          </button>
        </div>
        @endif
      </div>
      <div class="box-body" id="data-reatil-credits">
        
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
    var url = '{{route('data.retail_credits')}}';
    $('#data-reatil-credits').html(loadingHTML);
    $('#data-reatil-credits').load(url);

    return false;
  }

  function modalInsert()
  {
    var url = '{{route('retail_credits.create')}}';

    $("#modal").modal("show");
    $('#modal-content').html(loadingHTML);
    $('#modal-content').load(url);

    return false;
  }

  function modalEdit(id)
  {
    var url = baseUrl+'/retail_credits/'+id+'/edit';

    $("#modal").modal("show");
    $('#modal-content').html(loadingHTML);
    $('#modal-content').load(url);

    return false;
  }
</script>
@endsection