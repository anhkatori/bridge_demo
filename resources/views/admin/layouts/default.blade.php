<!-- View/Admin/Layout/default.blade.php -->
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <!-- Title -->
    <title>@yield('pageTitle') | Chainos Solution JSC </title>
    @include('admin.layouts.head')
</head>

<body class="" style="background-color: #F0F2F5; overflow: auto; scrollbar-width: thin;">

    <!-- Wrap all page content here -->
    <div id="wrap">
        <!-- Make page fluid -->
        <div class="row">
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')
            <!-- Page content -->
            <div id="content">
                <!-- content main container -->
                <div class="main">

                    {{-- @if (session('error')) --}}
                    <div class="alert alert-danger" style="margin-bottom: 0px;" hidden>
                        {{ session('error') }}
                    </div>
                    {{-- @endif
                    @if (session('success')) --}}
                    <div class="alert alert-success" style="margin-bottom: 0px;" hidden>
                        {{ session('success') }}
                    </div>
                    {{-- @endif --}}
                    <div class="loader"></div>
                    {{-- @yield('content') --}}
                </div>
            </div>
        </div>
        <!-- Make page fluid-->
    </div>
    @include('admin.layouts.scripts')

</body>

</html>
