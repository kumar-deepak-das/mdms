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
                        <h1 class="page-head-line">Add a new Reviewer</h1>
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
                               <b>Enter Reviewer's Details</b>
                            </div>
                            <div class="panel-body">
                            <form method="post" autocomplete="off">
                                @csrf
                                <div class="container-fluid"> 
                                    <div class="row card-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="school">School: <span class="text-danger">*</span></label>
                                                <div class="col-sm">
                                                    <select class="form-control" id="school" name="school" required>
                                                        <option value="" selected disabled>Choose the School</option>
                                                        @foreach($schools as $s)
                                                        @if($s->school_id==old('school'))
                                                        <option value="{{$s->school_id}}" selected>{{$s->school_name}}</option>
                                                        @else
                                                        <option value="{{$s->school_id}}">{{$s->school_name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="department">Department: <span class="text-danger">*</span></label>
                                                <div class="col-sm">       
                                                    <select class="form-control" id="department" name="department" required>
                                                        <option value="" selected disabled>Choose the Department</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_name">Name of the Reviewer: <span class="text-danger">*</span></label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_name" placeholder="Reviewer Name" name="reviewer_name" value="{{old('reviewer_name')}}" required>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_email">Email ID of Reviewer: <span class="text-danger">*</span></label>
                                                <div class="col-sm">       
                                                    <input type="email" class="form-control" id="reviewer_email" placeholder="Reviewer Email ID" name="reviewer_email" value="{{old('reviewer_email')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_phone">Mobile No of Reviewer: <span class="text-danger">*</span></label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_phone" placeholder="Reviewer Phone No" name="reviewer_phone" onkeypress="return isNumber(event)" maxlength="10" minlength="10" value="{{old('reviewer_phone')}}" required>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_address">Address: <span class="text-info"></span></label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_address" placeholder="Reviewer address No" name="reviewer_address" value="{{old('reviewer_address')}}">
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-12 text-center py-5">
                                            <button type="submit" class="btn btn-primary px-5">Add Reviewer</button>
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

        <script>
            $(document).ready(function(){
                var school = "{{old('school')}}"; //$('#school').val();
                var department = "{{old('department')}}";
                
                $.ajax({
                    type: "GET",
                    url: "./get-departments",
                    data: {school : school, department : department },
                    success: function (data) {
                        $('#department').html(data);
                    }
                });


                $('#school').on('change', function() {
                    var school = $('#school').val();
                    $.ajax({
                        type: "GET",
                        url: "./get-departments",
                        data: {school : school },
                        success: function (data) {
                            $('#department').html(data);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
