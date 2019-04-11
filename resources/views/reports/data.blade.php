<hr>
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
        <td>{{date('d-m-Y', strtotime($funding->date_serve))}}</td>
        <td>{{$funding->user->branch->name}}</td>
        <td>{{$funding->user->nip}}</td>
        <td>{{$funding->user->name}}</td>
        <td>{{$funding->user->position}}</td>
        <td>{{$funding->product_content->product_holding->name}}</td>
        <td>{{$funding->product_content->name}}</td>
        <td>{{$funding->account_number}}</td>
        <td>{{number_format($funding->deposit, 2)}}</td>
        <td>{{$funding->condition}}</td>
        <td>{{ $funding->condition == 'Pipeline' ? '1' : $funding->product_content->point }}</td>
      </tr>
      @endforeach
      @foreach($data_kkbs as $kkb)
      <tr>
        <td>{{date('d-m-Y', strtotime($kkb->date_serve))}}</td>
        <td>{{$kkb->user->branch->name}}</td>
        <td>{{$kkb->user->nip}}</td>
        <td>{{$kkb->user->name}}</td>
        <td>{{$kkb->user->position}}</td>
        <td>{{$kkb->product_content->product_holding->name}}</td>
        <td>{{$kkb->product_content->name}}</td>
        <td>{{$kkb->account_number}}</td>
        <td>{{number_format($kkb->nominal, 2)}}</td>
        <td>{{$kkb->condition}}</td>
        <td>{{ $kkb->condition == 'Pipeline' ? '1' : $kkb->product_content->point }}</td>
      </tr>
      @endforeach
      @foreach($data_retail_credits as $retail_credit)
      <tr>
        <td>{{date('d-m-Y', strtotime($retail_credit->date_serve))}}</td>
        <td>{{$retail_credit->user->branch->name}}</td>
        <td>{{$retail_credit->user->nip}}</td>
        <td>{{$retail_credit->user->name}}</td>
        <td>{{$retail_credit->user->position}}</td>
        <td>{{$retail_credit->product_content->product_holding->name}}</td>
        <td>{{$retail_credit->product_content->name}}</td>
        <td>{{$retail_credit->account_number}}</td>
        <td>{{number_format($retail_credit->nominal, 2)}}</td>
        <td>{{$retail_credit->condition}}</td>
        <td>{{ $retail_credit->condition == 'Pipeline' ? '1' : $retail_credit->product_content->point }}</td>
      </tr>
      @endforeach
      @foreach($data_transactionals as $transactional)
      <tr>
        <td>{{date('d-m-Y', strtotime($transactional->date_serve))}}</td>
        <td>{{$transactional->user->branch->name}}</td>
        <td>{{$transactional->user->nip}}</td>
        <td>{{$transactional->user->name}}</td>
        <td>{{$transactional->user->position}}</td>
        <td>{{$transactional->product_content->product_holding->name}}</td>
        <td>{{$transactional->product_content->name}}</td>
        <td>{{$transactional->account_number}}</td>
        <td>{{number_format($transactional->nominal, 2)}}</td>
        <td>{{$transactional->condition}}</td>
        <td>{{ $transactional->condition == 'Pipeline' ? '1' : $transactional->product_content->point }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>