 <!-- Required meta tags -->
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Dynamic meta data -->
  <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="blog, food, recipes">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('meta_image')" />
    <meta property="og:site_name" content="{{ config('app.name','Laravel') }}" />

  <title>@yield('meta_title', config('app.name')  )</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('user/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('user/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('user/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

  <link rel="stylesheet" href="{{ asset('user/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('user/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" type="{{ asset('user/text/css" href="js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
 <!-- toastr css link -->
  <link href="{{ asset('user/css/toastr.min.css') }}" rel="stylesheet"/>
  <!-- end toastr css link -->

  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('user/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="@yield('meta_image')" />
  <!-- Summernote CSS -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
  .hover-effect:hover{
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    transition: box-shadow 0.3s ease;
  }
    .toast-message {
        color: white !important;
        font-weight: bold;
    }
    .toast-success{background-color:#51A351}
    .toast-error{background-color:#BD362F}
    .toast-info{background-color:#2F96B4}
    .toast-warning{background-color:#F89406}
</style>