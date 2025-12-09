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
                        <h1 class="page-head-line">Paper Details</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('inc.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                      <!--   Kitchen Sink -->
                        <div class="panel panel-success">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Paper Details</b>
                            </div>
                            <div class="panel-body">
                                
                                <div class="row">
                                    <div class="col-md-12 text-center"><H2>{{$paper->paper_title}}</H2><hr/></div>
                                    <div class="col-md-4 table-responsive">
                                        <table class="table table-sm table-condensed table-bordered">
                                            <tr>
                                                <th class="text-right" style="width: 100px;">Roll No</th>
                                                <td>{!!$paper->roll!!}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Regn No</th>
                                                <td>{!!$paper->regn!!}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Name</th>
                                                <td>{!!$paper->student_name!!}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-8 table-responsive">
                                        <table class="table table-sm table-condensed table-bordered">
                                            <tr>
                                                <th class="text-right" style="width: 150px;">School</th>
                                                <td>{!!$paper->school_name!!}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Department Name</th>
                                                <td>{!!$paper->department_name!!}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Documents</th>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->cert_doc))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->cert_doc)!!}"><i class="fa fa-download"></i> Certificate</A>
                                                            @else
                                                                <a class="text-warning">Not Avalable</a>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->thesis_doc))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->thesis_doc)!!}"><i class="fa fa-download"></i> Thesis</A>
                                                            @else
                                                                <a class="text-warning">Not Avalable</a>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->data_sheet))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->data_sheet)!!}"><i class="fa fa-download"></i> Data Sheet</A>
                                                            @else
                                                                <p class="btn btn-xs btn-block" disabled>Data Sheet Not Avalable</p>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->other_doc))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->other_doc)!!}"><i class="fa fa-download"></i> Other Document</A>
                                                            @else
                                                                <p class="btn btn-xs btn-block" disabled>No Doc Avalable</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                

                                <div class="row">                                
                                    <div class="col-md-12 table-responsive mt-3">
                                        <H3 class="text-center py-3">Reviewers and Reviewes</H3>
                                        <table class="table table-sm table-condensed table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Reviewer Name</th>
                                                    <th>Assigned Date</th>
                                                    <th>Review Status</th>
                                                    <th>Remuneration</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php 
                                                $i=0;
                                                $assigned_reviewer = [-1];
                                            @endphp
                                            @foreach($reviews as $row)
                                                @php 
                                                    $i++;
                                                    $assigned_reviewer[]=$row->reviewer_id;
                                                @endphp
                                                <tr>
                                                    <td class='text-center'>{!!$i!!}</td>
                                                    <td>{!!$row->reviewer_name!!}</td>
                                                    <td class="text-center">{!!$row->created_on!!}</td>
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
                                                            <b class="label label-warning"> <i class="fa fa-clock-o"></i> Not Submited </b>
                                                        @elseif($row->review_status!=0 && $row->status==2)
                                                            <b class="label label-info"> <i class="fa fa-check"></i> Submited </b>
                                                        @elseif($row->review_status!=0 && $row->status==3)
                                                            <b class="label label-info"> <i class="fa fa-check"></i> Paied </b>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <A href="{{asset('admin/paper-review-status/'.$row->review_id)}}" class="btn btn-xs btn-info"> <i class="fa fa-bars"></i> Details </A>
                                                    </td>
                                                </tr>
                                            @endforeach                                            
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-sm btn-success m-3" data-toggle="modal" data-target="#reviewerModal">
                                            <i class="fa fa-plus"></i> Assign to a new Reviewer
                                        </button>                                      
                                    </div>

                                    <div class="col-md-12"> 
                                        <!-- Modal -->
                                        <div class="modal fade" id="reviewerModal" role="dialog" data-keyboard="false" data-backdrop="static">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-success">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Assign Reviewer</h4>
                                                    </div>
                                                    <div class="modal-body">       
                                                        <!-- <div class="row">
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-5">     
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm" for="school">School:</label>
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
                                                            <div class="col-md-5">    
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm" for="department">Department:</label>
                                                                    <div class="col-sm">       
                                                                        <select class="form-control" id="department" name="department" required>
                                                                            <option value="" selected disabled>Choose the Department</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Sl No</th>
                                                                        <th class="text-center">School</th>
                                                                        <th class="text-center">Department</th>
                                                                        <th class="text-center">Reviewer Name</th>
                                                                        <th class="text-center">Email & Phone</th>
                                                                        <!-- <th class="text-center">Adress</th> -->
                                                                        <th class="text-center">Assign</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i=0 @endphp
                                                                    @foreach($reviewers as $row)
                                                                        @php $i++ @endphp
                                                                        <tr>
                                                                            <td class='text-center'>{!!$i!!}</td>
                                                                            <td class='text-left'>{!!$row->school_name!!}</td>
                                                                            <td class='text-left'>{!!$row->department_name!!}</td>
                                                                            <td class='text-left'>{!!$row->reviewer_name!!}</td>
                                                                            <td class='text-left'>
                                                                                <i class="fa fa-envelope"></i> {!!$row->reviewer_email!!}<br/>
                                                                                <i class="fa fa-phone"></i> {!!$row->reviewer_phone!!}</td>
                                                                            <!-- <td class='text-left'>{!!$row->reviewer_address!!}</td> -->
                                                                            <td class='text-center'>
                                                                                @if(array_search($row->reviewer_id, $assigned_reviewer))
                                                                                    <span class="label label-danger"> Assigned </span>
                                                                                @else
                                                                                    <form method="post" action="{!!asset('admin/paper-reviewer-assign')!!}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="paper" value="{!!$paper->paper_id!!}">
                                                                                        <input type="hidden" name="reviewer" value="{!!$row->reviewer_id!!}">
                                                                                        <button class="btn btn-sm btn-success"> <i class='fa fa-plus-circle'></i> Assign </button>
                                                                                    </form>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <div class="text-center">
                                                                <A class="btn btn-sm btn-success" href="./reviewer-add"> <i class="fa fa-user"></i> Add a New Reviewer </A>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal End-->
                                    </div>
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
              "pageLength": 5
            } );
        </script>
    </body>
</html>
