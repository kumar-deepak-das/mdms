<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('admin.include.head')
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
                    <div class="col-md-7">@include('admin.include.success-error-message')</div>
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
                                    <div class="col-sm-3">     
                                        <div class="form-group">
                                            <label class="control-label col-sm" for="school">Academic Session:</label>
                                            <div class="col-sm">     
                                                <select class="form-control" id="session" name="session" required  onchange="document.getElementById('myForm').submit();">
                                                    <option value="" selected disabled>Choose the Session</option>
                                                    @foreach(config('app.sessions') as $s)
                                                    @if($s==$session)
                                                    <option value="{{$s}}" selected>{{$s}}</option>
                                                    @else
                                                    <option value="{{$s}}">{{$s}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">Roll No</th>
                                                <th class="text-center">Regn No</th>
                                                <th class="text-center">Name of the Student</th>
                                                <th class="text-center">Paper Title</th>
                                                <th class="text-center">Subject</th>
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
                                                    <td class='text-left'>{{$row->roll}}</td>
                                                    <td class='text-left'>{{$row->regn}}</td>
                                                    <td class='text-left'>{{$row->student_name}}</td>
                                                    <td class='text-left'>{{$row->paper_title}}</td>
                                                    <td class='text-left'>{{$row->subject_name}}</td>
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
                                                        <A href="{{asset('admin/paper-details?paper_id='.$row->paper_id)}}" class="btn btn-xs btn-info"> <i class="fa fa-bars"></i> Details </A>
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


        @include('admin.include.footer')
        
        @include('admin.include.bottom')

        <script type="text/javascript">
            $('#dataTable').dataTable( {
              "pageLength": 20
            } );
        </script>
    </body>
</html>
