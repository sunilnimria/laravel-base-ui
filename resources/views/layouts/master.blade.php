<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

{{-- Head Code --}}
<x-backend.head/>

<body id="page-top">

  <!-- Page Wrapper -->
  <div class="wrapper">

    <!-- Sidebar -->
    <x-backend.sidebar />

    <div class="main-panel">

      <!-- Top Menu -->
      <x-backend.topMenu />

      <!-- Main Content -->
      <div id="content" class="container">


        <!-- Begin Page Content -->
        @yield('main-content')
        <!-- /.container-fluid -->

      </div>
      <!-- Footer Menu -->
      <x-backend.footerMenu />

    </div>
    <!-- End of Main panel -->

  </div>
  <!-- Modal-->
  <x-modal.modal />
  <x-modal.processing />

  <!-- Footer-->
  <x-backend.footer />

</body>

</html>
