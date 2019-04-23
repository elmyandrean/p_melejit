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
            <li class="active"><a href="#funding" data-toggle="tab">Funding</a></li>
            <li><a href="#kkb" data-toggle="tab">Alliance</a></li>
            <li><a href="#retail_credit" data-toggle="tab">Kredit Retail</a></li>
            <li><a href="#transactional" data-toggle="tab">Transactional</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="funding">

            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="kkb">
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="retail_credit">
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="transactional">
              
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
<script src="{{asset('js/highchart/highcharts.js')}}"></script>
<script src="{{asset('js/highchart/modules/exporting.js')}}"></script>
<script src="{{asset('js/highchart/modules/export-data.js')}}"></script>
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
    });

    // Bar Chart Funding
    Highcharts.chart('funding', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Data Funding 6 Bulan Terakhir'
        },
        subtitle: {
            text: 'Data sampai dengan Bulan {{date('F Y')}}'
        },
        xAxis: {
            categories: [
              @foreach($periodes as $periode)
                '{{ $periode->bulan_text }}',
              @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
          @foreach($fundings->product_holdings as $product_holding)
          {
            name: '{{$product_holding->ph_name}}',
            data: [
              @foreach($product_holding->periodes as $periode)
                  {{$periode->jumlah_transaksi}},
              @endforeach
            ]
          },
          @endforeach
        ]
    });

    // Bar Chart KKB
    Highcharts.chart('kkb', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Data Alliance 6 Bulan Terakhir'
        },
        subtitle: {
            text: 'Data sampai dengan Bulan {{date('F Y')}}'
        },
        xAxis: {
            categories: [
              @foreach($periodes as $periode)
                '{{ $periode->bulan_text }}',
              @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
          @foreach($kkbs->product_holdings as $product_holding)
          {
            name: '{{$product_holding->ph_name}}',
            data: [
              @foreach($product_holding->periodes as $periode)
                  {{$periode->jumlah_transaksi}},
              @endforeach
            ]
          },
          @endforeach
        ]
    });

    // Bar Chart Retail Credit
    Highcharts.chart('retail_credit', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Data Retail Kredit 6 Bulan Terakhir'
        },
        subtitle: {
            text: 'Data sampai dengan Bulan {{date('F Y')}}'
        },
        xAxis: {
            categories: [
              @foreach($periodes as $periode)
                '{{ $periode->bulan_text }}',
              @endforeach
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
          @foreach($retail_credits->product_holdings as $product_holding)
          {
            name: '{{$product_holding->ph_name}}',
            data: [
              @foreach($product_holding->periodes as $periode)
                  {{$periode->jumlah_transaksi}},
              @endforeach
            ]
          },
          @endforeach
        ]
    });

    // Bar Chart Transactional
    Highcharts.chart('transactional', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Data Transactional 6 Bulan Terakhir'
        },
        subtitle: {
            text: 'Data sampai dengan Bulan {{date('F Y')}}'
        },
        xAxis: {
            categories: [
              @foreach($periodes as $periode)
                '{{ $periode->bulan_text }}',
              @endforeach
            ],
        },
        yAxis: {
            title: {
                text: 'Jumlah Transaksi'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [
          @foreach($transactionals->product_holdings as $product_holding)
          {
            name: '{{$product_holding->ph_name}}',
            data: [
              @foreach($product_holding->periodes as $periode)
                  {{$periode->jumlah_transaksi}},
              @endforeach
            ]
          },
          @endforeach
        ]
    });
    </script>
@endsection