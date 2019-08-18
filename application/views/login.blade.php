<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Member</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="{{ base_url() }}assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ base_url() }}assets/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ base_url() }}assets/css/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{ base_url() }}assets/css/custom.min.css" rel="stylesheet">
    
    <link href="{{ base_url() }}assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    
    <link href="{{ base_url() }}assets/css/pnotify/pnotify.css" rel="stylesheet">
    <link href="{{ base_url() }}assets/css/pnotify/pnotify.buttons.css" rel="stylesheet">
    <link href="{{ base_url() }}assets/css/pnotify/pnotify.nonblock.css" rel="stylesheet">
    
  </head>

  <body class="login">
    <div>
    @if(isset($_GET['username']))
      <script>
        alert('Username atau password salah!');
      </script>
    @endif
    @if(isset($_GET['login']))
      <script>
        alert('Registrasi berhasil. Anda sudah bisa login sekarang!');
      </script>
    @endif
    @if(isset($_GET['logout']))
      <script>
        alert('Logout berhasil!');
      </script>
    @endif
      <div class="login_wrapper">
        <div class="animate form login_form">
          <img src="{{ base_url() }}assets/images/logo2.png" class="img-responsive">
          <section class="login_content">
            <form method="POST">
              <h1>Login Member</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default">Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya akun?
                  <a href="{{ site_url('register') }}" class="to_register"> Buat Akun Disini </a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="{{ base_url() }}assets/js/jquery.min.js"></script>
    <script src="{{ base_url() }}assets/js/pnotify/pnotify.js"></script>
    <script src="{{ base_url() }}assets/js/pnotify/pnotify.buttons.js"></script>
    <script src="{{ base_url() }}assets/js/pnotify/pnotify.nonblock.js"></script>
    {{ showNotifikasi() }}
  </body>
</html>
