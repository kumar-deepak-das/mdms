<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('admin.include.head')
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
                    <div class="col-md-7">@include('admin.include.success-error-message')</div>
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
                                    <div class="col-md-5 table-responsive">
                                        <table class="table table-sm table-condensed table-bordered">
                                            <tr>
                                                <th class="text-right">Roll No</th>
                                                <td>{!!$paper->roll!!}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Regn No</th>
                                                <td>{!!$paper->regn!!}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Student Name</th>
                                                <td>{!!$paper->student_name!!}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-right">School</th>
                                                <td>{!!$paper->school_name!!}</th>
                                            </tr>
                                            <tr>
                                                <th class="text-right">Program Name</th>
                                                <td>{!!$paper->program_name!!}</th>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-md-7 table-responsive">
                                        <table class="table table-sm table-condensed table-bordered">
                                            <tr>
                                                <th class="text-right">Subject</th>
                                                <td>{!!$paper->subject_name!!}</th>
                                            </tr>
                                            <tr style="height: 95px;">
                                                <th class="text-right">Title:</th>
                                                <td>{!!$paper->paper_title!!}</th>
                                            </tr>
                                            <tr>
                                                <td>Review:</td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>

                                <div class="row">

                                    <div class="col-md-3 text-center py-3">
                                        @if(!empty($paper->cert_doc))
                                        <A target="_blank" class="btn btn-sm btn-block btn-info" href="{!!asset('public/uplaods/papers/'.$paper->cert_doc)!!}"><i class="fa fa-download"></i> Certificate</A>
                                        @else
                                            <a class="text-warning">Not Avalable</a>
                                        @endif
                                    </div>

                                    <div class="col-md-3 text-center py-3">
                                        @if(!empty($paper->thesis_doc))
                                        <A target="_blank" class="btn btn-sm btn-block btn-info" href="{!!asset('public/uplaods/papers/'.$paper->thesis_doc)!!}"><i class="fa fa-download"></i> Thesis</A>
                                        @else
                                            <a class="text-warning">Not Avalable</a>
                                        @endif
                                    </div>

                                    <div class="col-md-3 text-center py-3">
                                        @if(!empty($paper->data_sheet))
                                        <A target="_blank" class="btn btn-sm btn-block btn-info" href="{!!asset('public/uplaods/papers/'.$paper->data_sheet)!!}"><i class="fa fa-download"></i> Data Sheet</A>
                                        @else
                                            <a class="text-warning">Data Sheet Not Avalable</a>
                                        @endif
                                    </div>

                                    <div class="col-md-3 text-center py-3">
                                        @if(!empty($paper->other_doc))
                                        <A target="_blank" class="btn btn-sm btn-block btn-info" href="{!!asset('public/uplaods/papers/'.$paper->other_doc)!!}"><i class="fa fa-download"></i> Other Document</A>
                                        @else
                                            <a class="text-warning">No Doc Avalable</a>
                                        @endif
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
                                                    <th>Status</th>
                                                    <th>Review Status</th>
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
                                                    @if($row->review_status==0)
                                                        <b class="label label-danger"> Not Reviewed </b>
                                                    @else
                                                        <b class="label label-success"> Reviewed </b>
                                                    @endif
                                                    </td>
                                                    <td></td>
                                                    <td class="text-center">
                                                        <A href="" class="btn btn-xs btn-info"> <i class="fa fa-bars"></i> Details </A>
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
                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-condensed table-bordered" id="dataTable">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Sl No</th>
                                                                        <th class="text-center">Reviewer Name</th>
                                                                        <th class="text-center">Email</th>
                                                                        <th class="text-center">Phone</th>
                                                                        <th class="text-center">Adress</th>
                                                                        <th class="text-center">Assign</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $i=0 @endphp
                                                                    @foreach($reviewers as $row)
                                                                        @php $i++ @endphp
                                                                        <tr>
                                                                            <td class='text-center'>{!!$i!!}</td>
                                                                            <td class='text-left'>{!!$row->reviewer_name!!}</td>
                                                                            <td class='text-left'>{!!$row->reviewer_email!!}</td>
                                                                            <td class='text-left'>{!!$row->reviewer_phone!!}</td>
                                                                            <td class='text-left'>{!!$row->reviewer_address!!}</td>
                                                                            <td class='text-center'>
                                                                                @if(array_search($row->reviewer_id, $assigned_reviewer))
                                                                                    <span class="label label-danger"> Assigned </span>
                                                                                @else
                                                                                    <form method="post" action="{!!asset('admin/paper-reviewer-assign')!!}">
                                                                                        @csrf
                                                                                        <input type="hidden" name="paper" value="{!!$paper->paper_id!!}">
                                                                                        <input type="hidden" name="reviewer" value="{!!$row->reviewer_id!!}">
                                                                                        <button class="btn btn-xs btn-success"> <i class='fa fa-plus-circle'></i> Assign </button>
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


        @include('admin.include.footer')
        
        @include('admin.include.bottom')

        <script type="text/javascript">
            $('#dataTable').dataTable( {
              "pageLength": 20
            } );
        </script>
    </body>
</html>
