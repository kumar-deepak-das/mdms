<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Password Reset</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="{{ asset('public/assets/admin/css/bootstrap.css') }}" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="{{ asset('public/assets/admin/css/font-awesome.css') }}" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row "> 
            <div class="col-md-offset-3 col-md-6 text-center" style="margin-top: 100px;">
                <img src="{{ asset('public/assets/image/logo/logo.png') }}" class="img-responsive"/>
            </div>
            <div class="clear-fix"></div>              
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">             
                <div class="panel-body">
                    <form role="form" method="post">
                        @csrf
                        <h2 class="text-center">Reset Your Password</h2>
                        <br />
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                            <input type="email" name="email" class="form-control" placeholder="Your Email ID " />
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="confirm" required/> Yes Reset My Password
                            </label>
                            <span class="pull-right">
                             <a href="{{Config::get('app.url')}}/admin/login" >Have the password? Login No </a> 
                         </span>
                     </div>

                     <button type="submit" class="btn btn-primary ">Reset Password</button>
                     <!-- <hr />
                     Not register ? <a href="index.html" >click here </a> or go to <a href="index.html">Home</a>  -->
                 </form>
            </div>
            <div class="pannel-footer">
                @include('inc.success-error-message')
            </div>
        </div>
     </div>
 </div>
</body>
</html>
