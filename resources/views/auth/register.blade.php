<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | Monitoring Referal E-Jitu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('adminlte/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/iCheck/square/blue.css')}}">
    <style>
      .footer {
        position: fixed; 
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1rem;
        background-color: #efefef;
        text-align: center;
      }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition register-page" style="height: auto; background: #6698fc;">
    <div class="register-box" style="width: 800px;">
      <div class="login-logo">
        <a href="{{url('/')}}"><img src="{{asset("images/logo_mandiri.png")}}" alt="logo" width="25%"><br></a>
      </div>

      <div class="register-box-body">
        <h3 class="login-box-msg"><b>MELEJIT </b> <br> Monitoring Referal E-Jitu</h3>
      
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form action="{{route('register')}}" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="NIP" name="nip" value="{{old('nip')}}">
                <span class="glyphicon glyphicon-tag form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{old('phone')}}">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <select name="position" class="form-control">
                  <option selected disabled>-Pilih Jabatan-</option>
                  <option value="CSR">CSR</option>
                  <option value="MKA/BO/SPV/OFFICER">MKA/BO/SPV/OFFICER</option>
                  <option value="Security">Security</option>
                  <option value="Teller">Teller</option>
                </select>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                <select name="branch_id" class="form-control">
                  <option selected disabled>-Pilih Cabang-</option>
                  @foreach($branches as $branch)
                  <option value="{{$branch->id}}">{{$branch->name}}</option>
                  @endforeach
                </select>
                <span class="glyphicon glyphicon-home form-control-feedback"></span>
              </div>
            </div>
          </div>
          
          
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="{{route('login')}}" class="btn btn-block btn-default btn-flat">Login</a>
        </div>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <div class="footer">
      <img src="{{asset('images/logo.png')}}" alt="logo" width="2%"><b>&nbsp;&nbsp;&nbsp;Version</b> 1.0 <strong>Copyright &copy; 2019-2020 <a href="https://argrmelejit.com">ARGRMandiri</a>.</strong> All rights
      reserved.
    </div>

    <!-- jQuery 3 -->
    <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  </body>
</html>
