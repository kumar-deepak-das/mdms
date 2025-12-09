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
                               <b>List of Papers for Session {!!$session!!}</b>
                            </div>
                            <div class="panel-body" style="display: none;">
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
                                                <th class="text-center">Thesis ID</th>
                                                <th class="text-center">Paper Title</th>
                                                <th class="text-center">Review Status</th>
                                                <th class="text-center">Remuneration</th>
                                                <th class="text-center">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0 @endphp
                                            @foreach($papers as $row)
                                                @php $i++ @endphp
                                                <tr>
                                                    <td class='text-center'>{{$i}}</td>
                                                    <td class='text-left'>MDMS1000{{$row->review_id}}</td>
                                                    <td class='text-left'>{{$row->paper_title}}</td>
                                                    <td class="text-center">
                                                        @if($row->review_status==-1)
                                                            <b class="label label-danger"> <i class="fa fa-ban"></i> Rejected </b>
                                                        @elseif($row->review_status==0)
                                                            <b class="label label-warning"> <i class="fa fa-clock-o"></i> Pending </b>
                                                        @elseif($row->review_status==1)
                                                            <b class="label label-info"> <i class="fa fa-check"></i> Accept with Modified </b>
                                                        @elseif($row->review_status==2)
                                                            <b class="label label-success"> <i class="fa fa-check"></i> Accepted </b>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">

                                                        @if($row->review_status!=0 && $row->status==1)
                                                            <a class="btn btn-xs btn-warning" href="{{asset('reviewer/remuneration/'.$row->review_id)}}"> <i class="fa fa-credit-card"></i> Submit </a>
                                                        @elseif($row->review_status!=0 && $row->status==2)
                                                            <a class="btn btn-xs btn-success" href="{{asset('reviewer/remuneration/'.$row->review_id)}}"> <i class="fa fa-credit-card"></i> Submited </a>
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        <A href="{{asset('reviewer/paper-details/'.$row->review_id)}}" class="btn btn-xs btn-info"> Details </A>
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
