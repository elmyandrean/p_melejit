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
            <li class="active"><a href="#csr_branch_reguler" data-toggle="tab">CSR</a></li>
            <li><a href="#officer_branch_reguler" data-toggle="tab">MKA/BO/SPV/Officer</a></li>
            <li><a href="#security_branch_reguler" data-toggle="tab">Security</a></li>
            <li><a href="#teller_branch_reguler" data-toggle="tab">Teller</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="csr_branch_reguler">
              <table class="table table-hover" id="table_csr_regular">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($csr_rank_regulars as $csr)
                  @if($i <= 6 && $csr->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$csr->kode}}</td>
                    <td>{{$csr->name}}</td>
                    <td>{{$csr->user->user_name}}</td>
                    <td>{{$csr->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="officer_branch_reguler">
              <table class="table table-hover" id="table_officer_regular">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($officer_rank_regulars as $officer)
                  @if($i <= 6 && $officer->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$officer->kode}}</td>
                    <td>{{$officer->name}}</td>
                    <td>{{$officer->user->user_name}}</td>
                    <td>{{$officer->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="security_branch_reguler">
              <table class="table table-hover" id="table_security_regular">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($security_rank_regulars as $security)
                  @if($i <= 6 && $security->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$security->kode}}</td>
                    <td>{{$security->name}}</td>
                    <td>{{$security->user->user_name}}</td>
                    <td>{{$security->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="teller_branch_reguler">
              <table class="table table-hover" id="table_teller_regular">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($teller_rank_regulars as $teller)
                  @if($i <= 6 && $teller->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$teller->kode}}</td>
                    <td>{{$teller->name}}</td>
                    <td>{{$teller->user->user_name}}</td>
                    <td>{{$teller->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
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
          <div class="tab-content">
            <div class="tab-pane active" id="csr_branch_mikro">
              <table class="table table-hover" id="table_csr_mikro">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($csr_rank_mikros as $csr)
                  @if($i <= 6 && $csr->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$csr->kode}}</td>
                    <td>{{$csr->name}}</td>
                    <td>{{$csr->user->user_name}}</td>
                    <td>{{$csr->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="officer_branch_mikro">
              <table class="table table-hover" id="table_officer_mikro">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($officer_rank_mikros as $officer)
                  @if($i <= 6 && $officer->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$officer->kode}}</td>
                    <td>{{$officer->name}}</td>
                    <td>{{$officer->user->user_name}}</td>
                    <td>{{$officer->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="security_branch_mikro">
              <table class="table table-hover" id="table_security_mikro">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($security_rank_mikros as $security)
                  @if($i <= 6 && $security->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$security->kode}}</td>
                    <td>{{$security->name}}</td>
                    <td>{{$security->user->user_name}}</td>
                    <td>{{$security->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="teller_branch_mikro">
              <table class="table table-hover" id="table_teller_mikro">
                <thead>
                  <tr>
                    <th width="5%">Ranking</th>
                    <th>Kode Cabang</th>
                    <th>Nama Cabang</th>
                    <th>Nama</th>
                    <th>Poin</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;?>
                  @foreach($teller_rank_mikros as $teller)
                  @if($i <= 6 && $teller->user)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$teller->kode}}</td>
                    <td>{{$teller->name}}</td>
                    <td>{{$teller->user->user_name}}</td>
                    <td>{{$teller->point}}</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.tab-pane -->
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
  $('#table_csr_regular').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: CSR'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: CSR'
        },
    ]
  });

  $('#table_officer_regular').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: MKA/BO/SPV/Officer'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: MKA/BO/SPV/Officer'
        },
    ]
  });

  $('#table_security_regular').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: Security'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: Security'
        },
    ]
  });

  $('#table_teller_regular').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: Teller'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Reguler Jabatan: Teller'
        },
    ]
  });

  $('#table_csr_mikro').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: CSR'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: CSR'
        },
    ]
  });

  $('#table_officer_mikro').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: MKA/BO/SPV/Officer'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: MKA/BO/SPV/Officer'
        },
    ]
  });

  $('#table_security_mikro').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: Security'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: Security'
        },
    ]
  });

  $('#table_teller_mikro').DataTable({
    paging: false, 
    info: false,
    dom: 'Bfrtip',
    buttons: [
        {
          extend: 'excel',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: Teller'
        },
        {
          extend: 'pdf',
          messageTop: 'Data Ranking Cabang Mikro Jabatan: Teller'
        },
    ]
  });
</script>
@endsection