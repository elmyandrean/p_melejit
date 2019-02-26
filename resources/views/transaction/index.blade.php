@extends('layouts.app')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaction Page
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
        <h3 class="box-title" style="padding-top:5px;">Data Transaction</h3>

        <div class="box-tools pull-right">
          <a href="{{route('transaction.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New Data</a>
        </div>
      </div>
      <div class="box-body">
        <table class="table table-hover" id="data-funding">
          <thead>
            <tr>
              <th>Nama Cabang</th>
              <th>Tanggal</th>
              <th>Konten Produk</th>
              <th>Nama Nasabah</th>
              <th>Source Customer</th>
              <th>No. Rekening</th>
              <th>Komitmen Penambahan Dana</th>
              <th>Nama FL</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Nama Cabang</td>
              <td>Tanggal</td>
              <td>Konten Produk</td>
              <td>Nama Nasabah</td>
              <td>Source Customer</td>
              <td>No. Rekening</td>
              <td>Komitmen Penambahan Dana</td>
              <td>Nama FL</td>
              <td>Status</td>
              <td>Opsi</td>
            </tr>
            <tr>
              <td>Nama Cabang</td>
              <td>Tanggal</td>
              <td>Konten Produk</td>
              <td>Nama Nasabah</td>
              <td>Source Customer</td>
              <td>No. Rekening</td>
              <td>Komitmen Penambahan Dana</td>
              <td>Nama FL</td>
              <td>Status</td>
              <td>Opsi</td>
            </tr>
            <tr>
              <td>Nama Cabang</td>
              <td>Tanggal</td>
              <td>Konten Produk</td>
              <td>Nama Nasabah</td>
              <td>Source Customer</td>
              <td>No. Rekening</td>
              <td>Komitmen Penambahan Dana</td>
              <td>Nama FL</td>
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