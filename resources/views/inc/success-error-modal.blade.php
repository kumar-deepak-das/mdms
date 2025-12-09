@if($errors->any())
    <div class="modal fade" id="errorModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white"><i class="fa fa-info-circle"></i> Error</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{$errors->first()}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="em" data-toggle="modal" data-target="#errorModal"></span>
    <script>
        $('#em').click();
    </script>
@endif

@if(session()->has('error'))
    <div class="modal fade" id="errorModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white"><i class="fa fa-info-circle"></i> Error</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{session()->get('error')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="em" data-toggle="modal" data-target="#errorModal"></span>
    <script>
        $('#em').click();
    </script>
@endif

@if(session()->has('success'))
    <div class="modal fade" id="successModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white"><i class="fa fa-info-circle"></i> Success</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{session()->get('success')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="sm" data-toggle="modal" data-target="#successModal"></span>
    <script>
        $('#sm').click();
    </script>
@endif

@if(session()->has('info'))
    <div class="modal fade" id="infoModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white"><i class='fa fa-info-circle text-white'></i> Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body bg-dark text-white">
                    {{session()->get('info')}}
                </div>

                <!-- Modal footer -->
                <div class="modal-footer bg-secondary">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <span id="wm" data-toggle="modal" data-target="#infoModal"></span>
    <script>
        $('#wm').click();
    </script>
@endif