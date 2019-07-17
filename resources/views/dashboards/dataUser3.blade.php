<table class="table table-hover" id="table_regular">
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
    @foreach($data->sortByDesc('point') as $rank)
    @if($i <= 6 && $rank->user)
    <tr>
      <td>{{$i++}}</td>
      <td>{{$rank->user->branch_kode}}</td>
      <td>{{$rank->user->branch_name}}</td>
      <td>{{$rank->user->user_name}}</td>
      <td>{{$rank->point}}</td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>