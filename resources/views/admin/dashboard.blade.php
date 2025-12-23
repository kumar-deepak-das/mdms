<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('inc.head')
    </head>
    <body>
        <div id="wrapper">
            
            @include('admin.include.nav-bar')
            
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="page-head-line">DASHBOARD</h1>
                            <!-- <h1 class="page-subhead-line">Transcript Admin Portal</h1> -->
                        </div>
                        <div class="col-md-8">@include('inc.success-error-message')</div>
                        <div class="col-md-12" style="background: url({{ asset('public/assets/images/logo/kiit-logo-large.jpg') }}) no-repeat center;opacity: 0.2; min-height: 600px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. WRAPPER  -->            


        @include('inc.footer')

        @include('inc.bottom')
    </body>
</html>
