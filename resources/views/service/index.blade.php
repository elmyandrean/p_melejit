@extends('layouts.app')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Service Page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title" style="padding-top:5px;">Data Service</h3>

        <div class="box-tools pull-right">
          <a href="{{route('service.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Data</a>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-hover" id="data-funding">
          <thead>
            <tr>
              <th>Nama Cabang</th>
              <th>Tanggal</th>
              <th>Nama FL</th>
              <th>Jabatan</th>
              <th>Konten</th>
              <th>Sub Konten</th>
              <th>Nilai / Waktu</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nama Cabang</td>
              <td>Nama Cabang</td>
              <td>Tanggal</td>
              <td>Nama FL</td>
              <td>Jabatan</td>
              <td>Konten</td>
              <td>Sub Konten</td>
              <td>Nilai / Waktu</td>
              <td>Status</td>
              <td>Opsi</td>
            </tr>
            <tr>
              <td>Nama Cabang</td>
              <td>Nama Cabang</td>
              <td>Tanggal</td>
              <td>Nama FL</td>
              <td>Jabatan</td>
              <td>Konten</td>
              <td>Sub Konten</td>
              <td>Nilai / Waktu</td>
              <td>Status</td>
              <td>Opsi</td>
            </tr>
            <tr>
              <td>Nama Cabang</td>
              <td>Nama Cabang</td>
              <td>Tanggal</td>
              <td>Nama FL</td>
              <td>Jabatan</td>
              <td>Konten</td>
              <td>Sub Konten</td>
              <td>Nilai / Waktu</td>
              <td>Status</td>
              <td>Opsi</td>
            </tr>
          </tbody>
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
@endsection

@section('script')
<script>
  $(function(){
    $('#data-funding').DataTable();
  })
</script>
@endsection