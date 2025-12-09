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
                        <h1 class="page-head-line">Schools</h1>
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
                               <b>Schools of KIIT Deemed to be University</b>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">School Name</th>
                                                <th class="text-center">Contact Person</th>
                                                <th class="text-center">Phone</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Status</th>
                                                <!-- <th class="text-center">Password</th> -->
                                                <th class="text-center">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($schools as $row)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td class='text-center'>{{$i}}</td>
                                                    <td class='text-left'>{{$row->school_name}}</td>
                                                    <td class='text-left'>{{$row->contact_person}}</td>
                                                    <td class='text-left'>{{$row->school_phone}}</td>
                                                    <td class='text-left'>{{$row->school_email}}</td>
                                                    <td class='text-center'>
                                                        @if($row->active==1)
                                                            <i class='fa fa-check' style='color:green;'></i>
                                                        @else
                                                            <i class='fa fa-window-close' style='color:red;'></i>
                                                        @endif
                                                    </td>
                                                    <!-- <td class='text-center'>
                                                        <form method='post' action="{{asset('admin/school-password-reset')}}">
                                                            @csrf
                                                            <input type='hidden' name='school_id' value="{{$row->school_id}}">
                                                            <input type='submit' class='btn btn-sm btn-danger' name='reset' value='Reset' onClick='return confirmSubmit("Are you sure to Reset the Password to kiit@123?");'>
                                                        </form>
                                                    </td> -->
                                                    <td class='text-center'>
                                                        <A href="{{asset('admin/school-details/'.$row->school_id)}}" class="btn btn-sm btn-info"> Details </A>
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
    </body>
</html>
