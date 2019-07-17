<div id="line_cart">
	
</div>
<script>
	Highcharts.chart('line_cart', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Data 6 Bulan Terakhir'
        },
        subtitle: {
            text: 'Data sampai dengan Bulan {{date('F Y')}}'
        },
        xAxis: {
            categories: [
              @foreach($periodes as $periode)
                '{{ $periode->tanggal }}',
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
          @foreach($ph as $data_ph)
          {
            name: '{{$data_ph->ph_name}}',
            data: [
              @foreach($data_ph->periodes as $periode)
                  {{$periode->jml_transaksi}},
              @endforeach
            ]
          },
          @endforeach
        ]
    });
</script>