@extends('layouts.app')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-html5-1.5.6/datatables.min.css"/>
<style>
  div.dt-buttons {
    float: left;
  }
</style>
@endsection

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
            <span class="info-box-text">{{$fundings->this_month}} Transaksi</span>
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
            <span class="info-box-text">{{$kkbs->this_month}} Transaksi</span>
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
            <span class="info-box-text">{{$retail_credits->this_month}} Transaksi</span>
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
            <span class="info-box-text">{{$transactionals->this_month}} Transaksi</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- Default box -->

    <div class="row">
      <div class="col-md-6">
        <h4>Rank Cabang Reguler</h4>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#csr_branch_reguler" data-toggle="tab" onclick="loadDataRegular('CSR')">CSR</a></li>
            <li><a href="#officer_branch_reguler" data-toggle="tab" onclick="loadDataRegular('Officer')">MKA/BO/SPV/Officer</a></li>
            <li><a href="#security_branch_reguler" data-toggle="tab" onclick="loadDataRegular('Security')">Security</a></li>
            <li><a href="#teller_branch_reguler" data-toggle="tab" onclick="loadDataRegular('Teller')">Teller</a></li>
          </ul>
          <div class="tab-content" id="data_regular">

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      <!-- /.col -->

      <div class="col-md-6">
        <h4>Rank Cabang Mikro</h4>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#csr_branch_mikro" data-toggle="tab">CSR</a></li>
            <li><a href="#officer_branch_mikro" data-toggle="tab">MKA/BO/SPV/Officer</a></li>
            <li><a href="#security_branch_mikro" data-toggle="tab">Security</a></li>
            <li><a href="#teller_branch_mikro" data-toggle="tab">Teller</a></li>
          </ul>
          <div class="tab-content" id="data_mikro">
            
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-html5-1.5.6/datatables.min.js"></script>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    loadDataRegular();
    loadDataMikro();
  });

  function loadDataRegular(position)
  {
    if (position) {
      var url = baseUrl+'/data/ranking?branch_type=regular&position='+position;
    } else {
      var url = baseUrl+'/data/ranking?branch_type=regular&position=CSR';
    }
    $('#data_regular').html(loadingHTML);
    $('#data_regular').load(url);

    return false;
  }

  function loadDataMikro(position)
  {
    if (position) {
      var url = baseUrl+'/data/ranking?branch_type=mikro&position='+position;
    } else {
      var url = baseUrl+'/data/ranking?branch_type=mikro&position=CSR';
    }
    $('#data_mikro').html(loadingHTML);
    $('#data_mikro').load(url);

    return false;
  }
</script>
@endsection