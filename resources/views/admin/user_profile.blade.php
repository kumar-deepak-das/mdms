<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('admin.include.head')
</head>
<body>
    <div id="wrapper">

        @include('admin.include.nav-bar')

        <div id="page-wrapper">
            <div id="page-inner" style="border: solid;">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Admission</h1>
                    </div>
                </div> -->
                <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">My Profile</div>
                            <form action="" method="post" autocomplete="off">
                                @csrf
                                <div class="panel-body row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-3">  
                                        <div class="form-group"><H4 class="text-center">User Profile</H4><hr/></div>
                                        <div class="form-group">
                                            <label>Mail Id: <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control text-uppercase" name="useremail" value="{{ $user->useremail }}" required readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>Contact  No: <span class="text-danger">*</span></label>
                                            <input class="form-control text-uppercase" name="userphone" value="{{ $user->userphone }}" required readonly onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" minlength="10"/>
                                        </div>       
                                        <div class="form-group">
                                            <label>Branch: <span class="text-danger">*</span></label>
                                            <input class="form-control text-uppercase" name="userbranch" value="{{ $user->branchname }}" required readonly />
                                        </div>
                                        <div class="form-group">
                                            <label>User Name: <span class="text-danger">*</span></label>
                                            <input class="form-control text-uppercase" name="username" value="{{ $user->username }}" required readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-3">
                                        <div class="form-group"><H4 class="text-center">Change Password</H4><hr/></div>
                                        <div class="form-group">
                                            <label>Curent Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control text-uppercase" name="curentpassword" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control text-uppercase" name="newpassword" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control text-uppercase" name="confirmpassword" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="userid" value="{{$user->userid}}">
                                            <button type="submit" class="btn btn-primary btn-block"> Change Password </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="min-height: 80px;">
                                        @include('admin.include.success-error-message')
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-responsive" src="{{ asset('public/assets/image/logo/renric.jpg') }}">
                    </div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->            


    @include('admin.include.footer')


    @include('admin.include.bottom')
</body>
</html>
