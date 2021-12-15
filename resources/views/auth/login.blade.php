<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <!-- Meta, title, CSS, favicons, etc. -->
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset ('dependencias/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset ('dependencias/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset ('dependencias/progress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset ('dependencias/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('dependencias/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset ('build/css/custom.min.css') }}" rel="stylesheet">
    <!--  Style Perzonalizado -->
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf
              <h1>Login</h1>
              <div>
                <input  placeholder="Username" autocomplete="off" id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required autofocus>

                @if ($errors->has('usuario'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                @endif
              </div>
              <div>
                <input  placeholder="Password" autocomplete="off" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div>
                <button type="submit" class="btn btn-default">Entrar</button>
                <a class="reset_pass" href="#">Olvide la contraseña</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="../registro/registro.html" class="to_register"> Crear una cuenta </a>
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
