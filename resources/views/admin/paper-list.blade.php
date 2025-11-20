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
                               <b>List of Reviewers</b>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">Paper ID</th>
                                                <th class="text-center">Roll No</th>
                                                <th class="text-center">Regn No</th>
                                                <th class="text-center">Nme of the Student</th>
                                                <th class="text-center">School</th>
                                                <th class="text-center">Program</th>
                                                <th class="text-center">Subject</th>
                                                <!-- <th class="text-center">Status</th> -->
                                                <th class="text-center">Review Status</th>
                                                <th class="text-center">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($papers as $row)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td class='text-center'>{{$i}}</td>
                                                    <td class='text-left'>{{$row->paper_id}}</td>
                                                    <td class='text-left'>{{$row->roll}}</td>
                                                    <td class='text-left'>{{$row->regn}}</td>
                                                    <td class='text-left'>{{$row->student_name}}</td>
                                                    <td class='text-left'>{{$row->school_name}}</td>
                                                    <td class='text-left'>{{$row->program_name}}</td>
                                                    <td class='text-left'>{{$row->subject_name}}</td>
                                                    <td class="text-center">
                                                        @if(count($reviewers)==0)
                                                            <span>No Reviewers Assigned</span>
                                                        @else
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star un-checked"></span>
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        <A href="{{asset('admin/paper-details?id='.$row->paper_id)}}" class="btn btn-sm btn-info"> Details </A>
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
