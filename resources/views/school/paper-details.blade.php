<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('admin.include.head')
    </head>
    <body>
        <div id="wrapper">
            
            @include('school.include.nav-bar')
            
           <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-5">                        
                        <h1 class="page-head-line">Paper Details</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('admin.include.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                      <!--   Kitchen Sink -->
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Paper Detaails</b>
                            </div>
                            <div class="panel-body row">

                                <div class="col-md-4 table-responsive">
                                    <table class="table table-sm table-condensed table-bordered">
                                        <tr>
                                            <th class="text-right">Roll No</th>
                                            <td>{{$paper->roll}}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Regn No</th>
                                            <td>{{$paper->regn}}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Student Name</th>
                                            <td>{{$paper->student_name}}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-right">School</th>
                                            <td>{{$paper->school_name}}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Program Name</th>
                                            <td>{{$paper->program_name}}</th>
                                        </tr>
                                        <tr>
                                            <th class="text-right">Subject Name</th>
                                            <td>{{$paper->subject_name}}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                         <!-- End  Kitchen Sink -->
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
