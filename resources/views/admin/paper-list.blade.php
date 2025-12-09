<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('inc.head')
        <style>
            .un-checked {
              color: gray;
            }
            .checked {
              color: orange;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            
            @include('admin.include.nav-bar')
            
           <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-5">                        
                        <h1 class="page-head-line">Papers</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('inc.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                      <!--   Kitchen Sink -->
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>List of Papers for Session {!!$session!!}</b>
                            </div>
                            <div class="panel-body">
                                <form class="row" id="myForm">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="school">Academic Session:</label>
                                            <div class="col-md">     
                                                <select class="form-control" id="session" name="session" required  onchange="document.getElementById('myForm').submit();">
                                                    <option value="" selected disabled>Choose the Session</option>
                                                    @foreach(config('app.sessions') as $s)                                                    
                                                    <option value="{{$s}}" @if($s==$session) selected @endif>{{$s}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="school">School:</label>
                                            <div class="col-md">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="department">Department:</label>
                                            <div class="col-md">       
                                                <select class="form-control" id="department" name="department" required>
                                                    <option value="" selected disabled>Choose the Department</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">    
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <A href="./paper-list" class="btn btn-sm btn-warning btn-block"> <i class="fa fa-refresh"></i> Clear </A>
                                        </div>
                                    </div> -->
                                </form>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">School</th>
                                                <th class="text-center">Department</th>
                                                <th class="text-center">Roll No</th>
                                                <th class="text-center">Regn No</th>
                                                <th class="text-center">Name of the Student</th>
                                                <th class="text-center">Paper Title</th>
                                                <!-- <th class="text-center">Review Status</th> -->
                                                <th class="text-center">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($papers as $row)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td class='text-center'>{{$i}}</td>
                                                    <td class='text-left'>{{$row->school_name}}</td>
                                                    <td class='text-left'>{{$row->department_name}}</td>
                                                    <td class='text-left'>{{$row->roll}}</td>
                                                    <td class='text-left'>{{$row->regn}}</td>
                                                    <td class='text-left'>{{$row->student_name}}</td>
                                                    <td class='text-left'>{{$row->paper_title}}</td>
                                                    <!-- <td class="text-center">
                                                        @if(count($reviewers)==0)
                                                            <span>No Reviewers Assigned</span>
                                                        @else
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star un-checked"></span>
                                                        @endif
                                                    </td> -->
                                                    <td class='text-center'>
                                                        <A href="{{asset('admin/paper-details/'.$row->paper_id)}}" class="btn btn-xs btn-info"> <i class="fa fa-bars"></i> Details </A>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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


        @include('inc.footer')
        
        @include('inc.bottom')

        <script type="text/javascript">
            $('#dataTable').dataTable( {
              "pageLength": 20
            } );
        </script>

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
