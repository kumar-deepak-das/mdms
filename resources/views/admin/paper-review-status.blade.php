<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('admin.include.head')
        <!--PAGE LEVELC STYLES-->
        <link href="{{ asset('public/assets/admin/css/invoice.css')}}" rel="stylesheet" />
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
                                    <div class="col-md-12 text-center"><H2>{!!$paper->paper_title!!}</H2><hr/></div>
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
                                                                <a class="btn btn-warning">Not Avalable</a>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->thesis_doc))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->thesis_doc)!!}"><i class="fa fa-download"></i>Thesis</A>
                                                            @else
                                                                <a class="btn btn-warning">Not Avalable</a>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->data_sheet))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->data_sheet)!!}"><i class="fa fa-download"></i> Data Sheet</A>
                                                            @else
                                                                <p class="btn btn-warning btn-xs btn-block" disabled>No Data Sheet Avalable</p>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-3 text-center">
                                                            @if(!empty($paper->other_doc))
                                                            <A target="_blank" class="btn btn-xs btn-block btn-info" href="{!!asset('public/uploads/papers/'.$paper->other_doc)!!}"><i class="fa fa-download"></i> Other Document</A>
                                                            @else
                                                                <p class="btn btn-warning btn-xs btn-block" disabled>No Doc Avalable</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!-- End  Kitchen Sink -->
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-md-12">
                      <!--   Kitchen Sink -->
                        <div class="panel panel-success">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Review Status</b>
                            </div>
                            <div class="panel-body" style="background: #505050;">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <!-- /. PAGE INNER  -->
                                    <div id="page-inner">
                                        <div class="row">
                                            <div class="col-md-12 text-center mt-5">
                                                <center>
                                                    <img src="{{ asset('public/assets/images/logo/kiit-logo-wide.png') }}" class="img-responsive" />
                                                </center>
                                                <h4><strong>Office of the Controller of Examination</strong></h4>
                                                <h1 class="page-head-line"></h1>
                                            </div>
                                        </div>
                                        <!-- /. ROW  -->
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div class="table-responsive mt-5">
                                                        <table class="table">
                                                            <tr>
                                                                <td class="text-right"><strong>Name of the Candidate</td>
                                                                <th> : </th>
                                                                <td>{!!$paper->student_name!!}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-right">Title of the Thesis</th>
                                                                <th> : </th>
                                                                <td>{!!$paper->paper_title!!}</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    <div class="table-responsive mt-5">
                                                        <table class="table table-bordered table-hover">
                                                            <thead class="bg-primary">
                                                                <tr class="">
                                                                    <td colspan="3"><strong>Recommedation: (Put Tick Mark in the Box)</strong></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <th class="text-left">1.</th>
                                                                    <th class="text-left">Accepted</th>
                                                                    <td class="text-center" style="width: 50px;">
                                                                         @if($rn->accept=='accept') 
                                                                            <i class="fa fa-check"></i>
                                                                         @endif
                                                                        <!-- <input type="radio" required name="accept" id="accept1" value="accept" onclick="toggleTextarea()" @if($rn->accept=='accept') checked @endif /> -->
                                                                    </td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th class="text-left">2.</th>
                                                                    <th class="text-left">
                                                                        Accepted After Correction.<br/>
                                                                        (<i>The Corrections are to be verified by the Internal Committee at he University Level</i>) 
                                                                    </th>
                                                                    <td>
                                                                         @if($rn->accept=='modification') 
                                                                            <i class="fa fa-check"></i>
                                                                         @endif
                                                                        <!-- <input type="radio" required name="accept" id="accept2" value="modification" onclick="toggleTextarea()" @if($rn->accept=='modification') checked @endif /> -->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>3.</th>
                                                                    <td>
                                                                        <strong>Rejected (Please Give Reason)</strong>
                                                                        @if($rn->accept=='reject') 
                                                                        <p class="mt-3 text-danger">{!!$rn->rem!!}</p>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                         @if($rn->accept=='reject') 
                                                                            <i class="fa fa-check"></i>
                                                                         @endif
                                                                        <!-- <input type="radio" required name="accept" name="accept3" value="reject" onclick="toggleTextarea()" @if($rn->accept=='reject') checked @endif /> -->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="table-responsive mt-5">
                                                        <table class="table table-bordered table-hover">
                                                            <thead class="bg-primary">
                                                                <tr class="text-center">
                                                                    <th class="text-left" colspan="2">General Report:</th>
                                                                    <th> Yes </th>
                                                                    <th> No </th>
                                                                    <th> Can't Say </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="text-center">
                                                                    <th>1.</th>
                                                                    <th class="text-left">Is this Thesis Work Original?</th>
                                                                    <td>
                                                                        @if($rn->original=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->original=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->original=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td for="reliable1" class="text-center"><input type="radio" required name="original" id="original1" value="Yes" @if($rn->original=="Yes") checked @endif /> <label for="original1"> Yes </label></td>
                                                                    <td for="reliable2" class="text-center"><input type="radio" required name="original" id="original2" value="No" @if($rn->original=="No") checked @endif /> <label for="original2"> No </label></td>
                                                                    <td for="reliable3" class="text-center"><input type="radio" required name="original" id="original3" value="Can't Say" @if($rn->original=="Can't Say") checked @endif /> <label for="original3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th rowspan="5">2.</th>
                                                                    <th class="text-left">Is the Thesis Scientifically Reliable?</th>
                                                                    <td>
                                                                        @if($rn->reliable=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->reliable=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->reliable=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="reliable" id="reliable1" value="Yes" @if($rn->reliable=="Yes") checked @endif /> <label for="reliable1"> Yes </label></td>
                                                                    <td><input type="radio" required name="reliable" id="reliable2" value="No" @if($rn->reliable=="No") checked @endif /> <label for="reliable2"> No </label></td>
                                                                    <td><input type="radio" required name="reliable" id="reliable3" value="Can't Say" @if($rn->reliable=="Can't Say") checked @endif /> <label for="reliable3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th class="pl-5 text-left">Design</th>
                                                                    <td>
                                                                        @if($rn->design=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->design=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->design=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="design" id="design1" value="Yes" @if($rn->design=="Yes") checked @endif /> <label for="design1"> Yes </label></td>
                                                                    <td><input type="radio" required name="design" id="design2" value="No" @if($rn->design=="No") checked @endif /> <label for="design2"> No </label></td>
                                                                    <td><input type="radio" required name="design" id="design3" value="Can't Say" @if($rn->design=="Can't Say") checked @endif /> <label for="design3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th class="pl-5 text-left">Techniques</th>
                                                                    <td>
                                                                        @if($rn->techniques=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->techniques=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->techniques=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="techniques" id="techniques1" value="Yes" @if($rn->techniques=="Yes") checked @endif /> <label for="techniques1"> Yes </label></td>
                                                                    <td><input type="radio" required name="techniques" id="techniques2" value="No" @if($rn->techniques=="No") checked @endif /> <label for="techniques2"> No </label></td>
                                                                    <td><input type="radio" required name="techniques" id="techniques3" value="Can't Say" @if($rn->techniques=="Can't Say") checked @endif /> <label for="techniques3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th class="pl-5 text-left">Results</th>
                                                                    <td>
                                                                        @if($rn->results=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->results=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->results=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="results" id="results1" value="Yes" @if($rn->results=="Yes") checked @endif /> <label for="results1"> Yes </label></td>
                                                                    <td><input type="radio" required name="results" id="results2" value="No" @if($rn->results=="No") checked @endif /> <label for="results2"> No </label></td>
                                                                    <td><input type="radio" required name="results" id="results3" value="Can't Say" @if($rn->results=="Can't Say") checked @endif /> <label for="results3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th class="pl-5 text-left">Interpretation</th>
                                                                    <td>
                                                                        @if($rn->interpretation=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->interpretation=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->interpretation=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="interpretation" id="interpretation1" value="Yes" @if($rn->interpretation=="Yes") checked @endif /> <label for="interpretation1"> Yes </label></td>
                                                                    <td><input type="radio" required name="interpretation" id="interpretation2" value="No" @if($rn->interpretation=="No") checked @endif /> <label for="interpretation2"> No </label></td>
                                                                    <td><input type="radio" required name="interpretation" id="interpretation3" value="Can't Say" @if($rn->interpretation=="Can't Say") checked @endif /> <label for="interpretation3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>3.</th>
                                                                    <th class="text-left">Is the research work worth publication?</th>
                                                                    <td>
                                                                        @if($rn->publication=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->publication=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->publication=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="publication" id="publication1" value="Yes" @if($rn->publication=="Yes") checked @endif /> <label for="publication1"> Yes </label></td>
                                                                    <td><input type="radio" required name="publication" id="publication2" value="No" @if($rn->publication=="No") checked @endif /> <label for="publication2"> No </label></td>
                                                                    <td><input type="radio" required name="publication" id="publication3" value="Can't Say" @if($rn->publication=="Can't Say") checked @endif /> <label for="publication3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>4.</th>
                                                                    <th class="text-left">Is statistical analysis and interpretation adequate and appropriate?</th>
                                                                    <td>
                                                                        @if($rn->statistical=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->statistical=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->statistical=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="statistical" id="statistical1" value="Yes" @if($rn->statistical=="Yes") checked @endif /> <label for="statistical1"> Yes </label></td>
                                                                    <td><input type="radio" required name="statistical" id="statistical2" value="No" @if($rn->statistical=="No") checked @endif /> <label for="statistical2"> No </label></td>
                                                                    <td><input type="radio" required name="statistical" id="statistical3" value="Can't Say" @if($rn->statistical=="Can't Say") checked @endif /> <label for="statistical3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>5.</th>
                                                                    <th class="text-left">Are the major conclusions clear and justified?</th>
                                                                    <td>
                                                                        @if($rn->conclusions=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->conclusions=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->conclusions=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="conclusions" id="conclusions1" value="Yes" @if($rn->statistical=="Yes") checked @endif /> <label for="conclusions1"> Yes </label></td>
                                                                    <td><input type="radio" required name="conclusions" id="conclusions2" value="No" @if($rn->statistical=="No") checked @endif /> <label for="conclusions2"> No </label></td>
                                                                    <td><input type="radio" required name="conclusions" id="conclusions3" value="Can't Say" @if($rn->statistical=="Can't Say") checked @endif /> <label for="conclusions3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>6.</th>
                                                                    <th class="text-left">Are the references up-to-date and relevant?</th>
                                                                    <td>
                                                                        @if($rn->references=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->references=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->references=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="references" id="references1" value="Yes" @if($rn->references=="Yes") checked @endif /> <label for="references1"> Yes </label></td>
                                                                    <td><input type="radio" required name="references" id="references2" value="No" @if($rn->references=="No") checked @endif /> <label for="references2"> No </label></td>
                                                                    <td><input type="radio" required name="references" id="references3" value="Can't Say" @if($rn->references=="Can't Say") checked @endif /> <label for="references3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>7.</th>
                                                                    <th class="text-left">Are figures correctly drawn?<br/><i><small>(e.g. proper axis scales, depiction of error bars, proper legends)</small></i></th>
                                                                    <td>
                                                                        @if($rn->figures=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->figures=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->figures=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="figures" id="figures1" value="Yes" @if($rn->references=="Yes") checked @endif /> <label for="figures1"> Yes </label></td>
                                                                    <td><input type="radio" required name="figures" id="figures2" value="No" @if($rn->references=="No") checked @endif /> <label for="figures2"> No </label></td>
                                                                    <td><input type="radio" required name="figures" id="figures3" value="Can't Say" @if($rn->references=="Can't Say") checked @endif /> <label for="figures3"> Can't Say </label></td> -->
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <th>8.</th>
                                                                    <th class="text-left">Is there any repetition of information in the text?</th>
                                                                    <td>
                                                                        @if($rn->repetition=="Yes") <i class="fa fa-check"></i> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->repetition=="No")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($rn->repetition=="Can't Say")  <i class="fa fa-check"></i>  @endif
                                                                    </td>
                                                                    <!-- <td><input type="radio" required name="repetition" id="repetition1" value="Yes" @if($rn->repetition=="Yes") checked @endif /> <label for="repetition1"> Yes </label></td>
                                                                    <td><input type="radio" required name="repetition" id="repetition2" value="No" @if($rn->repetition=="No") checked @endif /> <label for="repetition2"> No </label></td>
                                                                    <td><input type="radio" required name="repetition" id="repetition3" value="Can't Say" @if($rn->repetition=="Can't Say") checked @endif /> <label for="repetition3"> Can't Say </label></td> -->
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <Strong>Comment:</Strong>
                                                        <p>{!!$rn->comment!!}</p>
                                                    </div>
                                                    
                                                    <hr/>
                                               </div>
                                            </div>
                                            @if($paper->review_status!=0)
                                            <div  class="row mb-5 pad-top-botm1 client-info">

                                                <div class="col-md-1"></div>
                                                <div class="col-md-5">
                                                
                                                    <h4><strong>Reviewed By </strong></h4>
                                                    <strong>{!!$paper->reviewer_name!!}</strong>
                                                    <br />
                                                    <b>Call :</b> {!!$paper->reviewer_phone!!}
                                                    <br />
                                                    <b>E-mail :</b> {!!$paper->reviewer_email!!}
                                                </div>
                                                <div class="col-md-5 text-right">
                                                    <!-- <h4>  <strong></strong></h4> -->
                                                    <!-- <strong>  Jhon Deo Chuixae</strong> -->
                                                    <b>Review Date :</b> {!!date_format(date_create($rn->review_date),"d-M-yy")!!}
                                                </div>
                                            </div>
                                            @else
                                            <div  class="row mb-5 pad-top-botm client-info">

                                                <div class="col-md-12">
                                                    <H2 class="text-center text-warning">Review Pending</H2>
                                                </div>
                                            </div>
                                            @endif
                                        </form>

                                         
                                    </div>
                                    <!-- /. PAGE INNER  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                        

        </div>
        <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->            


        @include('admin.include.footer')
        
        @include('admin.include.bottom')

        <script type="text/javascript">
            $('#dataTable').dataTable( {
              "pageLength": 5
            } );
        </script>
    </body>
</html>
