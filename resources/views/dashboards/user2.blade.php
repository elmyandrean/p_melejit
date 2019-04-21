@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Transaksi
      <small>per {{date('d-m-Y')}}</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-envelope"></i></span>

          <div class="info-box-content">
            <span class="info-box-number">Funding</span>
            <span class="info-box-text">760 Transaksi</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-handshake-o"></i></span>

          <div class="info-box-content">
            <span class="info-box-number">Alliance</span>
            <span class="info-box-text">760 Transaksi</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-calculator"></i></span>

          <div class="info-box-content">
            <span class="info-box-number">Retail Credit</span>
            <span class="info-box-text">760 Transaksi</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-number">Transactional</span>
            <span class="info-box-text">760 Transaksi</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- Default box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
