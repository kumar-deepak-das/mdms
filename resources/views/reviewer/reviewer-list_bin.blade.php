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
                               <b>List of Papers</b>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sl No</th>
                                                <th class="text-center">Reviewer Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Phone</th>
                                                <th class="text-center">Adress</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($reviewers as $row)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td class='text-center'>{{$i}}</td>
                                                    <td class='text-left'>{{$row->reviewer_name}}</td>
                                                    <td class='text-left'>{{$row->reviewer_email}}</td>
                                                    <td class='text-left'>{{$row->reviewer_phone}}</td>
                                                    <td class='text-left'>{{$row->reviewer_address}}</td>
                                                    <td class='text-center'>
                                                        @if($row->reviewer_status==1)
                                                            <i class='fa fa-check' style='color:green;'></i>
                                                        @else
                                                            <i class='fa fa-window-close' style='color:red;'></i>
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        <A href="{{asset('reviewer/reviewer-details?id='.$row->reviewer_id)}}" class="btn btn-sm btn-info"> Details </A>
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
