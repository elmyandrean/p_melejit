@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Profile : {{$user->name}}</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="alert alert-danger" style="display:none"></div>
        <form action="{{route('users.update_profile', $user->id)}}" class="form-horizontal" method="POST" id="formUpdate">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label class="control-label col-md-3">NIP</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="nip" value="{{$user->nip}}" required="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-8">
              <div class="checkbox">
                <label>
                  <input name="change_password" id="change-password" type="checkbox" value="change" onclick="changePassword()"> Ubah Password
                </label>
              </div>
            </div>
          </div>
          <div id="view-password" style="display: none">
            <div class="form-group">
              <label class="control-label col-md-3">Password Lama</label>
              <div class="col-md-8">
                <input type="password" class="form-control" name="old_password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password Baru</label>
              <div class="col-md-8">
                <input type="password" class="form-control" name="new_password">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Konfirmasi Password</label>
              <div class="col-md-8">
                <input type="password" class="form-control" name="new_password_confirmation">
              </div>
            </div>  
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Nama Lengkap</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="name" value="{{$user->name}}" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Email</label>
            <div class="col-md-8">
              <input type="email" class="form-control" name="email" value="{{$user->email}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Telp/HP</label>
            <div class="col-md-8">
              <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Position</label>
            <div class="col-md-8">
              <select name="position" class="form-control" required="">
                <option selected disabled>-Pilih Jabatan-</option>
                <option value="CSR" {{ $user->position == 'CSR' ? 'selected' : ''}}>CSR</option>
                <option value="MKA/BO/SPV/OFFICER" {{ $user->position == 'MKA/BO/SPV/OFFICER' ? 'selected' : ''}}>MKA/BO/SPV/OFFICER</option>
                <option value="Security" {{ $user->position == 'Security' ? 'selected' : ''}}>Security</option>
                <option value="Teller" {{ $user->position == 'Teller' ? 'selected' : ''}}>Teller</option>
                <option value="Kepala Cabang" {{ $user->position == 'Kepala Cabang' ? 'selected' : ''}}>Kepala Cabang</option>
                <option value="Administrator" {{ $user->position == 'Administrator' ? 'selected' : ''}}>Administrator</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Cabang</label>
            <div class="col-md-8">
              <select name="branch_id" class="form-control" required="">
                <option selected disabled>-Pilih Cabang-</option>
                @foreach($branches as $branch)
                <option value="{{$branch->id}}" {{$user->branch_id == $branch->id ? 'selected' : ''}}>{{$branch->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-3 col-md-8">
              <button class="btn btn-primary">Simpan</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
  <script type="text/javascript">
    function changePassword(){
      var change_password = document.getElementById('change-password');
      if (change_password.checked) {
        $("#view-password").show();
      } else {
        $("#view-password").hide();
      }
    }

    $("#formUpdate").submit(function(e){
      e.preventDefault();
      
      var data = $("#formUpdate").serialize();
      var url = $("#formUpdate").attr('action');

      $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: "JSON",
        success: function(data){
          if (data.status == 'errors') {
            $('.alert-danger').html('');
            $.each(data.message, function(key, value){
              $('.alert-danger').show();
              $('.alert-danger').append('<p>'+value+'</p>');
            });

            $(window).scrollTop(0);
          } else if(data.status == 'success') {
            window.location = baseUrl+'/dashboard';
          }
        }
      });
    });
  </script>
@endsection
