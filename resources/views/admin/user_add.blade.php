<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    @include('inc.head')
</head>
<body>
    <div id="wrapper">

        @include('admin.include.nav-bar')

        <div id="page-wrapper">
            <div id="page-inner" style="border: solid;">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Admission</h1>
                    </div>
                </div> -->
                <!-- /. ROW  -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Add a new User</div>
                            <form method="post" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="panel-body row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">                 
                                        <div class="form-group">
                                            <label>User Name: <span class="text-danger">*</span></label>
                                            <input class="form-control text-uppercase" name="username" value="{{ old('username') }}" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Mail Id: <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control text-uppercase" name="useremail" value="{{ old('useremail') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Contact  No: <span class="text-danger">*</span></label>
                                            <input class="form-control text-uppercase" name="userphone" value="{{ old('userphone') }}" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" minlength="10" required/>
                                        </div>                     
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Branch: <span class="text-danger">*</span></label>
                                            <select class="form-control" name="userbranch"required>
                                                <option value="">Select the Branch</option>
                                                @foreach($branches as $branch)
                                                <option value="{{$branch->branchid}}">{{$branch->branchname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Remark: <span class="text-danger"></span></label>
                                            <textarea class="form-control text-uppercase" name="userremark" style="resize: none;height: 115px;">{{ old('userremark') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                    
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">    
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block"> Add User </button>
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="min-height: 80px;">
                                        @include('inc.success-error-message')
                                    </div>
                                </div>
                            </form>
                        </div>
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
</body>
</html>
