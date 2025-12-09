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
                    <div class="col-md-3">                        
                        <h1 class="page-head-line">e-Copy Report</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>                    
                    <div class="col-md-9">
                        @include('inc.success-error-message')
                        <form>
                            <div class="form-group row">
                                <label class="mt-5 control-label col-sm-2 col-xs-3 text-right"><b>Date Range:</b></label>
                                <div class="mt-5 col-sm-2 col-xs-4">
                                    <input type="date" class="form-control form-control-sm" id="start_date" name="start_date" required value="{{$start_date}}">
                                </div>
                                <div class="mt-5 col-sm-1 col-xs-1 text-center"><b>to</b></div>
                                <div class="mt-5 col-sm-2 col-xs-4">
                                    <input type="date" class="form-control form-control-sm" id="enddate" name="end_date" required value="{{$end_date}}">
                                </div>
                                <div class="mt-5 col-sm-2 col-xs-6">
                                    <button type="submit" class="btn btn-sm btn-block btn-warning" id="search" name="search"><i class="fa fa-search"></i> Search</button>
                                </div>
                                <div class="mt-5 col-sm-2 col-xs-6">
                                    <button class="btn btn-sm btn-block btn-success" onclick="export_data()" type="button" style1="float:right;margin:20px;" ><b> <i class="fa fa-download"></i> Download</b></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Application Details</b>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive" style="overflow: scroll;">
                                    <table class="table table-sm table-bordered table-striped" id="datatable">
                                        <thead>
                                            <tr class="bg-dark text-white">
                                                <th class="text-center">Sl. No.</th>
                                                <th class="text-center">School Name</th>
                                                <th class="text-center">Student Name</th>
                                                <!-- <th class="text-center">Contact No</th> -->
                                                <!-- <th class="text-center">E-Mail</th> -->
                                                <th class="text-center">Roll No</th>
                                                <th class="text-center">Regn No</th>
                                                <th class="text-center">Application No</th>
                                                <th class="text-center">No. of Transcript's</th>
                                                <th class="text-center">Received Personally</th>
                                                <th class="text-center">Received by Post(IND)</th>
                                                <th class="text-center">Received by Post(INT)</th>
                                                <th class="text-center">Received by Same Address</th>
                                                <th class="text-center">Received by e-Copy</th>
                                                <th class="text-center">Application Date</th>
                                                <!-- <th class="text-center">Total Charges</th> -->
                                                <th class="text-center">Amount Paid</th>
                                                <th class="text-center">Payment Date</th>
                                                <th class="text-center">Payment Reference No</th>
                                                <th class="text-center">Remarks</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Last Updated</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=0; @endphp
                                            @foreach($trans as $t)
                                            @php $i++; @endphp
                                                <tr>
                                                    <td class='text-center'>{{$i}}</td>
                                                    <td class='text-left'>{{$t->school_name}}</td>
                                                    <td class='text-left'>{{$t->name}}</td>
                                                    <!-- <td class='text-left'>{{$t->phone}}</td> -->
                                                    <!-- <td class='text-left'>{{$t->email}}</td> -->
                                                    <td class='text-left'>{{$t->roll}}</td>
                                                    <td class='text-left'>{{$t->regn}}</td>
                                                    <td class='text-left'>{{$t->id}}</td>
                                                    <td class='text-center'>{{$t->qty}}</td>
                                                    <td class='text-center'>{{$t->dispatch0}}</td>
                                                    <td class='text-center'>{{$t->dispatch1}}</td>
                                                    <td class='text-center'>{{$t->dispatch2}}</td>
                                                    <td class='text-center'>{{$t->dispatch3}}</td>
                                                    <td class='text-center'>{{$t->dispatch4}}</td>
                                                    <td class='text-center'>{{ date_format(date_create($t->datetime),"d M y")}}</td>
                                                    <!-- <td class='text-right'>{{ number_format($t->charges,2)}}</td> -->
                                                    <td class='text-right'>{{ number_format($t->trans_amount,2)}}</td>
                                                    <td class='text-left'>{{ date_format(date_create($t->trans_date),"d-M-y")}}</td>
                                                    <td class='text-left'>{{$t->trans_no}}</td>
                                                    <td class='text-left'>{{$t->remark}}</td>
                                                    <td class='text-center'>{{$transcriptStatus[$t->status]}}</td>
                                                    <td class='text-left'>{{ date_format(date_create($t->last_updated),"d-M-Y")}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
                                    <script>
                                        function export_data(){
                                            let n = $('#datatable').DataTable().page.len();
                                            $('#datatable').DataTable().page.len(-1).draw();
                                            let data=document.getElementById('datatable');
                                            var fp=XLSX.utils.table_to_book(data,{sheet:'Transcript-Report'});
                                            XLSX.write(fp,{
                                                bookType:'xlsx',
                                                type:'base64'
                                            });
                                            XLSX.writeFile(fp, 'transcript-report.xlsx');
                                            $('#datatable').DataTable().page.len(n).draw();
                                        }
                                    </script>
                                </div>                                    
                            </div>
                        </div>
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
              // "pageLength": 20
            } );
        </script>
    </body>
</html>
