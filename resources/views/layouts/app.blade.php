<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ settings()->site_name }}</title>
  <link rel="shortcut icon" href="{{ asset('uploads/settings/'. settings()->logo) }}" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')  }}">
  <!-- overlayScrollbars -->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}"> --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- flag-icon-css -->
  <link rel="stylesheet" href="{{ asset('plugins/flag-icon-css/css/flag-icon.min.css') }}">
  {{-- select 2 --}}
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> --}}

  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
   
  <link href="{{ asset('plugins/jquery-ui/jquery-ui.css')}}"  rel = "stylesheet">
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&display=swap');
  body {
    font-family: "Battambang", system-ui !important;
  }
  </style>
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
</head>
{{-- {{ dd(session()->get("themes"))}} --}}
{{--  dark-mode --}}
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed body">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

   <main>
      @include('layouts.navigation')
      @include('layouts.sidebar')
      @yield('content')
   </main>

   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer no-print">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="https://chamnan-dev.vercel.app/">Chamnan Dev</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <span>{{__('admin.login_device')}}: {{Auth::user()->os_login}} ,({{__('admin.login_browser')}}: {{Auth::user()->brower_login}})</span>
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- Bootstrap -->
<script async src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
{{-- <script async src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dist/js/core.js') }}"></script>

<!-- PAGE PLUGINS -->

<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>

{{-- @if(request()->path() == 'product/create') --}}
  {{-- <script>
  $(function () {
    $.validator.setDefaults({
      submitHandler: function () {
        alert( "Form successful submitted!" );
      }
    });
    $('#quickForm').validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 5
        },
        terms: {
          required: true
        },
      },
      messages: {
        email: {
          required: "Please enter a email address",
          email: "Please enter a valid email address"
        },
        password: {
          required: "Please provide a password",
          minlength: "Your password must be at least 5 characters long"
        },
        terms: "Please accept our terms"
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
  </script> --}}
{{-- @endif --}}



{{-- @if(request()->path() == 'product') --}}
<!-- DataTables  & Plugins -->
<script async src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script async src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script async src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script async src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script async src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script async src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script async src="{{asset('dist/js//datatables.js')}}"></script>
<script async src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
{{-- @endif --}}
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    $('#summernote').summernote({
      placeholder: 'Please write your description in here...',
      height: 200
    })
  });
</script>
<!-- Toastr -->
<script async src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- SweetAlert2 -->
<script async src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

  @if(session('success'))
    <script async>$(function(){
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    Toast.fire({
        icon: 'success',
        title: '{{ session("success") }}',
      })
    })</script> 
  @elseif(session('info')) 
  <script async>$(function(){
    var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
        icon: 'info',
        title: '{{ session("info") }}'
      })
  })</script>

    {{-- <script> $(function(){toastr.info("{{ session('info') }}") })</script> --}}
  @elseif(session('warning'))
  <script async>$(function(){
    var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
        icon: 'warning',
        title: '{{ session("warning") }}'
      })
  })</script>
  {{-- <script> $(function(){toastr.warning("{{ session('warning') }}") })</script> --}}
  @elseif(session('error')) 
  <script async>$(function(){
    var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
  Toast.fire({
        icon: 'error',
        title: '<b>{{ session("error") }}</b>'
      })
  })</script>
  {{-- <scrip> $(function(){toastr.error("{{ session('error') }}") })</script> --}}
  @endif

  <script async>
    
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0');
      var yyyy = today.getFullYear();

      today = mm + '/' + dd + '/' + yyyy;
      document.querySelector(".date").value = today;
  </script>

  <script async>
    var get_code =  '{{request()->cookie("language");}}';
      $('.show-flag').addClass('flag-icon-'+ get_code); 
      $('.flag-icon-'+ get_code).addClass('active'); 
  
  </script>

<script async>

      // var themes =  localStorage.getItem("themes");
      var themes = getCookie("themes");
      $('.body').addClass(themes);
      if(themes == 'dark-mode') {
        $('.switch-theme').append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16"><path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/></svg>');
      } else {
        $('.switch-theme').append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16"><path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/></svg>');
      }
     
  function myFunction() {
     var element = document.body;
     element.classList.toggle("dark-mode");

     if ($(document.body).hasClass("dark-mode")) {
        $('.switch-theme').empty();
        setCookie("themes", "dark-mode", 365);
        $('.switch-theme').append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16"><path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708"/></svg>');
      } else {
        $('.switch-theme').empty();
        $('.switch-theme').append('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16"><path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278M4.858 1.311A7.27 7.27 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.32 7.32 0 0 0 5.205-2.162q-.506.063-1.029.063c-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286"/></svg>');
        setCookie("themes", "");
      }
  }

  </script>

  <script async>
    $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    });
  </script>
  

</body>
</html>
