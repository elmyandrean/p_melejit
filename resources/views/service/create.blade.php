@extends('layouts.app')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Create Service
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('service.index')}}"><i class="fa fa-dashboard"></i> Service</a></li>
      <li class="active">Create</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">New Data Service</h3>
      </div>
      <div class="box-body">
        <form action="{{route('funding.store')}}" method="POST" class="form-horizontal">
          @csrf
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
            <label for="nama_fl" class="control-label col-md-2">Nama Front Liner</label>
            <div class="col-md-6">
              <select name="nama_fl" id="nama-fl" class="form-control">
                <option selected disabled>Pilih Nama Front Liner</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="posisi_jabatan" class="control-label col-md-2">Jabatan / Posisi</label>
            <div class="col-md-6">
              <select name="posisi_jabatan" id="posisi-jabatan" class="form-control">
                <option selected disabled>Pilih Posisi Jabatan</option>
                <option value="Giro">CSR</option>
                <option value="Tabungan">CSO</option>
                <option value="Payroll">TELLER</option>
                <option value="Payroll">SECURITY</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="content" class="control-label col-md-2">Content</label>
            <div class="col-md-6">
              <select name="content" id="content" class="form-control">
                <option selected disabled>Pilih Content</option>
                <option value="Giro">Buka Rekening</option>
                <option value="Tabungan">Setor Tunai</option>
                <option value="Payroll">Tarik Tunai</option>
                <option value="Payroll">Debet Rekening</option>
                <option value="Payroll">Tanya Info TRX ATM</option>
                <option value="Payroll">E-SSAS</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="content" class="control-label col-md-2">Nilai</label>
            <div class="col-md-6">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-2 col-md-6">
              <button class="btn btn-primary">Simpan</button>
              <a href="{{route('funding.index')}}" class="btn btn-warning">Batal</a>
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
      if(value == "Payroll"){
        $('#non-payroll').hide();
        $('#payroll').show();
      } else {
        $('#non-payroll').show();
        $('#payroll').hide();
      }
    }
  </script>
@endsection