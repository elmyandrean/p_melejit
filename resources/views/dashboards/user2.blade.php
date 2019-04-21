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
            <span class="info-box-text">{{$funding->isEmpty() ? '0' : $funding[0]->JUMLAH_DATA}} Transaksi</span>
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
            <span class="info-box-text">{{$kkb->isEmpty() ? '0' : $kkb[0]->JUMLAH_DATA}} Transaksi</span>
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
            <span class="info-box-text">{{$retail_credit->isEmpty() ? '0' : $retail_credit[0]->JUMLAH_DATA}} Transaksi</span>
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
            <span class="info-box-text">{{$transactional->isEmpty() ? '0' : $transactional[0]->JUMLAH_DATA}} Transaksi</span>
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
                y: {{$funding->isEmpty() ? '0' : $funding->sum('JUMLAH_DATA')}}
            }, {
                name: 'Alliance',
                y: {{$kkb->isEmpty() ? '0' : $kkb->sum('JUMLAH_DATA')}}
            }, {
                name: 'Retail Kredit',
                y: {{$retail_credit->isEmpty() ? '0' : $retail_credit->sum('JUMLAH_DATA')}}
            }, {
                name: 'Transactional',
                y: {{$transactional->isEmpty() ? '0' : $transactional->sum('JUMLAH_DATA')}}
            }]
        }]
    });

    // Bar Chart Funding
    Highcharts.chart('funding', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'World\'s largest cities per 2017'
        },
        subtitle: {
            text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Population (millions)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Population in 2017: <b>{point.y:.1f} millions</b>'
        },
        series: [{
            name: 'Population',
            data: [
                ['Tabungan', 24.2],
                ['New Payroll', 20.8],
                ['Deposito', 14.9],
                ['Giro', 13.7],
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });

    // Bar Chart KKB
    Highcharts.chart('kkb', {
      title: {
          text: 'Solar Employment Growth by Sector, 2010-2016'
      },

      subtitle: {
          text: 'Source: thesolarfoundation.com'
      },

      yAxis: {
          title: {
              text: 'Number of Employees'
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },

      plotOptions: {
          series: {
              label: {
                  connectorAllowed: false
              },
              pointStart: 2010
          }
      },

      series: [{
          name: 'Installation',
          data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
      }, {
          name: 'Manufacturing',
          data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
      }, {
          name: 'Sales & Distribution',
          data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
      }, {
          name: 'Project Development',
          data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
      }, {
          name: 'Other',
          data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
      }],

      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                  }
              }
          }]
      }

    });

    // Bar Chart Retail Credit
    Highcharts.chart('retail_credit', {
      title: {
          text: 'Solar Employment Growth by Sector, 2010-2016'
      },

      subtitle: {
          text: 'Source: thesolarfoundation.com'
      },

      yAxis: {
          title: {
              text: 'Number of Employees'
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },

      plotOptions: {
          series: {
              label: {
                  connectorAllowed: false
              },
              pointStart: 2010
          }
      },

      series: [{
          name: 'Installation',
          data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
      }, {
          name: 'Manufacturing',
          data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
      }, {
          name: 'Sales & Distribution',
          data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
      }, {
          name: 'Project Development',
          data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
      }, {
          name: 'Other',
          data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
      }],

      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                  }
              }
          }]
      }

    });

    // Bar Chart Transactional
    Highcharts.chart('transactional', {
      title: {
          text: 'Solar Employment Growth by Sector, 2010-2016'
      },

      subtitle: {
          text: 'Source: thesolarfoundation.com'
      },

      yAxis: {
          title: {
              text: 'Number of Employees'
          }
      },
      legend: {
          layout: 'vertical',
          align: 'right',
          verticalAlign: 'middle'
      },

      plotOptions: {
          series: {
              label: {
                  connectorAllowed: false
              },
              pointStart: 2010
          }
      },

      series: [{
          name: 'Installation',
          data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
      }, {
          name: 'Manufacturing',
          data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
      }, {
          name: 'Sales & Distribution',
          data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
      }, {
          name: 'Project Development',
          data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
      }, {
          name: 'Other',
          data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
      }],

      responsive: {
          rules: [{
              condition: {
                  maxWidth: 500
              },
              chartOptions: {
                  legend: {
                      layout: 'horizontal',
                      align: 'center',
                      verticalAlign: 'bottom'
                  }
              }
          }]
      }

    });
    </script>
@endsection