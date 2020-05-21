<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bimbel F3 Private - Login</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">


  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/login/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="color:black;">
        <div class="container" id="particle-js">

            <!-- Outer Row -->
            <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" >
                        <img src="{{ asset('assets/images/logo.jpg') }}" style="height:100%; width:100%;" alt="">
                    </div>
                    <div class="col-lg-6" style="margin-bottom:40px;">
                        <div class="p-5">
                        <div class="text-center">
                            <h4 style="font-weight:bold; margin-top:40px;">SELAMAT DATANG</h4>
                            <p style="line-height:25px;">
                                Silahkan login kedalam aplikasi, anda dapat login hanya jika anda terdaftar sebagai administrator aplikasi !!
                            </p>
                        </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Terdaftar :</label>
                                    <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="example@mail.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password :</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="******">
                                </div>
                                <div class="form-group">

                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    <i class="fa fa-sign-in"></i>&nbsp;Login
                                </button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>

            </div>

            </div>

        </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/login/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/login/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/login/js/sb-admin-2.min.js')  }}"></script>
</body>

</html>