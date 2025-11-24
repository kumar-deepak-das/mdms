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
                        <h1 class="page-head-line">New Paper</h1>
                        <!-- <h1 class="page-subhead-line">Brands / Manufacturers</h1> -->
                    </div>
                    <div class="col-md-7">@include('admin.include.success-error-message')</div>
                </div>
                <!-- /. ROW  -->
              
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Upload a Paper</b>
                            </div>
                            <div class="panel-body">
                                <form method="post" autocomplete="off" enctype="multipart/form-data">
                                    @csrf
                                    <div class="container-fluid"> 
                                        <div class="card-body"> 
                                            <div class="row"> 
                                                <div class="col-sm-3">     
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="school">Academic Session:</label>
                                                        <div class="col-sm">     
                                                            <select class="form-control" id="session" name="session" required>
                                                                <option value="" selected disabled>Choose the Session</option>
                                                                @foreach(config('app.sessions') as $s)
                                                                @if($s==old('session'))
                                                                <option value="{{$s}}" selected>{{$s}}</option>
                                                                @else
                                                                <option value="{{$s}}">{{$s}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
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
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="program">Program:</label>
                                                        <div class="col-sm">     
                                                            <select class="form-control" id="program" name="program" required>
                                                                <option value="" selected disabled>Choose the Program</option>
                                                                @foreach($programs as $p)
                                                                @if($p->program_id==old('program'))
                                                                <option value="{{$p->program_id}}" selected>{{$p->program_name}}</option>
                                                                @else
                                                                <option value="{{$p->program_id}}">{{$p->program_name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-sm-3"> 
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="roll">Roll No:</label>
                                                        <div class="col-sm">
                                                            <input class="form-control" id="roll" placeholder="University Roll No" name="roll" value="{{old('roll')}}" required onkeypress="return isNumber(event)" maxlength="10">
                                                        </div>
                                                    </div>     
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="regn">Regn No:</label>
                                                        <div class="col-sm">
                                                            <input class="form-control" id="regn" placeholder="University Registration No" name="regn" value="{{old('regn')}}" required onkeypress="return isNumber(event)" maxlength="15">
                                                        </div>
                                                    </div>    
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="student_name">Student Name:</label>
                                                        <div class="col-sm">
                                                            <input class="form-control" id="student_name" placeholder="Student Name" name="student_name" value="{{old('student_name')}}" required>
                                                        </div>
                                                    </div>   
                                                </div>
                                                <div class="col-sm-6">   
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="subject">Subject:</label>
                                                        <div class="col-sm">     
                                                            <select class="form-control" id="subject" name="subject" required>
                                                                <option value="" selected disabled>Choose the Subject</option>
                                                                @foreach($subjects as $s)
                                                                @if($s->subject_id==old('subject'))
                                                                <option value="{{$s->subject_id}}" selected>{{$s->subject_name}}</option>
                                                                @else
                                                                <option value="{{$s->subject_id}}">{{$s->subject_name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>       
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="roll">Paper Title:</label>
                                                        <div class="col-sm">
                                                            <textarea class="form-control no-resize h-100" style="height: 115px;" id="title" name="title" placeholder="Enter the Title of the Paper" required>{{old('title')}}</textarea>
                                                        </div>
                                                    </div>        
                                                </div> 
                                            </div>
                                            <hr class="my-5" />
                                            <div class="row">
                                                <div class="col-sm-3">  
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="cert_doc">Upload Certificate: <b class="text-danger">*</b> </label>
                                                        <div class="col-sm">       
                                                            <input type="file" class="form-control" id="cert_doc" placeholder="Upload the Certificate" name="cert_doc" value="{{old('cert_doc')}}" required accept="application/pdf">
                                                        </div>
                                                    </div>         
                                                </div> 
                                                <div class="col-sm-3"> 
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="thesis_doc">Upload Thesis: <b class="text-danger">*</b> </label>
                                                        <div class="col-sm">       
                                                            <input type="file" class="form-control" id="thesis_doc" placeholder="Upload the Thesis" name="thesis_doc" value="{{old('thesis_doc')}}" required accept="application/pdf">
                                                        </div>
                                                    </div>        
                                                </div> 
                                                <div class="col-sm-3">  
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="data_sheet">Upload Data Sheet: <b class="text-danger"></b> </label>
                                                        <div class="col-sm">       
                                                            <input type="file" class="form-control" id="data_sheet" placeholder="Upload the Data Sheet" name="data_sheet" value="{{old('data_sheet')}}" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                                        </div>
                                                    </div>       
                                                </div> 
                                                <div class="col-sm-3"> 
                                                    <div class="form-group">
                                                        <label class="control-label col-sm" for="other_doc">Upload Other Document:</label>
                                                        <div class="col-sm">       
                                                            <input type="file" class="form-control" id="other_doc" placeholder="Upload the paper" name="other_doc" value="{{old('other_doc')}}" accept="application/pdf">
                                                        </div>
                                                    </div>       
                                                </div> 

                                                <div class="col-sm-12 text-center py-5">
                                                    <button type="submit" class="btn btn-primary px-5"> <i class="fa fa-upload"></i> Upload Paper</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                </form>
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


        @include('admin.include.footer')
        
        @include('admin.include.bottom')
    </body>
</html>
