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
        <div class="box">
          <div class="box-body" id="piechart-alldata">
            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-6">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#funding" data-toggle="tab" onclick="loadData('funding')">Funding</a></li>
            <li><a href="#kkb" data-toggle="tab" onclick="loadData('alliance')">Alliance</a></li>
            <li><a href="#retail_credit" data-toggle="tab" onclick="loadData('retail_credit')">Kredit Retail</a></li>
            <li><a href="#transactional" data-toggle="tab" onclick="loadData('transactional')">Transactional</a></li>
          </ul>
          <div class="tab-content" id="data_history">
            
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
      </div>
      <!-- /.col -->
      <div class="col-md-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Rank FL This Month</h3>
          </div>
          <div class="box-body">
            <table class="table table-hover" id="rank_fl">
              <thead>
                <tr>
                  <th width="5%">Ranking</th>
                  <th>Nama</th>
                  <th>Poin</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;?>
                @foreach($ranks->sortByDesc('point') as $rank)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$rank->user_name}}</td>
                  <td>{{$rank->point}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('js')
<script src="{{asset('js/highchart/highcharts.js')}}"></script>
<script src="{{asset('js/highchart/modules/exporting.js')}}"></script>
<script src="{{asset('js/highchart/modules/export-data.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.18/b-1.5.6/b-html5-1.5.6/datatables.min.js"></script>
@endsection

@section('script')
  <script>
      // Pie Chart All Data
      Highcharts.chart('piechart-alldata', {
          chart: {
              plotBackgroundColor: null,
              plotBorderWidth: null,
              plotShadow: false,
              type: 'pie'
          },
          title: {
              text: 'Data Semua Transaksi'
          },
          subtitle: {
              text: 'Data sampai dengan Bulan {{date('F Y')}}'
          },
          tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
          },
          plotOptions: {
              pie: {
                  allowPointSelect: true,
                  cursor: 'pointer',
                  dataLabels: {
                      enabled: true,
                      format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                      style: {
                          color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                      }
                  }
              }
          },
          series: [{
              name: 'Transaction',
              colorByPoint: true,
              data: [{
                  name: 'Funding',
                  y: {{$fundings->all}}
              }, {
                  name: 'Alliance',
                  y: {{$kkbs->all}}
              }, {
                  name: 'Retail Kredit',
                  y: {{$retail_credits->all}}
              }, {
                  name: 'Transactional',
                  y: {{$transactionals->all}}
              }]
          }]
        }
    );

    $(document).ready(function() {
      loadData();
    });

    function loadData(product)
    {
      if (product) {
        var url = baseUrl+'/data/history/{{Auth::user()->branch_id}}?product='+product;
      } else {
        var url = baseUrl+'/data/history/{{Auth::user()->branch_id}}?product=funding';
      }
      $('#data_history').html(loadingHTML);
      $('#data_history').load(url);

      return false;
    }

    $('#rank_fl').DataTable({
      searching: false,
      paging: false, 
      info: false,
    });
  </script>
@endsection