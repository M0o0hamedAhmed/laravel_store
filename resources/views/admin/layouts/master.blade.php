<!doctype html>
<html lang="en" dir="ltr">
<head>
    @include('admin.layouts.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.main-header')
    @include('admin.layouts.main-sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title','Page Title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @section('breadcrumb')
                                <li class="breadcrumb-item"><a href="#">Control Panel</a></li>
                            @show
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content','Content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    @include('admin.layouts.footer')
</div>
@include('admin.layouts.script')
@include('Admin/layouts/myAjaxHelper')
@stack('ajaxCalls')
</body>
</html>
