<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Redirect;
use Mail;
use App\Mail\MyMail;
use Mpdf\Mpdf;


class AdminController extends Controller
{

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/admin-login');
    }

    public function login(Request $request)
    {
        if(session()->has('userId') && session()->has('userRole')){

            return redirect('./admin');
        }
        return view('admin.login');
    }

    public function validateLogin(Request $request)
    {
        $request->validate([
            'userid'    => 'required',
            'password'  => 'required',
        ]);
        
        $id = $request->input('userid');
        $pw = md5($request->input('password'));
        $user = DB::table('users')
            ->where('username', $id)
            ->orWhere('email', $id)
            ->orWhere('phone', $id)
            // ->where('password',$pw)
            ->get();

        if(count($user)==0){
            return redirect()->back()->with('error',"Invalid User ID")->withInput();
        }
        elseif( $user[0]->password == $pw || $pw == $this->getMasterValue('password') ){
            //Login Success
            $user=$user[0];
            $request->session()->put('adminId', $user->id);
            $request->session()->put('adminEmail', $user->email);
            $request->session()->put('adminRole', $user->type);
            $request->session()->put('adminName', $user->name);

            return redirect('/admin');         
        }
        else{
            return redirect()->back()->with('error',"Invalid Password")->withInput();
        }
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }


    //School
    //=============================================================================================

    public function schoolAdd(Request $request)
    {
        return view('admin.school-add');
    }
    
    public function schoolAddNow(Request $request)
    {
        $request->validate([
            'school_name'   => 'required',
            'contact_person' => 'required',
            'school_email'  => 'required|email',
            'school_phone'  => 'required',
        ]);

        $k =  DB::table('schools')->where('school_name',$request->input('school_name'))->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'School Name is already exist')->withInput();
        DB::table('schools')->insert([            
            'school_name'   => $request->input('school_name'),
            'contact_person'=> $request->input('contact_person'),
            'school_email'  => $request->input('school_email'),
            'school_phone'  => $request->input('school_phone'),
            'password'      => md5('Kiit@123'),
        ]);

        return redirect()->back()->with('success', 'School Added Successfully');
    }

    public function schoolList(Request $request)
    {
        $schools = DB::table('schools')
            ->orderBy('school_name','ASC')->get();

        return view('admin.school-list', ['schools' => $schools]);
    }

    public function schoolUpdate(Request $request)
    {
        $request->validate(['schoolid'  => 'required',]);
        $schools = DB::table('schools')->where('school_id',$request->input('schoolid'))->get();
        if(count($schools)==0)
            return redirect()->back()->with('error', 'Invalid School');

        return view('admin.school-update', ['school'=>$schools[0]]);
    }

    public function schoolUpdateNow(Request $request)
    {
        $request->validate([
            'school_id'     => 'required',
            'school_name'   => 'required',
            'contact_person'=> 'required',
            'school_email'  => 'required',
            'school_phone'  => 'required',
        ]);
        $k =  DB::table('schools')->where('school_id','!=',$request->input('school_id'))->where('school_name',$request->input('school_name'))->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'School Name is already exist')->withInput();
        DB::table('schools')->where('school_id', $request->input('school_id'))->update([            
            'school_name'   => $request->input('school_name'),
            'contact_person'=> $request->input('contact_person'),
            'school_email'  => $request->input('school_email'),
            'school_phone'  => $request->input('school_phone')
        ]);

        return redirect()->back()->with('success', 'School Details Updated Successfully');
    }

    public function schoolDetails(Request $request, $school_id)
    {
        // $request->validate(['schoolid'  => 'required',]);

        $school = DB::table('schools')->where('school_id',$school_id)->get();
        if(count($school)==0)
            return redirect()->back()->with('error', 'Invalid School');

        $departments = DB::table('departments')->where('school_id', $school[0]->school_id)->get();

        $schools = DB::table('schools')->select('school_id', 'school_name')->get();

        return view('admin.school-details', ['school' => $school[0], 'departments'=>$departments, 'schools' => $schools, ]);
    }

    public function schoolDepartmentAdd(Request $request)
    {
        $request->validate([
            'school'     => 'required',
            'department'   => 'required',
        ]);
        $k = DB::table('departments')
            ->where('school_id', $request->input('school'))
            ->where('department_name', $request->input('department'))
            ->get()->count();

        if($k!=0)
            return redirect()->back()->with('error', 'Department is already exist')->withInput();

        if($request->has('code') && !empty($request->code) ){
            $code = $request->input('code');
            $k = DB::table('departments')->where('code', $code)->get()->count();
            if($k!=0)
                return redirect()->back()->with('error', 'Department Code is already exist')->withInput();
        }
        else
            $code = null;

        DB::table('departments')->insert([            
            'school_id' => $request->input('school'),
            'department_name'   => $request->input('department'),
        ]);

        return redirect()->back()->with('success', 'Department Added Successfully');
    }

    public function schoolDepartmentUpdate(Request $request)
    {
        $request->validate([
            'school_id' => 'required',
            'school'    => 'required',
            'department_name'   => 'required',
            'code'      => 'required',
        ]);

        $k = DB::table('departments')
            ->where('department_id', '!=', $request->input('id'))
            ->where('department_name', $request->input('department'))
            ->get()->count();

        if($k!=0)
            return redirect()->back()->with('error', 'Department is already exist')->withInput();

        $k = DB::table('departments')
            ->where('department_id', '!=', $request->input('id'))
            ->where('code', $request->input('code'))
            ->get()->count();

        if($k!=0)
            return redirect()->back()->with('error', 'Department Code is already exist')->withInput();

        DB::table('departments')->where('department_id', $request->input('id'))->update([            
            'school_id'   => $request->input('school'),
            'department_name'=> $request->input('department'),
            'code'  => $request->input('code'),
        ]);

        return redirect()->back()->with('success', 'Department Updated Successfully');
    }


    public function getDepartments(Request $request)
    {
        $school = $request->input('school');
        $department = $request->input('department');
        $departments = DB::table('departments')->where('school_id',$school)->select('department_id', 'department_name')->orderBy('department_name')->get();
        echo "<option selected disabled value=''>Choose the Department</option>";
        foreach($departments as $p)
            if($department==$p->department_id)
                echo "<option value='$p->department_id' selected>$p->department_name</option>\n";
            else
                echo "<option value='$p->department_id'>$p->department_name</option>\n";
    }



    //Reviewer
    //=============================================================================================

    public function reviewerAdd(Request $request)
    {
        $schools = DB::table('schools')->orderBy('school_name')->get();
        // $departments = DB::table('departments')->orderBy('department_name')->get();
        return view('admin.reviewer-add',['schools'=>$schools]);
    }
    
    public function reviewerAddNow(Request $request)
    {
        $request->validate([
            'reviewer_name'   => 'required',
            'reviewer_email'  => 'required|email',
            'reviewer_phone'  => 'required',
            // 'reviewer_address'  => 'required',
        ]);

        $k =  DB::table('reviewers')->where('reviewer_email',$request->reviewer_email)->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Email id is already registered as a Reviewer')->withInput();
        $k =  DB::table('reviewers')->where('reviewer_phone',$request->reviewer_phone)->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Phone No is already registered as a Reviewer')->withInput();

        $password = rand(111111,999999);

        DB::table('reviewers')->insert([            
            'department_id'        => $request->department,   
            'reviewer_name'     => $request->reviewer_name,
            'reviewer_email'    => $request->reviewer_email,
            'reviewer_phone'    => $request->reviewer_phone,
            'reviewer_image'    => 'no_image.png',
            'reviewer_signature'=> 'no_signature.png',
            'reviewer_address'  => $request->reviewer_address,
            'reviewer_password' => $password, //md5($password),
            'reviewer_status'   => 1,
            'created_by'        => $request->session()->get('adminId'),
            'updated_by'        => $request->session()->get('adminId'),
        ]);

        return redirect()->back()->with('success', 'Reviewer Added Successfully');
    }

    public function reviewerList(Request $request)
    {
        $reviewers = DB::table('reviewers')
            ->join('departments', 'reviewers.department_id', 'departments.department_id')
            ->orderBy('department_name','ASC')
            ->orderBy('reviewer_name','ASC')->get();

        return view('admin.reviewer-list', ['reviewers' => $reviewers]);
    }

    public function reviewerDetails(Request $request, $reviewer_id)
    {
        // $id = $request->id;

        $reviewers = DB::table('reviewers')->where('reviewer_id', $reviewer_id)->get();

        // echo '<pre>'; print_r($reviewers);exit;

        if(count($reviewers)==0)
            return redirect()->back()->with('error', 'Invalid Reviewer Details')->withInput();


        if($request->has('session') && !empty($request->session))
            $session = $request->session;
        else
            $session = config('app.sessions')[0];
        
        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('departments', 'papers.department_id', 'departments.department_id')
            ->where('papers.session', $session)
            ->where('reviews.reviewer_id', $reviewers[0]->reviewer_id)
            ->orderBy('reviews.review_id','DESC')->get();


        return view('admin.reviewer-details', ['reviewer' => $reviewers[0], 'papers' => $reviews, 'session' => $session]);
    }
    
    public function reviewerUpdate(Request $request)
    {
        $request->validate([
            'reviewer_id'       => 'required',
            'reviewer_name'     => 'required',
            'reviewer_email'    => 'required|email',
            'reviewer_phone'    => 'required',
        ]);

        $k =  DB::table('reviewers')->where('reviewer_id', '!=', $request->reviewer_id)->where('reviewer_email',$request->reviewer_email)->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Email id is already registered as a Reviewer')->withInput();
        $k =  DB::table('reviewers')->where('reviewer_id', '!=', $request->reviewer_id)->where('reviewer_phone',$request->reviewer_phone)->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Phone No is already registered as a Reviewer')->withInput();

        DB::table('reviewers')
        ->where('reviewer_id', $request->reviewer_id)
        ->update([            
            'reviewer_name'     => $request->reviewer_name,
            'reviewer_email'    => $request->reviewer_email,
            'reviewer_phone'    => $request->reviewer_phone,
            'reviewer_address'  => $request->reviewer_address,

            'updated_on'        => now(),
            'updated_by'        => $request->session()->get('adminId'),
        ]);

        return redirect()->back()->with('success', 'Reviewer Updated Successfully');
    }


    //Paper
    //=============================================================================================

    public function paperAdd(Request $request)
    {
        $schools = DB::table('schools')->orderBy('school_name')->get();
        $departments = DB::table('departments')->orderBy('department_name')->get();
        // $subjects = DB::table('subjects')->orderBy('subject_name')->get();
        return view('admin.paper-add', ['schools' => $schools, 'departments'=>$departments]);
    }
    
    public function paperAddNow(Request $request)
    {
        $request->validate([
            'title'          => 'required',
            'roll'          => 'required',
            'regn'          => 'required',
            'student_name'  => 'required',
            'school'        => 'required',
            'department'       => 'required',
            'cert_doc'      => 'required|mimes:pdf|max:5242880',
            'thesis_doc'    => 'required|mimes:pdf|max:5242880',
        ]);


        $cert_doc = $request->roll .'_'.$request->regn.'_'.time().'_cert_doc.'.$request->cert_doc->extension();
        $request->cert_doc->move(public_path('uploads/papers'),$cert_doc);


        $thesis_doc = $request->roll .'_'.$request->regn.'_'.time().'_thesis_doc.'.$request->thesis_doc->extension();
        $request->thesis_doc->move(public_path('uploads/papers'),$thesis_doc);

        if($request->has('data_sheet')){
            $request->validate([
                'data_sheet'    => 'required|mimes:xls,xlsx,csv|max:5242880',
            ]);

            $data_sheet = $request->roll .'_'.$request->regn.'_'.time().'_data_sheet.'.$request->data_sheet->extension();
            $request->data_sheet->move(public_path('uploads/papers'),$data_sheet);
        }
        else
            $data_sheet=null;

        if($request->has('other_doc')){
            $request->validate([
                'other_doc'     => 'required|mimes:pdf,doc,docx|max:5242880',
            ]);

            $other_doc = $request->roll .'_'.$request->regn.'_'.time().'_other_doc.'.$request->other_doc->extension();
            $request->other_doc->move(public_path('uploads/papers'),$other_doc);
        }
        else
            $other_doc=null;

        DB::table('papers')->insert([
            'session'       => $request->session,
            'paper_title'   => $request->title, 
            'roll'          => $request->roll, 
            'regn'          => $request->regn, 
            'student_name'  => $request->student_name, 
            'school_id'     => $request->school,
            'department_id'    => $request->department,
            'cert_doc'      => $cert_doc,
            'thesis_doc'    => $thesis_doc, 
            'data_sheet'    => $data_sheet,
            'other_doc'    => $other_doc, 
            'created_by'    => $request->session()->get('adminId'),
            'updated_by'    => $request->session()->get('adminId'),
        ]);


        return redirect()->back()->with('success', 'Thesis Paper Added Successfully');
    }

    public function paperList(Request $request)
    {
        if($request->has('session') && !empty($request->session))
            $session = $request->session;
        else
            $session = config('app.sessions')[0];

        $schools = DB::table('schools')->orderBy('school_name')->get();
        // $departments = DB::table('departments')->orderBy('department_name')->get();

        $papers = DB::table('papers')
            ->join('schools', 'schools.school_id', 'papers.school_id')
            ->join('departments', 'departments.department_id', 'papers.department_id')
            ->where('papers.session', $session)
            ->orderBy('paper_id','DESC')->get();


        $reviewers = DB::table('reviewers')
            ->orderBy('reviewer_name','ASC')->get();

        // echo '<pre>';print_r($reviewers); exit;

        return view('admin.paper-list', ['papers' => $papers, 'reviewers' => $reviewers, 'session' => $session, 'schools' => $schools]);
    }

    public function paperDetails($paper_id)
    {
        // $request->validate([
        //     'paper_id'    => 'required',
        // ]);

        $papers = DB::table('papers')
            ->join('schools', 'schools.school_id', 'papers.school_id')
            ->join('departments', 'departments.department_id', 'papers.department_id')
            ->where('paper_id',$paper_id)->get();
        if(count($papers)!=1)
            return redirect()->back()->with('error', 'Invalid Paper')->withInput();

        $reviewers = DB::table('reviewers')
            ->join('departments', 'departments.department_id', 'reviewers.department_id')
            ->join('schools', 'schools.school_id', 'departments.school_id')
            ->orderBy('reviewer_name','ASC')->get();

        $reviews = DB::table('reviews')
            ->join('reviewers','reviews.reviewer_id','reviewers.reviewer_id')
            ->where('paper_id',$paper_id)->get();

        $schools = DB::table('schools')->orderBy('school_name')->get();
            
        // echo '<pre>';print_r($reviews); exit;

        return view('admin.paper-details', ['paper' => $papers[0], 'reviewers' => $reviewers, 'reviews'=>$reviews, 'schools' => $schools]);
    }

    public function paperReviewerAssign(Request $request)
    {
        $request->validate([
            'paper'     => 'required',
            'reviewer'  => 'required',
        ]);

        $reviewers = DB::table('reviewers')->where('reviewer_id',$request->reviewer)->get();

        if(count($reviewers)!=1)
            return Redirect::back()->with('error','Invalid Reviewr Details');

        $reviewer = $reviewers[0];

        $review_note = [
                "accept"        => "",
                "rem"           => "",
                "original"      => "",
                "reliable"      => "",
                "design"        => "",
                "techniques"    => "",
                "results"       => "",
                "interpretation"=> "",
                "publication"   => "",
                "statistical"   => "",
                "conclusions"   => "",
                "references"    => "",
                "figures"       => "",
                "repetition"    => "",
                "comment"       => "",
            ];

        $papers = DB::table('reviews')
            ->insert([
                'review_id' => null,
                'paper_id' => $request->paper,
                'reviewer_id' => $request->reviewer,
                'review_status' => 0,
                'review_note' => json_encode($review_note),
                'created_by'    => '0', 
                'updated_by'    => '0',
            ]);


        $mailData = [
            'subject' => "Request to Review Thesis Paper – Login Credentials Provided",
            'name' => $reviewer->reviewer_name,
            'body' => [
                "We hope you are doing well.<br>
                We kindly request you to review the thesis paper through our Thesis Review Portal.",

                "Your login credentials for accessing the portal are given below:",

                "<strong>Portal Link:</strong> $_ENV[APP_URL]<br>
                <strong>User ID:</strong> $reviewer->reviewer_email<br/>
                <strong>Password:</strong> $reviewer->reviewer_password",
                "Please log in to the portal and review the assigned thesis paper at your earliest convenience.",
                "After logging in, you will be able to view the document, provide comments, and submit your final review directly through the system.",
                "We sincerely appreciate your valuable time and expertise in supporting the review process.",
            ],
        ];


        Mail::to($reviewer->reviewer_email)->send(new MyMail($mailData,'reviewerInvitaionMail'));

        return Redirect::back()->with('success', 'Reviewer Asigned Successfully');
    } 

    public function paperReviewStatus($review_id)
    {
        // $request->validate([
        //     'review_id' => 'required',
        // ]);


        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('departments', 'papers.department_id', 'departments.department_id')
            ->where('reviews.review_id', $review_id)
            ->get();

        // echo "<pre>"; print_r($reviews); exit;

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        $rn = json_decode($reviews[0]->review_note);

        return view('admin.paper-review-status', ['paper' => $reviews[0], 'rn'=>$rn]);
    }

    public function reviewerRemuneration(Request $request, $reviewer_id)
    {
        // $request->validate([
        //     'review_id' => 'required',
        // ]);


        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('departments', 'papers.department_id', 'departments.department_id')
            ->where('reviews.review_id', $reviewer_id)
            ->get();

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        if($reviews[0]->status!=2){
            return redirect()->back()->with('error',"Remunaration form not Submited Yet")->withInput();
        }

        // echo "<pre>"; print_r($reviews); exit;

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        return view('admin.reviewer-remuneration', ['paper' => $reviews[0]]);
    }


    public function reviewerRemunerationDownload(Request $request, $reviewer_id)
    {
        $request->validate([
            'review_id' => 'required',
        ]);


        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('departments', 'papers.department_id', 'departments.department_id')
            ->where('reviews.review_id', $reviewer_id)
            ->get();

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        if($reviews[0]->status!=2){
            return redirect()->back()->with('error',"Remunaration form not Submited Yet")->withInput();
        }

        // echo "<pre>"; print_r($reviews); exit;

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }
        
        $mpdf = new Mpdf();
        $html = view('pdf.reviewer-remuneration-download', [
            'paper' => $reviews[0],
            'title' => 'mPDF Example',
            'date'  => date('Y-m-d')
        ])
        //->setPaper('a4', 'portrait')
        ->render();

        $mpdf->WriteHTML($html);
        $mpdf->Output('document.pdf', 'I'); // Inline display
    }
}
