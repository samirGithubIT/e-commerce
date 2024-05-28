<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- css files --}}
  @include('backend.inc.css_files')
  {{-- css files ends --}}

</head>

<body>

  <!-- ======= Header ======= -->
  @include('backend.inc.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('backend.inc.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @include('backend.inc.breadCrumbs')
   <!-- End Page Title -->

    <section class="section">
      @yield('content')
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('backend.inc.footer')
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  @include('backend.inc.js_scripts')

</body>

</html>