<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentelella Alela! | </title>

  <!-- Bootstrap -->
  <link href="{{ asset ('dependencias/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset ('dependencias/font-awesome.min.css') }}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset ('dependencias/nprogress.css') }}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset ('build/css/custom.min.css') }}" rel="stylesheet">
</head>



<!-- page content -->
<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf

            <h1>Registro</h1>

            <form class="form-horizontal form-label-left" novalidate>



              <div class="item form-group">

                <div class="">
                  <input placeholder="Username" id="usuario" type="text" class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" value="{{ old('usuario') }}" required autofocus>
                </div>

                @if ($errors->has('usuario'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('usuario') }}</strong>
                    </span>
                @endif
              </div>
              <div class="item form-group">

                <div class="">
                  <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="item form-group">

                <div class="">
                 <input placeholder="Re-Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
               </div>
             </div>

             <div>

              <div class="ln_solid"></div>
              <div class="form-group">
              <div class="">
                 <button type="submit" class="btn btn-default">Registrarse</button>
                 
                 <a class="reset_pass" href="../login/login.html">Log in</a>
                 <div>


                 </div>

               </div>
             </div>
           </form>
         </section>
       </div>

       
     </div>
   </div>
   <!-- /page content -->




   <!-- jQuery -->
   <script src="{{ asset ('dependencias/jquery.min.js') }}"></script>
   <!-- Bootstrap -->
   <script src="{{ asset ('dependencias/bootstrap.min.js') }}"></script>
   <!-- FastClick -->
   <script src="{{ asset ('dependencias/fastclick.js') }}"></script>
   <!-- NProgress -->
   <script src="{{ asset ('dependencias/nprogress.js') }}"></script>
   <!-- validator -->
   <script src="{{ asset ('dependencias/validator.js') }}"></script>

   <!-- Custom Theme Scripts -->
   <script src="{{ asset ('build/js/custom.min.js') }}"></script>

 </body>
 </html>