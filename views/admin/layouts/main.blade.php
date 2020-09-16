<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Toke        n -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('dashboard/img/favicon.ico') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Custom fonts for this template-->
        <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{ asset('dashboard/css/sb-admin-2.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" media="screen">
        <link href="{{ asset('dashboard/css/sweetalert.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard/css/jquery-ui.css') }}">
        <link href="{{ asset('dashboard/css/select2.min.css') }}" rel="stylesheet" />   
       
        
        <style>
            @media(max-width:767.9px){
                [role="main"] .py-1{
                    font-size: 1.5rem;
                }
                [role="main"] mark{
                    background-color: #ff0;
                    padding: 0 .6rem;
                }
            }
            .navbar-brand img{
                width:250px;
            }
            footer {
                padding: 20px 0;
            }
            .bg-darkColor {
                background-color: #fff!important;
            }
            .btn.btn-success.openpopup{
                font-size:14px;
                White-space:nowrap;
            }
            .table-bordered thead td, .table-bordered thead th {

                color: #fff;
                background-color: #428bca;
            }

            /* our code */
            /*
            *
            * ==========================================
            * CUSTOM UTIL CLASSES
            * ==========================================
            *
            */
            table {

                border-collapse: collapse;
                width:100%
            }


            td,th{
                text-align: left;
                border:1px solid #e2e2e2;
            }
        </style>
      <style>
        .btn-web {
    color: #fff;
    background-color: #d94c27;
    border-color: #d94c27;
}
.btn-web:hover {
    color: #fff;
    text-decoration: none;
    }
 .select2-container .select2-selection--single{
    height:34px !important;
}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important; 
     border-radius: 0px !important; 
}
.select2-selection__rendered{
    padding: 0 !important;
        font-size: 1rem !important;
    font-weight: 400 !important;

}


#digit_clock_time {
  font-family: 'Work Sans', sans-serif;
  color: #d94c27; 
  text-align: center;
  padding-top: 20px;
}
#digit_clock_date {
  font-family: 'Work Sans', sans-serif;
  color: #d94c27;  
  text-align: center;
 

}
</style>
    </head>
    
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
       
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                  
                    @if(\Auth::user()->user_type=='A')                    
                    @include('admin.layouts.adminnavbar')                   
                    @elseif((\Auth::user()->user_type=='E'))
                    @include('admin.layouts.employeeadminnavbar')
                    @endif
                 
                    <!-- Begin Page Content -->
                    @yield('content')
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; {{ config('app.name', 'Laravel')." ".date('Y') }} </span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @php       
        $tz_time = date("F j, Y h:i:s");        
        @endphp
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script> 
        <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('dashboard/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>       
        <script type="text/javascript" src="{{ asset('dashboard/js/jquery-ui.js') }}"></script>   
          <script src="{{ asset('dashboard/js/select2.min.js') }}"></script>
          <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
          <script>
              /*digital clocl */
              function currentTime() {
                var currenttime = '{{$tz_time}}';
                offset = -4.0
clientDate = new Date();
utc = clientDate.getTime() + (clientDate.getTimezoneOffset() * 60000);

date = new Date(utc + (3600000*offset));
  //var date = new Date(); /* creating object of Date class */
  var hour = date.getHours();
  var min = date.getMinutes();
  var sec = date.getSeconds();
  var midday = "AM";
  midday = (hour >= 12) ? "PM" : "AM"; /* assigning AM/PM */
  hour = (hour == 0) ? 12 : ((hour > 12) ? (hour - 12): hour); /* assigning hour in 12-hour format */
  hour = changeTime(hour);
  min = changeTime(min);
  sec = changeTime(sec);
  document.getElementById("digit_clock_time").innerText = hour + " : " + min + " : " + sec + " " + midday; /* adding time to the div */
 
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
 
  var curWeekDay = days[date.getDay()]; // get day
  var curDay = date.getDate();  // get date
  var curMonth = months[date.getMonth()]; // get month
  var curYear = date.getFullYear(); // get year
  var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear; // get full date
  document.getElementById("digit_clock_date").innerHTML = date;
 
  var t = setTimeout(currentTime, 1000); /* setting timer */
}
 
function changeTime(k) { /* appending 0 before time elements if less than 10 */
  if (k < 10) {
    return "0" + k;
  }
  else {
    return k;
  }
}
 
currentTime();
              /*end */
               $('.form_datetime').datetimepicker({
        //language:  'fr',
        format : 'yyyy-mm-dd hh:ii:ss',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
            
               
            

               $('.select2').select2();
               $(function () {
                    $('[data-toggle="popover"]').popover()
                    })
                                $('.popover-dismiss').popover({
                    trigger: 'focus'
                    })
//chart

          </script>
        <!-- Custom scripts for all pages-->
        @yield('jQeryValidationJs')
        <script src="{{ asset('dashboard/js/sb-admin-2.js') }}"></script>
        <script src="{{ asset('dashboard/js/sweetalert.min.js')}}"></script>        
        @yield('addonJsScript')
        
    </body>
</html>
