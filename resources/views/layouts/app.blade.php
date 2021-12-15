<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Traficaño! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset ('dependencias/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset ('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset ('dependencias/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset ('dependencias/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/css/multi-select.css') }}" rel="stylesheet">

      <!-- bootstrap-daterangepicker -->
    <link href="{{ asset ('dependencias/daterangepicker.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ asset ('dependencias/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/jquery.toast.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset ('build/css/custom.min.css') }}" rel="stylesheet">
    <!--  Style Perzonalizado -->
    <link href="{{ asset ('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('dependencias/fullcalendar.print.css') }}" rel="stylesheet" media="print">

      <!-- Dropzone.js -->
    <link href="{{ asset ('dependencias/dropzone.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home')}}" class="site_title"><i class="fa fa-paw"></i> <span>Traficaño</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset ('assets/images/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>{{Auth::user()->usuario}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
               
                <ul class="nav side-menu">
                  <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-folder"></i>Stock <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('ingresos.index')}}">Ingreso </a></li>
                      <li><a href="{{route('egresos.index')}}">Egreso </a></li>
                      <li><a href="{{route('ajustes.index')}}">Ajuste</a></li>
                      <!--<li class=""><a>Edicion<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none;">
                          <li class="sub_menu"><a href="{{route('indexmed')}}">Medida</a>
                          </li>
                        </ul>
                      </li>-->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cubes"></i>Stock Paquetes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('medidas.index')}}">Medidas</a></li>
                      
                      <li><a href="{{route('indexpaquete')}}">Paquetes</a></li>
                      <li><a href="{{route('indexmovimiento')}}">Movimientos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-refresh"></i> Stock Actualizar MP <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('actualizarmp')}}">Actualizar MP</a></li>

                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Usuario <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('usuarios')}}">Agregar Usuario</a></li>

                    </ul>
                  </li>
                    <li><a><i class="fa fa-edit"></i>Edición de Datos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li class="sub_menu"><a href="{{route('indexmed')}}">Edición Medida</a>
                      </li>
                      <li><a href="{{route('normas.index')}}">Norma</a></li>
                      <li><a href="{{route('tipoaceros.index')}}">Tipo Acero</a></li>
                      <li><a href="{{route('condicionventas.index')}}">Condición</a></li>
                      <li><a href="{{route('punzones.index')}}">Punzones</a></li>
                      <li><a href="{{route('matriztls.index')}}">Matriz TL</a></li>
                      <li><a href="{{route('matrizbronsons.index')}}">Matriz Bronson</a></li>
                      <li><a href="{{route('matrizmitchells.index')}}">Matriz Mitchell</a></li>
                      <li><a href="{{route('matrizdobles.index')}}">Matriz Doble</a></li>
                      <li><a href="{{route('matrizsimaceros.index')}}">Matriz Simple Acero</a></li>
                      <li><a href="{{route('matrizsimwidias.index')}}">Matriz Simple Widia</a></li>
                      <li><a href="{{route('cabezaturcos.index')}}">Cabeza Turco</a></li>
                      <li><a href="{{route('transporte')}}">Transporte</a></li>
                      <li><a href="{{route('cliente')}}">Contacto Cliente</a></li>
                      <li><a href="{{route('usos.index')}}">Uso</a></li>
                      <li><a href="{{route('proveedores.index')}}">Proveedores</a></li>
                      <li><a href="{{route('fabricaciones.index')}}">Estado Fabricacion</a></li>

                      <li><a href="{{route('operarioIndex')}}">Operarios</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-line-chart"></i> Ventas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('actualizar_precio')}}">Actualizar Precio</a></li>
                      <li><a href="{{route('cambio')}}">Cambio</a></li>
                      <li><a href="{{route('lista_precio')}}">Listado de precios</a></li>
                      <li><a href="{{route('indexcotizacion')}}">Cotizar</a></li>
                      <li><a href="{{route('productos.index')}}">Productos</a></li>
                      <li><a href="{{route('clientes.index')}}">Clientes</a></li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-list"></i>Despacho<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('autorizacion')}}">Autorizacion</a></li>
                      <li><a href="{{route('despacho')}}">Despacho</a></li>
                      <li><a href="{{route('ubicacion')}}">Ubicacion</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-cog"></i>Producción<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('ordenes')}}">Ordenes</a></li>
                      <li><a href="{{route('runproceso')}}">Pasar a Planta</a></li>
                      <li><a href="{{route('indexrechazo')}}">Rechazo</a></li>
                      <li><a href="{{route('indexcalendario')}}">Calendario</a></li>
                      <li><a href="{{route('indexsubproceso')}}">Subproceso</a></li>
                      <li><a href="{{route('indextour')}}">Tour</a></li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-paste"></i>Reporte<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('report_produccion')}}">Reporte de Producción</a></li>
                      <li><a href="{{route('report_toneladasxdia')}}">Reporte Toneladas Por Día</a></li>
                      <li><a href="{{route('report_precio_proveedor')}}">Reporte Precio Por Proveedor</a></li>
                      <li><a href="{{route('report_venta')}}">Reporte Venta</a></li>
                      <li><a href="{{route('report_despacho')}}">Reporte Despacho</a></li>
                      <li><a href="{{route('report_entrega_mes')}}">Reporte Entrega Por Mes</a></li>
                    </ul>
                  </li> 

                  <li><a><i class="fa fa-file"></i>Biblioteca<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('documentos.index')}}">Administrar Documento</a></li>
                      <li><a href="{{route('medidabibliotecas.index')}}">Medida</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-folder-open"></i>CRM<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('calendario')}}">Calendario</a></li>
                      <li><a href="{{route('nota')}}">Nota</a></li>
                      <li><a href="{{route('seguimiento')}}">Seguimiento</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-list-ol"></i>Tareas y Objetivos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('tareas.index')}}">Tarea</a></li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-line-chart"></i>Costos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('coCentro')}}">Coeficiente Por Centro</a></li>
                      <li><a href="{{route('costoCentro')}}">Costo Por Centro</a></li>
                      <li><a href="{{route('costoGeneral')}}">Costo General</a></li>
                    </ul>
                  </li>
                                  
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset ('assets/images/img.jpg')}}" alt="">{{Auth::user()->usuario}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset ('assets/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset ('assets/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset ('assets/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="{{ asset ('assets/images/img.jpg') }}" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
          @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset ('dependencias/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset ('dependencias/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset ('dependencias/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset ('dependencias/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset ('dependencias/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset ('dependencias/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset ('dependencias/jquery.flot.js') }}"></script>
    <script src="{{ asset ('dependencias/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset ('dependencias/jquery.flot.time.js') }}"></script>
    <script src="{{ asset ('dependencias/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset ('dependencias/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset ('dependencias/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset ('dependencias/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset ('dependencias/jquery.toast.min.js') }}"></script>
    <script src="{{ asset ('dependencias/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset ('dependencias/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset ('dependencias/moment.min.js') }}"></script>
    <script src="{{ asset ('dependencias/daterangepicker.js') }}"></script>
   
    <!-- Datatables -->
    <script src="{{ asset ('dependencias/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset ('dependencias/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset ('dependencias/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset ('dependencias/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset ('dependencias/buttons.flash.min.js') }}"></script>
    <script src="{{ asset ('dependencias/buttons.html5.min.js') }}"></script>
    <script src="{{ asset ('dependencias/buttons.print.min.js') }}"></script>
    <script src="{{ asset ('dependencias/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset ('dependencias/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset ('dependencias/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset ('dependencias/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset ('dependencias/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset ('dependencias/jszip.min.js') }}"></script>
    <script src="{{ asset ('dependencias/pdfmake.min.js') }}"></script>
    <script src="{{ asset ('dependencias/vfs_fonts.js') }}"></script>
    <script src="{{ asset ('dependencias/bootstrap-datetimepicker.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset ('dependencias/jquery.multi-select.js') }}"></script>
    <script src="{{ asset ('build/js/custom.min.js') }}"></script>
    <script src="{{ asset ('dependencias/dropzone.min.js') }}"></script>
    <!-- FullCalendar -->
    <script src="{{ asset ('dependencias/moment.min.js') }}"></script>
    <script src="{{ asset ('dependencias/fullcalendar.min.js') }}"></script>
    <!--<script src="{{ asset ('build/js/icheck.min.js') }}"></script>-->
    <script src="{{ asset ('build/js/sweetalert2.all.min.js') }}"></script>
    @yield('js_extra')

    <script>
    $('#DatepickerDesdeVentaBusqueda').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#DatepickerHastaVenta').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#DatepickerFechaDesde').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#DatepickerFechaHasta').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
     $('#myDatepicker').datetimepicker({
       allowInputToggle: true,
       format: 'DD/MM/YYYY',
    });
    $('#myDatepickerAjuste').datetimepicker({
       allowInputToggle: true
    });
    $('#myDatepickerEgreso').datetimepicker({
       allowInputToggle: true
    });
    $('#DatepickerFechaPrometodaDesde').datetimepicker({
       allowInputToggle: true
    });
    $('#DatepickerFechaPrometodaHasta').datetimepicker({
       allowInputToggle: true
    });
    $('#DatepickerFechaRealDesde').datetimepicker({
       allowInputToggle: true
    });
    $('#DatepickerFechaRealHasta').datetimepicker({
       allowInputToggle: true
    });
    $('#myDatepickerNota').datetimepicker({
       allowInputToggle: true,
       format: 'DD/MM/YYYY',
    });
    $('#myDatepickerModalCRMC').datetimepicker({
       allowInputToggle: true,
       format: 'DD/MM/YYYY',
    }); 
    $('#myDatepickerCrearNota').datetimepicker({
       allowInputToggle: true
    });
    $('#DatepickerTareaPUT').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#myDatepickerModal').datetimepicker({
       allowInputToggle: true,
       format: 'DD/MM/YYYY HH:MM'
    });
    $('#myDatepickerModalPUT').datetimepicker({
      format: 'DD/MM/YYYY HH:MM',
      allowInputToggle: true
    });
    $('#DatepickerAddNota').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#DatepickerTarea').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#DatepickerCostoGeneral').datetimepicker({
      allowInputToggle: true
    });
    $('#myDatepicker2').datetimepicker({
      format: 'MM/YYYY',
      allowInputToggle: true
    });
    $('#myDatepicker3').datetimepicker({
      format: 'MM/YYYY',
      allowInputToggle: true
    });

    $('#myDatepicker4').datetimepicker({
      format: 'MM/YYYY',
      allowInputToggle: true
    });
    $('#myDatepicker5').datetimepicker({
      format: 'MM/YYYY',
      allowInputToggle: true
    });
    $('#myDatepicker6').datetimepicker({
      format: 'MM/YYYY',
      allowInputToggle: true
    });

  //-------------- Nuevos Script---COPIARRRRRR ------------// 
  $('#DatepickerDespachoDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerDespachoHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifDespachoDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifDespachoHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAddDespachoDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAddDespachoHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerReportProveeDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerReportProveeHasta').datetimepicker({
     allowInputToggle: true
  });
  // Buscar Seguimiento //
  $('#DatepickerPrometidaDesde').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });  
  
  $('#DatepickerPrometidaHasta').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  
  $('#DatepickerRealDesde').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  
  $('#DatepickerRealHasta').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#DatepickerModalModifProveeDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifProveeHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAgregarProveeDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAgregarProveeHasta').datetimepicker({
     allowInputToggle: true
  });

  $('#myDatepickerDesde').datetimepicker({
     allowInputToggle: true,
     format: 'DD/MM/YYYY HH:MM'
  });
  $('#myDatepickerHasta').datetimepicker({
     allowInputToggle: true,
     format: 'DD/MM/YYYY HH:MM'
  });
  $('#myDatepickerModal').datetimepicker({
     allowInputToggle: true,
     format: 'DD/MM/YYYY HH:MM'
  });

  $('#DatepickerPlantaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerPlantaHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerEntregaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerEntregaHasta').datetimepicker({
     allowInputToggle: true
  });

  $('#DatepickerModalModifPlantaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifPlantaHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifEntregaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifEntregaHasta').datetimepicker({
     allowInputToggle: true
  });

  $('#DatepickerModalAddPlantaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAddPlantaHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAddEntregaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAddEntregaHasta').datetimepicker({
     allowInputToggle: true
  });

  $('#DatepickerVentaReportDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerVentaReportHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifcarEntregaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalModifcarEntregaHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAgregarEntregaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerModalAgregarEntregaHasta').datetimepicker({
     allowInputToggle: true
  });

  $('#DatepickerDesdeVenta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerHastaVenta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerFechaDesde').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerFechaHasta').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerDesdeVentaModifi').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerHastaVentaModifi').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerFechaDesdeModifi').datetimepicker({
     allowInputToggle: true
  });
  $('#DatepickerFechaHastaModifi').datetimepicker({
     allowInputToggle: true
  });
  $('#myDatepickerModal').datetimepicker({
     allowInputToggle: true
  });

  $('#DatepickerDesdeEntrega').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#DatepickerHastaEntrega').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

   $('#DatepickerFechaRechazo').datetimepicker({
      format: 'DD/MM/YYYY',
      allowInputToggle: true
    });
    $('#myDatepickerRechazoDesde').datetimepicker({
       allowInputToggle: true
    });
    $('#myDatepickerRechazoHasta').datetimepicker({
       allowInputToggle: true
    });
    $('#myDatepickerRechazoModalDesde').datetimepicker({
       allowInputToggle: true
    });
    $('#myDatepickerRechazoModalHasta').datetimepicker({
       allowInputToggle: true
    });

  $('#myDatepicker7').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true,
    defaultDate: new Date()
  });

  $('#myDatepickerCosto').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#myDatepicker8').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true,
    defaultDate: new Date()
  });

  $('#myDatepicker9').datetimepicker({
    format: 'MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker10').datetimepicker({
    format: 'MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker11').datetimepicker({
    format: 'MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker12').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true,
    defaultDate: new Date()
  });
  $('#DatepickerProcesoDes').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker13').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker14').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker15').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker16').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
   $('#myDatepicker17').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#myDatepicker18').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#Datepicker_1').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#Datepicker_2').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#Datepicker_3').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#myDatepicker22').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#myDatepicker23').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });


  $('#DatepickerHastaDespacho').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#fecha_control').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#DatepickerDesdeDespacho').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
  $('#DatepickerHastaBuscar').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });

  $('#DatepickerDesdeBuscar').datetimepicker({
    format: 'DD/MM/YYYY',
    allowInputToggle: true
  });
   $("#my-select").multiSelect( {
      title: "Elija las opciones" 
   });
   $("#my-select-2").multiSelect( {
      title: "Elija las opciones" 
   });
   $("#my-select-3").multiSelect( {
      title: "Elija las opciones" 
   });
    $("#my-select-4").multiSelect( {
      title: "Elija las opciones" 
   });
   $("#my-select-5").multiSelect( {
      title: "Elija las opciones" 
   });
   $("#my-select-6").multiSelect( {
      title: "Elija las opciones" 
   });

  $(document).ready(function(){ 
    $('#alternar-select-1').on('click',function(){
      $('#respuesta-select-1').toggle();
    });
  });

   // jQuery
   $(document).ready(function(){ 
    $('#alternar-select-2').on('click',function(){
      $('#respuesta-select-2').toggle();
    });
   });


  // jQuery
  $(document).ready(function(){ 
    $('#alternar-check-1').on('click',function(){
      $('#respuesta-check-1').toggle();
    });
  });
  // jQuery
  $(document).ready(function(){ 
    $('#alternar-check-2').on('click',function(){
      $('#respuesta-check-2').toggle();
    });
  });
  $(document).ready(function(){ 
    $('#alternar-check-3').on('click',function(){
      $('#respuesta-check-3').toggle();
    });
  });
  // jQuery
  $(document).ready(function(){ 
    $('#alternar-check-4').on('click',function(){
      $('#respuesta-check-4').toggle();
    });
  });
  // jQuery
  $(document).ready(function(){ 
    $('#alternar-check-5').on('click',function(){
      $('#respuesta-check-5').toggle();
    });
  });
  $(document).ready(function(){ 
    $('#alternar-check-6').on('click',function(){
      $('#respuesta-check-6').toggle();
    });
  });

  </script>
  </body>
</html>