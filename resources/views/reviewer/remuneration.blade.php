<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        @include('inc.head')
        <!--PAGE LEVELC STYLES-->
        <link href="{{ asset('public/assets/admin/css/invoice.css')}}" rel="stylesheet" />
        <style>
            .underline-input {
              border: none;             /* Remove all default borders */
              border-bottom: 1px solid #000; /* Add a bottom border (underline) */
              background-color: transparent; /* Make the background transparent */
              outline: none;            /* Remove the default blue/black highlight on focus in some browsers */
              padding: 5px 10px;           /* Add a little space around the text */
              width: 200px;             /* Set a desired width */
              color: navy; 
            }
            .w-100{ width: 100%; };
        </style>
        <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">

        <style>
        #signature {
            font-family: 'Parisienne', cursive;
        }
        </style>
    </head>
    <body>
        <div id="wrapper">
            
            @include('reviewer.include.nav-bar')
            
           <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-5">
                        <h1 class="page-head-line">Remuneration</h1>
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
                               Review Status</b>
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
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-center" style="font-weight: bold;">BILL OF REMUNERATION FOR EXAMINATION OF MD/MS/MDS/DM/M/Ch. THESIS</p>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10">
                                                    <div style="font-weight: bold;">
                                                        <p><big>I. For use of the Examiner:</big></p>
                                                        <p>
                                                            To<br/>
                                                            The Controller of Examinations,<br/>
                                                            KIIT, Bhubaneswar-751024<br/>
                                                        </p>
                                                        <p class="text-justify">
                                                            Dear Sir,
                                                            Please arrange for payment of my remuneration of Rs. 1000.00 (Rupees one thousand only) 
                                                            for examining the thesis <sup><i class="fa fa-quote-left"></i></sup><big style="color: navy;">{!!$paper->paper_title!!}</big><sup><i class="fa fa-quote-right"></i></sup> 
                                                            <big class="text-danger">[Paper ID: MDMS{!!$paper->paper_id!!}]</big>, 
                                                            submitted by <big class="text-danger"> {!!$paper->student_name!!} </big> 
                                                            for MD/MS/MDS/DM/M.Ch. degree of the University. 
                                                            Payment may please be made by demand draft/electronic transfer in the details given below/ payable at 
                                                            <input required id="payble" name="payble_at" class="underline-input text-center" placeholder="Eneter Payble at" value="{{$paper->payble_at}}" /> 
                                                            A pre-receipt is appended below. 
                                                        </p>
                                                        <script>
                                                            const payble = document.getElementById("payble");
                                                            payble.addEventListener("input", function() {
                                                                this.style.width = "auto";
                                                                this.style.width = this.scrollWidth + "px";
                                                            });
                                                        </script>

                                                        <p class="text-justify">
                                                            Name :  <u style="color: navy;"> {!!$paper->reviewer_name!!} </u> Received Rs.1100/-. (Rupees one thousand one hundred only) for the above said purpose and postal charges
                                                        </p>

                                                        <table class="table table-condensed table-bordered" style="">
                                                            <tr>
                                                                <th colspan="3">Details of Bank Account holder</th>
                                                            </tr>
                                                            <tr>
                                                                <th>1.</th>
                                                                <td style="width: 250px;">Beneficiary's Name & Address</td>
                                                                <td> <input required name="beneficiary_name" class="w-100 underline-input" placeholder="Beneficiary's Name & Address" value="{{$paper->payble_at}}" /> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>2.</th>
                                                                <td>Name of the Bank</td>
                                                                <td> <input required name="bank_name" class="w-100 underline-input" placeholder="Enter Name of the Bank" value="{{$paper->bank_name}}" /> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>2.</th>
                                                                <td>Branch Name</td>
                                                                <td> <input required name="branch_name" class="w-100 underline-input" placeholder="Enter Name of the Branch" value="{{$paper->branch_name}}" /> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>3.</th>
                                                                <td>Bank Address</td>
                                                                <td> <input required name="bank_address" class="w-100 underline-input" placeholder="Enter Address" value="{{$paper->bank_address}}" /> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>4.</th>
                                                                <td>Bank Account No</td>
                                                                <td> <input required name="account_no" class="w-100 underline-input" placeholder="Enter Bank Account No" value="{{$paper->account_no}}" /> </td>
                                                            </tr>
                                                            <tr>
                                                                <th>5.</th>
                                                                <td>IFSC CODE</td>
                                                                <td> <input required name="ifsc_code" class="w-100 underline-input" placeholder="Enter IFSC CODE" value="{{$paper->ifsc_code}}"> </td>
                                                            </tr>
                                                        </table>

                                                        <table width="100%" class=" mt-5 pt-5" border="0">
                                                            <tr>
                                                            @if (!empty($paper->reviewer_signature) && file_exists(public_path('uploads/reviewer_signature/'.$paper->reviewer_signature)))                                                              
                                                               <td style="width: 300px;">
                                                                    @if($paper->status==1)
                                                                    <input type="checkbox" id="chkSign"  onclick="toggleRequired()"/>
                                                                    <label for="chkSign">Want to Updated your signature</label>
                                                                    @endif
                                                                </td>
                                                                <script>
                                                                    function toggleRequired() {
                                                                        let chkSign = document.getElementById("chkSign");
                                                                        let paraSign = document.getElementById("paraSign");
                                                                        let fileSign = document.getElementById("file_sign");

                                                                        if (chkSign.checked) {
                                                                            fileSign.setAttribute("required", "required");
                                                                            fileSign.removeAttribute("disabled");
                                                                            paraSign.style.display='block'
                                                                        } else {
                                                                            fileSign.setAttribute("disabled", "disabled");
                                                                            fileSign.removeAttribute("required");
                                                                            paraSign.style.display='none'
                                                                        }
                                                                    }
                                                                </script>
                                                                <td style="width: 220px;" class="text-center">
                                                                    <p id="paraSign" style="display:none">
                                                                    <input type="file" class="form-control" name="signature_file" id="file_sign" disabled>
                                                                    <small class="text-danger">Only image with height & width ratio of 60 x 300 Pixels and max 100kb</small>
                                                                    </p>
                                                                </td>
                                                                <td class="text-right">
                                                                    <img id="img-sign" src="{{ asset('public/uploads/reviewer_signature/'.$paper->reviewer_signature) }}" style="height: 60px; width: 210px;" alt="No File">
                                                                </td>
                                                            @else    
                                                               <td style="width: 300px;">
                                                                    <input type="radio" name="sign" checked />
                                                                    <label for="sign">Upload photo copy of your signature</label>
                                                                </td>
                                                                <td style="width: 220px;" class="text-center">
                                                                    <input type="file" class="form-control" name="signature_file" id="file_sign" required>
                                                                    <small class="text-danger">Only image with height & width ratio of 60 x 300 Pixels and max 100kb</small>
                                                                </td>
                                                                <td class="text-right">
                                                                    <img id="img-sign" src="{{ asset('public/uploads/reviewer_signature/no-signature.png') }}" style="height: 60px; width: 210px;" alt="No File">
                                                                </td>
                                                            @endif
                                                            </tr>
                                                            <!-- 
                                                            <tr>
                                                                <td class="text-center">or</td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr><tr>
                                                                <td style="width: 250px;">
                                                                    <input type="radio" name="sign"/>
                                                                    Enter Your Name
                                                                </td>
                                                                <td colspan="2" class="text-right">
                                                                    (Signature: <input id="signature" name="signature" class="underline-input text-center" placeholder="">)
                                                                    <script>
                                                                        const signature = document.getElementById("signature");
                                                                        signature.addEventListener("input", function() {
                                                                            this.style.width = "auto";
                                                                            this.style.width = this.scrollWidth + "px";
                                                                        });
                                                                    </script>
                                                                </td>
                                                            </tr> -->
                                                        </table>
                                                        <script>
                                                            document.getElementById("file_sign").addEventListener("change", function () {
                                                                const img = document.getElementById("img-sign");
                                                                const file = this.files[0];

                                                                // If no file selected
                                                                if (!file) {
                                                                    alert("Please select an image file");
                                                                    img.style.display = "none";
                                                                    return;
                                                                }

                                                                // Validate file type
                                                                if (!file.type.startsWith("image/")) {
                                                                    alert("Selected file is not an image!");
                                                                    this.value = ""; // Reset input
                                                                    img.style.display = "none";
                                                                    return;
                                                                }

                                                                // Show preview
                                                                const reader = new FileReader();
                                                                reader.onload = function (e) {
                                                                    
                                                                    img.src = e.target.result;
                                                                    img.style.display = "block";
                                                                };
                                                                reader.readAsDataURL(file);
                                                                img.style.height="60px";
                                                                img.style.width="210px";
                                                                img.style.float = "right";
                                                                
                                                            });
                                                        </script>

                                                        <p class="text-right ">Signature ( ______________________________________ )</p>
                                                                    
                                                    </div>

                                                    @if($paper->status==1)
                                                    <div class="my-5 text-center">
                                                        <button name="review" value="1" class="btn btn-primary btn-lg" >
                                                            <i class="fa fa-check"></i> Submit
                                                        </button>
                                                        @csrf
                                                        <input type="hidden" name="review_id" value="{!!$paper->review_id!!}">
                                                    </div>
                                                    @else
                                                        <script>
                                                            document.addEventListener("DOMContentLoaded", function () {
                                                                // Disable all input fields
                                                                document.querySelectorAll("input").forEach(function(input){
                                                                    input.disabled = true;
                                                                });
                                                            });
                                                        </script>
                                                    <!-- <div class="my-5 text-center">
                                                        <H1>Remunaration Details Submited</H1>
                                                    </div> -->
                                                    @endif

                                                    

                                                    <div style="font-weight: normal;">
                                                        <h1 class="page-head-line"></h1>
                                                        <p><big>II. For use by the Controller’s Office:</big></p>
                                                        <p class="text-justify">
                                                            Certified that Prof. ……………………………………………………………………. has been appointed by the Vice Chancellor to examine the MD/MS/MDS/DM/M.Ch. thesis from school of …………………………………………………………………… referred to in the above claim, for which he is entitled to receive a honorarium of Rs.1100/-(Rupees one thousand one hundred only) for the above said purpose and postal charge. His report on the thesis has been received and considered by the appropriate authorities. This bill may please be passed for payment. 
                                                        </p>
                                                        <p class="text-right mt-5 pt-5">Controller of Examinations</p>
                                                    </div>

                                                    <div style="font-weight: normal;">
                                                        <h1 class="page-head-line"></h1>
                                                        <p><big>III. Accounts Section, KIIT, Bhubaneswar:</big></p>
                                                        <p class="text-justify">
                                                            The claim of Prof./Dr. ……………………………………………………………………………………… for Rs.1100.00 for examining MD/MS/MDS/DM/M.Ch. thesis of ………………………………………………………………… has been drawn vide bill No ………………………………………………… dated …………………………………
                                                        </p>
                                                        <p class="text-right mt-5 pt-5">Accounts Officer</p>

                                                    </div>

                                               </div>
                                            </div>
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


        @include('inc.footer')
        
        @include('inc.bottom')

       
    </body>
</html>
