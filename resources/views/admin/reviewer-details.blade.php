<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('admin.include.head')
    </head>
    <body>
        <div id="wrapper">
            
            @include('admin.include.nav-bar')
            
           <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-5">                        
                        <h1 class="page-head-line">Reviewer Details</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('admin.include.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>View or Update Reviewer's Details</b>
                            </div>
                            <div class="panel-body">
                            <form method="post" autocomplete="off">
                                @csrf
                                <input type="hidden" name="reviewer_id" value="{{$reviewer->reviewer_id}}">
                                <div class="container-fluid"> 
                                    <div class="row card-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_name">Name of the Reviewer:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_name" placeholder="Reviewer Name" name="reviewer_name" value="{{$reviewer->reviewer_name}}" required>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_email">Email ID of Reviewer:</label>
                                                <div class="col-sm">       
                                                    <input type="email" class="form-control" id="reviewer_email" placeholder="Reviewer Email ID" name="reviewer_email" value="{{$reviewer->reviewer_email}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_phone">Mobile No of Reviewer:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_phone" placeholder="Reviewer Phone No" name="reviewer_phone" onkeypress="return isNumber(event)" maxlength="10" minlength="10" value="{{$reviewer->reviewer_phone}}" required>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label class="control-label col-sm" for="reviewer_address">Address:</label>
                                                <div class="col-sm">       
                                                    <input class="form-control" id="reviewer_address" placeholder="Reviewer address No" name="reviewer_address" value="{{$reviewer->reviewer_address}}" required>
                                                </div>
                                            </div>     
                                        </div> 
                                        <div class="col-sm-3 text-center py-5">
                                            <button type="submit" class="btn btn-primary px-5">Update Reviewer Details</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>

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
                                                <input type="hidden" name="id" value="{{$reviewer->reviewer_id}}">
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
                                                    <td class='text-left'>{{$row->roll}}</td>
                                                    <td class='text-left'>{{$row->regn}}</td>
                                                    <td class='text-left'>{{$row->student_name}}</td>
                                                    <td class='text-left'>{{$row->paper_title}}</td>
                                                    <td class='text-left'>{{$row->subject_name}}</td>
                                                    <td class="text-center">
                                                        @if($row->review_status==-1)
                                                            <b class="label label-danger"> Rejected </b>
                                                        @elseif($row->review_status==0)
                                                            <b class="label label-warning"> Pending </b>
                                                        @elseif($row->review_status==1)
                                                            <b class="label label-info"> Accept with Modified </b>
                                                        @elseif($row->review_status==2)
                                                            <b class="label label-success"> Accepted </b>
                                                        @endif
                                                    </td>
                                                    <td class='text-center'>
                                                        <A href="{{asset('admin/paper-review-status?review_id='.$row->review_id)}}" class="btn btn-sm btn-info"> <i class="fa fa-bars"></i> Details </A>
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
    </body>
</html>
