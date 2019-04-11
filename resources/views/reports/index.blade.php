@extends('layouts.app')

@section('title', 'Report')

@section('css')
  <!-- Date Range -->
  <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Report Form</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="{{route('data.reports')}}" class="form-horizontal" id="formReport" method="POST">
          @csrf
          <div class="form-group">
            <label class="control-label col-md-2">Cabang</label>
            <div class="col-md-6">
              <select name="branch_id" class="form-control" id="branch_id">
                <option selected disabled>- Pilih Cabang -</option>
                @foreach($branchs as $branch)
                <option value="{{$branch->id}}">{{$branch->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-2">Tanggal Data Report</label>
            <div class="col-md-6">
              <input type="text" class="form-control" id="report_range" name="report_range">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
              <button class="btn btn-primary">Tampilkan</button>
              <button type="button" class="btn btn-default" onclick="clearData();">Clear</button>
            </div>
          </div>
        </form>

        <div id="report-result"></div>
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
  <!-- Date Range -->
  <script src="{{asset('adminlte/bower_components/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
@endsection

@section('script')
  <script type="text/javascript">
    $(function(){
      $('#report_range').daterangepicker({
        locale:{
          format: 'DD-MM-YYYY',
        }
      });
    })

    $("#formReport").submit(function(e){
      e.preventDefault();

      if ($("#branch_id").val() == null || $("#date_range").val() == '') {
        alert("Cabang atau Tanggal Report belum terisi");
      } else {
        var data = $("#formReport").serialize();
        var url = $("#formReport").attr('action');

        $('#report-result').html(loadingHTML);
        $('#report-result').load(url+"?"+data);
      }
    });

    function clearData(){
      event.preventDefault();
      $("#report-result").html('');
    }
  </script>
@endsection