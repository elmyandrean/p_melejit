<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Monitoring Referal E-Jitu</title>
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
      position: absolute;
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
<body class="hold-transition login-page" style="height: auto;">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('/')}}"><img src="{{asset("images/logo_mandiri.png")}}" alt="logo" width="55%"><br></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <h3 class="login-box-msg"><b>MELEJIT </b> <br> Monitoring Referal E-Jitu</h3>
      
      @if ($errors->has('nip') || $errors->has('password'))
      <div class="alert alert-danger alert-dismissible">
        <h4><i class="icon fa fa-ban"></i> Login Gagal!</h4>
        Username / Password yang anda masukkan tidak ditemukan. Tolong dicek kembali.
      </div>
      @endif

      <form action="{{route('login')}}" method="post">
        @csrf
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="NIP" name="nip">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <div class="footer">
    <img src="{{asset('image/logo.png')}}" alt="logo" width="2%"><b>&nbsp;&nbsp;&nbsp;Version</b> 2.4.0 <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
      reserved.
  </div>

  <!-- jQuery 3 -->
  <script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
</body>
</html>
