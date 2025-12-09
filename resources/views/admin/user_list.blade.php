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
                        <h1 class="page-head-line">Users</h1>
                        <h1 class="page-subhead-line">Brands / Manufacturers</h1>
                    </div>
                    <div class="col-md-7">@include('inc.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                      <!--   Kitchen Sink -->
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               Student List
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered table-hover">
                                        <thead class="bg-primary tetxt-white">
                                        <tr>
                                            <th>SLNO</th>
                                            <!-- <th>USER ID</th> -->
                                            <th>USER NAME</th>
                                            <th>EMAIL</th>
                                            <th>PHONE</th>
                                            <th>BRANCH</th>
                                            <th>STATUS</th>
                                            <th>DETAILS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=0 @endphp
                                        @foreach($users as $user)                                    
                                            @php $i++ @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <!-- <td>{{$user->userid}}</td> -->
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->useremail}}</td>
                                                <td>{{$user->userphone}}</td>
                                                <td>{{$user->branchname}}</td>
                                                <td class="text-center"><big><big>
                                                    @if($user->userstatus)
                                                        <i class="fa fa-toggle-on text-success"></i>
                                                    @else
                                                        <i class="fa fa-toggle-on text-danger"></i>
                                                    @endif
                                                </big></big></td>
                                                <td class="text-center"><A href="{{Config::get('app.url')}}/admin/user-view?userid={{$user->userid}}" class="label label-success"> Details </A></td>
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
                    
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-responsive" src="{{ asset('public/assets/image/logo/renric.jpg') }}">
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
