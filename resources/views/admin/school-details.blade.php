<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('inc.head')
    </head>
    <body>
        <div id="wrapper">
            
            @include('admin.include.nav-bar')
            
           <div id="page-wrapper">
            <div id="page-inner ">
                <div class="row">
                    <div class="col-md-5">                        
                        <h1 class="page-head-line">{{$school->school_name}}</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('inc.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-5">

                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Update School Details</b>
                            </div>
                            <div class="panel-body">
                                <form method="post" autocomplete="off" action="{{asset('admin/school-update')}}">
                                    @csrf
                                    <div class="container-fluid"> 
                                        <div class="row card-body">

                                            <div class="col-sm-12">              
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="school_name">Name of the School: <span class="text-danger">*</span></label>
                                                    <div class="col-sm">       
                                                        <input class="form-control" id="school_name" placeholder="School Name" name="school_name" required value="{{$school->school_name}}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="contact_person">Contact Person: <span class="text-danger">*</span></label>
                                                    <div class="col-sm">       
                                                        <input class="form-control" id="contact_person" placeholder="School Contact Person" name="contact_person" value="{{$school->contact_person}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="school_phone">Mobile No of Contact Person: <span class="text-danger">*</span></label>
                                                    <div class="col-sm">       
                                                        <input class="form-control" id="school_phone" placeholder="School Phone No" name="school_phone" onkeypress="return isNumber(event)" maxlength="10" value="{{$school->school_phone}}" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="school_email">Email ID of Contact Person: <span class="text-danger">*</span></label>
                                                    <div class="col-sm">       
                                                        <input type="email" class="form-control" id="school_email" placeholder="School Email ID" name="school_email" value="{{$school->school_email}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="school_id" value="{{$school->school_id}}" required>
                                                    <button type="submit" class="btn btn-block btn-primary px-5">Update School</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Add a new Department to {{$school->school_name}}</b>
                            </div>
                            <div class="panel-body">
                                <form method="post" autocomplete="off" action="{{asset('admin/school-department-add')}}">
                                    @csrf
                                    <div class="container-fluid"> 
                                        <div class="row card-body"> 
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="department">Name of the Department: <span class="text-danger">*</span></label>
                                                    <div class="col-sm">
                                                        <input class="form-control" id="department" placeholder="Department Name" name="department" required>
                                                    </div>
                                                </div>        
                                            </div> 
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="school">Select the School: <span class="text-danger">*</span></label>
                                                    <div class="col-sm">       
                                                        <select class="form-control" name="school" id="school" required>
                                                            <option selected disabled>Choose the School</option>
                                                            @foreach($schools as $s)
                                                                @if( $school->school_id == $s->school_id )
                                                                <option value="{{$s->school_id}}" selected>{{$s->school_name}}</option>
                                                                @else
                                                                <option value="{{$s->school_id}}">{{$s->school_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <!-- <div class="col-sm-4">                                    
                                                <div class="form-group">
                                                    <label class="control-label col-sm" for="contact_person">department Code:</label>
                                                    <div class="col-sm">       
                                                        <input class="form-control numberonly" id="code" placeholder="department Code" name="code" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                    </div>
                                                </div>     
                                            </div> --> 
                                            <div class="col-sm-12 text-center">
                                                <button type="submit" name="add_department" class="btn btn-block btn-primary px-5"> Add Department </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-7">

                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Different Departments in {{$school->school_name}}</b>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-condensed table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 60px;">Sl No</th>
                                                <th class="text-center">Departments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=0 @endphp
                                        @foreach($departments as $p)
                                            @php $i++ @endphp
                                            <tr>
                                            <td class='text-center'>{{$i}}</td>
                                            <td class='text-left'>{{$p->department_name}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
            $('#dataTable').dataTable( {
              // "pageLength": 20
            } );
        </script>
    </body>
</html>
