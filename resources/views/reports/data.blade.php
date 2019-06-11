<hr>
<div class="col-md-7">
  <div class="row">
    <h3>Data Report</h3>
  </div>
</div>
<div class="col-md-5 text-right">
  <div class="row">
    <button class="btn btn-success btn-sm" style="margin-top: 20px; margin-bottom: 10px;" onclick="downloadExcel('{{route('report.download_excel')}}');"><i class="fa fa-download"></i> Download Excel</button>
  </div>
</div>
<div class="col-md-12">
  <div class="row">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Cabang</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Produk</th>
            <th class="text-center">Sub Produk</th>
            <th class="text-center">No Rekening</th>
            <th class="text-center">Nominal</th>
            <th class="text-center">Kondisi</th>
            <th class="text-center">Point</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data_fundings as $funding)
          <tr>
            <td class="text-center">{{date('d-m-Y', strtotime($funding->date_serve))}}</td>
            <td class="text-center">{{Auth::user()->type == 3 ? $funding->user->branch->kode.' - ' : ''}}{{$funding->user->branch->name}}</td>
            <td class="text-center">{{$funding->user->nip}}</td>
            <td>{{$funding->user->name}}</td>
            <td class="text-center">{{$funding->user->position}}</td>
            <td class="text-center">{{$funding->product_content->product_holding->name}}</td>
            <td class="text-center">{{$funding->product_content->name}}</td>
            <td class="text-center">{{$funding->account_number}}</td>
            <td class="text-center">{{number_format($funding->deposit, 2)}}</td>
            <td class="text-center">{{$funding->condition}}</td>
            <td class="text-center">{{ $funding->condition == 'Pipeline' ? '1' : $funding->product_content->point }}</td>
          </tr>
          @endforeach
          @foreach($data_kkbs as $kkb)
          <tr>
            <td class="text-center">{{date('d-m-Y', strtotime($kkb->date_serve))}}</td>
            <td class="text-center">{{Auth::user()->type == 3 ? $kkb->user->branch->kode.' - ' : ''}}{{$kkb->user->branch->name}}</td>
            <td class="text-center">{{$kkb->user->nip}}</td>
            <td>{{$kkb->user->name}}</td>
            <td class="text-center">{{$kkb->user->position}}</td>
            <td class="text-center">{{$kkb->product_content->product_holding->name}}</td>
            <td class="text-center">{{$kkb->product_content->name}}</td>
            <td class="text-center">{{$kkb->account_number}}</td>
            <td class="text-center">{{number_format($kkb->nominal, 2)}}</td>
            <td class="text-center">{{$kkb->condition}}</td>
            <td class="text-center">{{ $kkb->condition == 'Pipeline' ? '1' : $kkb->product_content->point }}</td>
          </tr>
          @endforeach
          @foreach($data_retail_credits as $retail_credit)
          <tr>
            <td class="text-center">{{date('d-m-Y', strtotime($retail_credit->date_serve))}}</td>
            <td class="text-center">{{Auth::user()->type == 3 ? $retail_credit->user->branch->kode.' - ' : ''}}{{$retail_credit->user->branch->name}}</td>
            <td class="text-center">{{$retail_credit->user->nip}}</td>
            <td>{{$retail_credit->user->name}}</td>
            <td class="text-center">{{$retail_credit->user->position}}</td>
            <td class="text-center">{{$retail_credit->product_content->product_holding->name}}</td>
            <td class="text-center">{{$retail_credit->product_content->name}}</td>
            <td class="text-center">{{$retail_credit->account_number}}</td>
            <td class="text-center">{{number_format($retail_credit->nominal, 2)}}</td>
            <td class="text-center">{{$retail_credit->condition}}</td>
            <td class="text-center">{{ $retail_credit->condition == 'Pipeline' ? '1' : $retail_credit->product_content->point }}</td>
          </tr>
          @endforeach
          @foreach($data_transactionals as $transactional)
          <tr>
            <td class="text-center">{{date('d-m-Y', strtotime($transactional->date_serve))}}</td>
            <td class="text-center">{{Auth::user()->type == 3 ? $transactional->user->branch->kode.' - ' : ''}}{{$transactional->user->branch->name}}</td>
            <td class="text-center">{{$transactional->user->nip}}</td>
            <td>{{$transactional->user->name}}</td>
            <td class="text-center">{{$transactional->user->position}}</td>
            <td class="text-center">{{$transactional->product_content->product_holding->name}}</td>
            <td class="text-center">{{$transactional->product_content->name}}</td>
            <td class="text-center">{{$transactional->account_number}}</td>
            <td class="text-center">{{number_format($transactional->nominal, 2)}}</td>
            <td class="text-center">{{$transactional->condition}}</td>
            <td class="text-center">{{ $transactional->condition == 'Pipeline' ? '1' : $transactional->product_content->point }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
    
<script type="text/javascript">
  function downloadExcel(url)
  {
    var data = $("#formReport").serialize();

    window.open(url+'?'+data);
  }
</script>