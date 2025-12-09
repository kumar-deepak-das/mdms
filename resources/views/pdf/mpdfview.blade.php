
                                                    <div>
                                                        <p><big><b>I. For use of the Examiner:</b></big></p>

                                                        <p><strong>
                                                            To<br/>
                                                            The Controller of Examinations,<br/>
                                                            KIIT, Bhubaneswar-751024<br/>
                                                        </strong></p>

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

                                                        <table class="table table-sm table-condensed table-bordered mt-5">
                                                            <tr>
                                                                <th colspan="3">Details of Bank Account holder</th>
                                                            </tr>
                                                            <tr>
                                                                <th>1.</th>
                                                                <td style="width: 250px;">Beneficiary's Name & Address</td>
                                                                <td>{{$paper->payble_at}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>2.</th>
                                                                <td>Name of the Bank and Branch</td>
                                                                <td>{{$paper->bank_name}}, {{$paper->branch_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>3.</th>
                                                                <td>Bank Address</td>
                                                                <td>{{$paper->bank_address}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>4.</th>
                                                                <td>Bank Account No</td>
                                                                <td>{{$paper->account_no}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>5.</th>
                                                                <td>IFSC CODE</td>
                                                                <td>{{$paper->ifsc_code}}</td>
                                                            </tr>
                                                        </table>

                                                        <p class="text-right">
                                                            <img src="{{ asset('public/uploads/reviewer_signature/'.$paper->reviewer_signature) }}" style="height: 40px; width: 180px;" alt="No File"><br>
                                                            <strong>Signature ( _____________________________________ )</strong>
                                                        </p>
                                                                    
                                                    </div>                                                   

                                                    <div class="mt-5">
                                                        <h1 class="page-head-line"></h1>
                                                        <p><big><b>II. For use by the Controller’s Office:</b></big></p>
                                                        <p class="text-justify">
                                                            Certified that <strong style="color: navy;"> {!!$paper->reviewer_name!!} </strong>. has been appointed by the Vice Chancellor to examine the MD/MS/MDS/DM/M.Ch. thesis from school of <strong style="color: navy;"> {!!$paper->school_name!!} </strong> referred to in the above claim, for which he is entitled to receive a honorarium of Rs.1100/-(Rupees one thousand one hundred only) for the above said purpose and postal charge. His report on the thesis has been received and considered by the appropriate authorities. This bill may please be passed for payment. 
                                                        </p>
                                                        <br/>
                                                        <br/>
                                                        <p class="text-right mt-5 pt-5"><b>Controller of Examinations</b></p>
                                                    </div>

                                                    <div class="mt-5">
                                                        <h1 class="page-head-line"></h1>
                                                        <p><big><b>III. Accounts Section, KIIT, Bhubaneswar:</b></big></p>
                                                        <p class="text-justify">
                                                            The claim of Prof./Dr. _________________________________ for Rs.1100.00 for examining MD/MS/MDS/DM/M.Ch. thesis of __________________________ has been drawn vide bill No ______________________ dated __________________
                                                        </p>
                                                        <p class="text-right mt-5"><b>Accounts Officer</b></p>
                                                    </div>