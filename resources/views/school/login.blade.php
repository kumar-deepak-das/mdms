<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transcript Portal</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/image/logo/logo-round.ico') }}" />
  <!-- BOOTSTRAP STYLES-->
  <link href="{{ asset('public/assets/admin/css/bootstrap.css') }}" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="{{ asset('public/assets/admin/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background: #E2E2E2 url('{{ asset("public/assets/images/bg/bg-admin.jpeg") }}') no-repeat; background-size: cover">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-0 col-sm-8 col-sm-offset-0 col-xs-10 col-xs-offset-1  bg-info" style="margin-top: 100px;border-radius: 50px; box-shadow: 10px 10px 10px 10px lightblue;padding: 20px;">             
                <div class="panel-body">
                    <img src="{{ asset('public/assets/images/logo/kiit-logo-wide.png') }}" class="img-responsive"/>
                </div>
                <div class="panel-body row">
                    <div class="col-md-8 col-md-offset-2">
                        <form role="form" method="post">
                            @csrf
                            <h2 class="text-center">Admin Login</h2>
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" name="userid" class="form-control" placeholder="Your Username " />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" name="password" class="form-control"  placeholder="Your Password" />
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <!-- <input type="checkbox" /> Remember me -->
                                </label>
                                <span class="pull-right">
                                 <a href="{{asset('admin/password-reset')}}" >Forget password ? </a> 
                                </span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary ">Login Now</button>
                            </div>
                            <!-- <hr />
                             Not register ? <a href="index.html" >click here </a> or go to <a href="index.html">Home</a>  -->
                        </form>
                    </div>
                </div>
                <div class="pannel-footer">
                    @include('admin.include.success-error-message')
                </div>
            </div>
         </div>
     </div>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="{{ asset('public/assets/admin/assets/js/jquery-1.10.2.js')}}"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="{{ asset('public/assets/admin/assets/js/bootstrap.js')}}"></script>

    @if(session()->has('error'))
    <div class="modal fade" id="errorModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white"><i class="fa fa-info-circle"></i> Error</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{session()->get('error')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="em" data-toggle="modal" data-target="#errorModal"></span>
    <script>
        $('#em').click();
    </script>
    @endif

    @if(session()->has('success'))
    <div class="modal fade" id="successModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white"><i class="fa fa-info-circle"></i> Success</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{session()->get('success')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="sm" data-toggle="modal" data-target="#successModal"></span>
    <script>
        $('#sm').click();
    </script>
    @endif

    @if(session()->has('info'))
    <div class="modal fade" id="infoModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white"><i class='fa fa-info-circle text-white'></i> Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{session()->get('info')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="wm" data-toggle="modal" data-target="#infoModal"></span>
    <script>
        $('#wm').click();
    </script>
    @endif
</body>

</html>
