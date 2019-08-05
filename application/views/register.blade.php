<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registrasi Member</title>
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
  </head>

  <body class="login">
    <div>
    @if(isset($_GET['username']))
      <script>
        alert('Username atau email sudah dipakai!');
      </script>
    @endif
    @if(isset($_GET['login']))
      <script>
        alert('Registrasi berhasil. Anda sudah bisa login sekarang!');
      </script>
    @endif
      <div class="login_wrapper">
        <div class="animate form login_form">
          <img src="{{ base_url() }}assets/images/logo2.png" class="img-responsive">
          <section class="login_content">
            <form method="POST">
              <h1>Registrasi Member</h1>
              <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="email" name="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="text" name="nohp" class="form-control" placeholder="NoHP" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default">Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun?
                  <a href="{{ site_url('login') }}" class="to_register"> Login Disini</a>
                </p>

                <div class="clearfix"></div>
                <br />
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
