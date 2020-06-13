<!DOCTYPE html>
<html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">


        <title>{{ isset($title) ? $title :  config('app.name') }} </title>

        @include('layouts.partials.styles')
    </head>
    <body>
    @include('layouts.partials.page_head')

        <!-- Page content -->
        <div id="page-content">
            <!-- Page Header -->
            <div class="content-header">
                <div class="header-section">
                    @hasSection('titleicon')
                        <i class="@yield('titleicon') pull-right fa-3x text-muted"></i>
                    @endif
                    <h1>
                        @yield('title') <small> @yield('subtitle') </small>
                    </h1>
                </div>
            </div>
            <!-- END Page Header -->

            <!-- Example Block -->
            @yield('content')
            <!-- END Example Block -->
        </div>
        <!-- END Page Content -->
    @include('layouts.partials.page_footer')
    {!! Toastr::message() !!}
