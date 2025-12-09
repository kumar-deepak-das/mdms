                        <div class="panel panel-primary">
                            <div class="panel-heading" style="letter-spacing: 3px;">
                               <b>Application Status</b>
                            </div>
                            <div class="panel-body">
                                <!-- //Application Status Section -->
                                <div class="row card-body">
                                    @if($app->status==-1)
                                    <div class="col-md-12">
                                    @else
                                    <div class="col-md-5">
                                    @endif
                                        <div class="stepper-wrapper">
                                            
                                            <div class="stepper-item @if($app->status >= 0) completed @endif">
                                              <div class="step-counter">0</div>
                                              <div class="step-name text-center">Applied</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->datetime)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->datetime))}}
                                                @endif
                                              </div>
                                            </div>
                                            
                                            <div class="stepper-item @if($app->status==0) active @elseif($app->status>=1) completed @endif">
                                              <div class="step-counter">1</div>
                                              <div class="step-name text-center">Document Uploaded</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->documentUploadedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->documentUploadedOn))}}
                                                @endif
                                              </div>
                                            </div>

                                            <div class="stepper-item @if($app->status==1) active @elseif($app->status>=2) completed @endif">
                                              <div class="step-counter">2</div>
                                              <div class="step-name text-center">Payment Uploaded</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->paymentUploadedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->paymentUploadedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                            
                                            @if($app->status==-1)
                                            <div class="stepper-item active completed">
                                              <div class="step-counter" style="background: #FF0000;">2</div>
                                              <div class="step-name text-center text-danger">Rejected</div>
                                              <div class="step-name text-center ml-2 mr-2 text-danger">
                                                @if(!empty(trim($app->closedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->closedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @if($app->status!=-1)
                                    <div class="col-md-7">
                                        <div class="stepper-wrapper">
                                            <div class="stepper-item @if($app->status==2) active @elseif($app->status>=3) completed @endif">
                                              <div class="step-counter">3</div>
                                              <div class="step-name text-center">Verified</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->verifiedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->verifiedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                            <div class="stepper-item @if($app->status==3) active @elseif($app->status>=4) completed @endif">
                                              <div class="step-counter">4</div>
                                              <div class="step-name text-center">Approved</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->approvedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->approvedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                            <div class="stepper-item @if($app->status==4) active @elseif($app->status>=5) completed @endif">
                                              <div class="step-counter">5</div>
                                              <div class="step-name text-center">Printed</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->printedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->printedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                            <div class="stepper-item @if($app->status==5) active @elseif($app->status>=6) completed @endif">
                                              <div class="step-counter">6</div>
                                              <div class="step-name text-center">Partially Dispatched</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->dispatchedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->dispatchedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                            <div class="stepper-item @if($app->status==6) active @elseif($app->status>=7) completed @endif">
                                              <div class="step-counter">7</div>
                                              <div class="step-name text-center">Dispatched</div>
                                              <div class="step-name text-center ml-2 mr-2">
                                                @if(!empty(trim($app->closedOn)))
                                                    {{date("d-M-Y H:i:s", strtotime($app->closedOn))}}
                                                @endif
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>