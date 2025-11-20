<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('admin.include.head')
    </head>
    <body>
        <div id="wrapper">
            
            @include('admin.include.nav-bar')
            
           <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-5">                        
                        <h1 class="page-head-line">Add a new Reviewer</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('admin.include.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Enter Reviewer's Details</b>
                            </div>
                            <div class="panel-body">
                            <form method="post" autocomplete="off">
                                @csrf
                                <input type="hidden" name="reviewer_id" value="{{$reviewer->reviewer_id}}">
                                <div class="container-fluid"> 
                                    <div class="row card-body"> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_name">Name of the Reviewer:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_name" placeholder="Reviewer Name" name="reviewer_name" value="{{$reviewer->reviewer_name}}" required>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_email">Email ID of Reviewer:</label>
                                                <div class="col-sm">       
                                                    <input type="email" class="form-control" id="reviewer_email" placeholder="Reviewer Email ID" name="reviewer_email" value="{{$reviewer->reviewer_email}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_phone">Mobile No of Reviewer:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_phone" placeholder="Reviewer Phone No" name="reviewer_phone" onkeypress="return isNumber(event)" maxlength="10" minlength="10" value="{{$reviewer->reviewer_phone}}" required>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_address">Address:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_address" placeholder="Reviewer address No" name="reviewer_address" value="{{$reviewer->reviewer_address}}" required>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-12 text-center py-5">
                                            <button type="submit" class="btn btn-primary px-5">Update Reviewer Details</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
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
