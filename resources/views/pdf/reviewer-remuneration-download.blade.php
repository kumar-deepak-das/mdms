<html>
    <head>
        <!-- BOOTSTRAP (for table formatting) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            body { font-size: 13px; }
            p{ text-align: justify; line-height: 1.5;text-indent: 2rem;}
            .signature{ text-align: right;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="row text-center">
                    <img src="{{ asset('public/assets/images/logo/kiit-logo-wide.png') }}" class="img-responsive" />
                    <h4>Office of the Controller of Examination</h4>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center"><b>BILL OF REMUNERATION FOR EXAMINATION OF MD/MS/MDS/DM/M/Ch. THESIS</b></p>
                    </div>
                    <div class="col-md-12">
                        <table class="bg-info"><tr><th>I. For use of the Examiner:</th><td></table>                        
                        <table class="my-3"><tr><th>
                            To<br/>
                            The Controller of Examinations,<br/>
                            KIIT, Bhubaneswar-751024<br/>
                        </th><td></table>

                        <p class="text-justify">
                            Dear Sir,
                            Please arrange for payment of my remuneration of Rs. 1000.00 (Rupees one thousand only) 
                            for examining the thesis <sup><i class="fa fa-quote-left"></i></sup><strong style="color: navy;">{!!$paper->paper_title!!}</strong><sup><i class="fa fa-quote-right"></i></sup> 
                            <strong class="text-danger">[Paper ID: MDMS{!!$paper->paper_id!!}]</strong>, 
                            submitted by <strong class="text-danger"> {!!$paper->student_name!!} </strong> 
                            for MD/MS/MDS/DM/M.Ch. degree of the University. 
                            Payment may please be made by demand draft/electronic transfer in the details given below/ payable at 
                            <strong style="color: navy;">{{$paper->payble_at}}</strong> A pre-receipt is appended below. 
                        </p>
                        <p class="text-justify">
                            Name :  <strong style="color: navy;"> {!!$paper->reviewer_name!!} </strong> Received Rs.1100/-. (Rupees one thousand one hundred only) for the above said purpose and postal charges
                        </p>

                        <table class="mt-5">
                            <tr class="p-3">
                                <th colspan="3">Details of Bank Account holder</th>
                            </tr>
                            <tr>
                                <td>1.</td>
                                <td style="width: 200px;">Beneficiary's Name & Address</td>
                                <td>{{$paper->payble_at}}</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Name of the Bank and Branch</td>
                                <td>{{$paper->bank_name}}, {{$paper->branch_name}}</td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Bank Address</td>
                                <td>{{$paper->bank_address}}</td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Bank Account No</td>
                                <td>{{$paper->account_no}}</td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>IFSC CODE</td>
                                <td>{{$paper->ifsc_code}}</td>
                            </tr>
                        </table>

                        <p class="text-end">
                            <img src="{{ asset('public/uploads/reviewer_signature/'.$paper->reviewer_signature) }}" style="height: 40px; width: 180px;margin-right: 15px;" alt="No File"><br>
                            <table align="right"><tr><th>Signature ( _____________________________________ )</th></tr></table>
                        </p>
                                    
                    </div>
                    <div class="col-md-12 mt-4">
                        <!-- <hr/> -->
                        <table class="bg-info"><tr><th>II. For use by the Controller’s Office:</th><td></table>
                        <p class="text-justify mt-3 mb-5">
                            Certified that <strong style="color: navy;"> {!!$paper->reviewer_name!!} </strong>. has been appointed by the Vice Chancellor to examine the MD/MS/MDS/DM/M.Ch. thesis from school of <strong style="color: navy;"> {!!$paper->school_name!!} </strong> referred to in the above claim, for which he is entitled to receive a honorarium of Rs.1100/-(Rupees one thousand one hundred only) for the above said purpose and postal charge. His report on the thesis has been received and considered by the appropriate authorities. This bill may please be passed for payment. 
                        </p>
                        <table class="mt-5" align="right"><tr><th>Controller of Examinations</th></tr></table>
                    </div>                    

                    <div class="col-md-12 mt-4">
                        <!-- <hr/> -->
                        <table class="bg-info"><tr><th>III. Accounts Section, KIIT, Bhubaneswar:</th><td></table>
                        <p class="text-justify my-3" style="line-height: 2;">
                            The claim of Prof./Dr. _____________________________________________ for Rs.1100.00 for examining MD/MS/MDS/DM/M.Ch. thesis of __________________________ has been drawn vide bill No ______________________ dated __________________
                        </p> 
                    </div>                    

                    <div class="col-md-12 mt-5">
                        <table  align="right"><tr><th>Accounts Officer</th></tr></table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
