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
                    <div class="col-md-5">                        
                        <h1 class="page-head-line">
                            Add a new School Details
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('inc.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Enter School Details</b>
                            </div>
                            <div class="panel-body">
                            <form method="post" autocomplete="off">
                                @csrf
                                <div class="container-fluid"> 
                                    <div class="row card-body"> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="school_name">Name of the School:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="school_name" placeholder="School Name" name="school_name" value="{{$school->school_name}}" required>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="username">School Username:</label>
                                                <div class="col-sm">
                                                    <input class="form-control" id="username" placeholder="School Login Username" name="username" value="{{$school->username}}" required readonly>
                                                </div>
                                            </div>        
                                        </div> 
                                        <div class="col-sm-6">                                    
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="contact_person">Contact Person:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="contact_person" placeholder="School Contact Person" name="contact_person" value="{{$school->contact_person}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="school_phone">Mobile No of Contact Person:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="school_phone" placeholder="School Phone No" name="school_phone" onkeypress="return isNumber(event)" maxlength="10" value="{{$school->school_phone}}" required>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-6">                                       
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="school_email">Email ID of Contact Person:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="school_email" placeholder="School Email ID" name="school_email" value="{{$school->school_email}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 text-center py-5">
                                            <button type="submit" class="btn btn-primary px-5">Update School</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="hidden" name="school_id" value="{{$school->school_id}}" required>
                                        </div>
                                        <div class="col-sm-8 py-5">
                                            @include('inc.success-error-message')
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


        @include('inc.footer')
        
        @include('inc.bottom')

        <script type="text/javascript">
            $('#datatable').dataTable( {
              "pageLength": 20
            } );
        </script>
    </body>
</html>
