<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('inc.head')
    </head>
    <body>
        <div id="wrapper">
            
            @include('reviewer.include.nav-bar')
            
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-5">
                            <h1 class="page-head-line">Profile</h1>
                            <!-- <h1 class="page-subhead-line">MDMS Admin Portal</h1> -->
                            <!-- <h1 class="page-subhead-line"><img src="{{ asset('public/assets/image/logo/renric.jpg') }}" class="img-responsive"></h1> -->
                        </div>
                        <div class="col-md-7">@include('inc.success-error-message')</div>
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="letter-spacing: 3px;">
                                   <b>Enter Reviewer's Details</b>
                                </div>
                                <div class="panel-body row">
                                    <div class="col-md-6">
                                        <form method="post" autocomplete="off" action="./update-profile">
                                            @csrf
                                            <div class="container-fluid"> 
                                                <div class="row card-body">
                                                    <!-- <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm" for="department">Department: <span class="text-danger">*</span></label>
                                                            <div class="col-sm">       
                                                                <select class="form-control" id="department" name="department" required>
                                                                    <option value="" selected disabled>Choose the Department</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>  -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm" for="reviewer_email">Email ID of Reviewer: <span class="text-danger">*</span></label>
                                                            <div class="col-sm">       
                                                                <input type="email" class="form-control" id="reviewer_email" placeholder="Reviewer Email ID" name="reviewer_email" value="{{$reviewer->reviewer_email}}" required readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm" for="reviewer_phone">Mobile No of Reviewer: <span class="text-danger">*</span></label>
                                                            <div class="col-sm">       
                                                                <input class="form-control" id="reviewer_phone" placeholder="Reviewer Phone No" name="reviewer_phone" onkeypress="return isNumber(event)" maxlength="10" minlength="10" value="{{$reviewer->reviewer_phone}}" required readonly>
                                                            </div>
                                                        </div>     
                                                    </div> 
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm" for="reviewer_name">Name of the Reviewer: <span class="text-danger">*</span></label>
                                                            <div class="col-sm">       
                                                                <input class="form-control" id="reviewer_name" placeholder="Reviewer Name" name="reviewer_name" value="{{$reviewer->reviewer_name}}" required>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm" for="reviewer_address">Address: <span class="text-info"></span></label>
                                                            <div class="col-sm">       
                                                                <input class="form-control" id="reviewer_address" placeholder="Reviewer address No" name="reviewer_address" value="{{$reviewer->reviewer_address}}">
                                                            </div>
                                                        </div>     
                                                    </div> 
                                                    <div class="col-sm-12">
                                                        <div class="form-group text-center">
                                                            <button type="submit" class="btn btn-primary px-5">Update Profile Reviewer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <center>
                                            <img src="{{asset('public/uploads/reviewer_image/'.$reviewer->reviewer_image)}}"style="height: 160px; width: 140px;">
                                        </center>
                                        <form method="post" autocomplete="off" action="update-image" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_email">Upload Photo: <span class="text-danger">*</span></label>
                                                <div class="col-sm">  
                                                    <input type="file" name="reviewer_image" id="reviewer_image" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary px-5">Update Profile Image</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3">
                                        <center>
                                            <img src="{{asset('public/uploads/reviewer_signature/'.$reviewer->reviewer_signature)}}" style="height: 60px; width: 220px;">
                                        </center>
                                        <form method="post" autocomplete="off" action="update-signature" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_email">Upload Signature: <span class="text-danger">*</span></label>
                                                <div class="col-sm">  
                                                    <input type="file" name="reviewer_signature" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <button type="submit" class="btn btn-primary px-5">Update Signature</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>                            
                            </div>
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
