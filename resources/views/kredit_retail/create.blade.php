@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create New Core
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('kredit_retail.index')}}"><i class="fa fa-dashboard"></i> Newcore</a></li>
      <li class="active">Create</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">New Data Core</h3>
      </div>
      <div class="box-body">
        <form action="{{route('kredit_retail.store')}}" method="POST" class="form-horizontal">
          @csrf
          <div class="form-group">
            <label for="product_holding" class="control-label col-md-2">Product Holding</label>
            <div class="col-md-6">
              <select name="product_holding" id="product-holding" class="form-control" onchange="changeProduct(this.value);">
                <option selected disabled>Pilih Product Holding</option>
                <option value="Manidiri Tunas Finance">Manidiri Tunas Finance</option>
                <option value="Consumer Loan">Consumer Loan</option>
                <option value="Mikro">Mikro</option>
                <option value="SME">SME</option>
                <option value="MUF">MUF</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="product_content" class="control-label col-md-2">Product Content</label>
            <div class="col-md-6">
              <select name="product_content" id="product-content" class="form-control">
                <option selected disabled>Pilih Product Content</option>
                <option value="Giro">Giro</option>
                <option value="Tabungan">Tabungan</option>
                <option value="Payroll">Payroll</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="source_customer" class="control-label col-md-2">Source Customer</label>
            <div class="col-md-6">
              <select name="source_customer" id="source-customer" class="form-control">
                <option selected disabled>Pilih Source Customer</option>
                <option value="Giro">Referal Customer</option>
                <option value="Tabungan">Walk in Customer</option>
                <option value="Payroll">Pipeline Source From Area</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="branch" class="control-label col-md-2">Branch</label>
            <div class="col-md-6">
              <select name="branch" id="branch" class="form-control">
                <option selected disabled>Pilih Branch</option>
                <option value="Giro">Referal Customer</option>
                <option value="Tabungan">Walk in Customer</option>
                <option value="Payroll">Pipeline Source From Area</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="posisi_jabatan" class="control-label col-md-2">Posisi Jabatan</label>
            <div class="col-md-6">
              <select name="posisi_jabatan" id="posisi-jabatan" class="form-control">
                <option selected disabled>Pilih Posisi Jabatan</option>
                <option value="Giro">Referal Customer</option>
                <option value="Tabungan">Walk in Customer</option>
                <option value="Payroll">Pipeline Source From Area</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label for="nama_nasabah" class="control-label col-md-2">Nama Nasabah</label>
            <div class="col-md-6">
              <input type="text" class="form-control" name="nama_nasabah" id="nama-nasabah">
            </div>
          </div>
          <div id="default" style="display: block">
            <div class="form-group">
              <label for="limit_penjualan" class="control-label col-md-2">Limit Penjualan</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="limit_penjualan" id="limit-penjualan">
              </div>
            </div>
            <div class="form-group">
              <label for="jenis_kendaraan" class="control-label col-md-2">Jenis Kendaraan</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="jenis_kendaraan" id="jenis-kendaraan">
              </div>
            </div>
          </div>
          <div id="consumer_loan" style="display:none;">
            <div class="form-group">
              <label for="nominal_referal" class="control-label col-md-2">Nominal Referal</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="nominal_referal" id="nominal-referal">
              </div>
            </div>
          </div>
          <div id="mikro" style="display:none;">
            <div class="form-group">
              <label for="limit_ksm" class="control-label col-md-2">Limit KSM</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="limit_ksm" id="limit-ksm">
              </div>
            </div>
          </div>
          <div id="sme" style="display:none;">
            <div class="form-group">
              <label for="nominal_referal_sme" class="control-label col-md-2">Nominal Referal</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="nominal_referal_sme" id="nominal-referal-sme">
              </div>
            </div>
            <div class="form-group">
              <label for="follow_up_oleh" class="control-label col-md-2">Follow Up Oleh</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="follow_up_oleh" id="follow-up-oleh">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
              <button class="btn btn-primary">Simpan</button>
              <a href="{{route('kredit_retail.index')}}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
@endsection

@section('script')
  <script type="text/javascript">
    function changeProduct(value){
      if(value == "Consumer Loan"){
        $('#default').hide();
        $('#consumer_loan').show();
        $('#mikro').hide();
        $('#sme').hide();
      } else if(value == "Mikro") {
        $('#default').hide();
        $('#consumer_loan').hide();
        $('#mikro').show();
        $('#sme').hide();
      } else if(value == "SME") {
        $('#default').hide();
        $('#consumer_loan').hide();
        $('#mikro').hide();
        $('#sme').show();
      } else {
        $('#default').show();
        $('#consumer_loan').hide();
        $('#mikro').hide();
        $('#sme').hide();
      }
    }
  </script>
@endsection