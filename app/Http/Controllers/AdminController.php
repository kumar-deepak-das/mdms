<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Redirect;
use Mail;
use App\Mail\MyMail;


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
            // 'username'      => 'required',
            'contact_person' => 'required',
            'school_email'  => 'required|email',
            'school_phone'  => 'required',
        ]);

        $k =  DB::table('schools')->where('username',$request->input('username'))->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Username is already exist')->withInput();
        $k =  DB::table('schools')->where('school_name',$request->input('school_name'))->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'School Name is already exist')->withInput();
        DB::table('schools')->insert([            
            'school_name'   => $request->input('school_name'),
            // 'username'      => $request->input('username'),
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

    public function schoolDetails(Request $request)
    {
        $request->validate([
            'schoolid' => 'required',
        ]);

        $request->validate(['schoolid'  => 'required',]);
        $school = DB::table('schools')->where('school_id',$request->input('schoolid'))->get();
        if(count($school)==0)
            return redirect()->back()->with('error', 'Invalid School');

        $programs = DB::table('programs')->where('school_id', $school[0]->school_id)->get();

        $schools = DB::table('schools')->select('school_id', 'school_name')->get();

        return view('admin.school-details', ['school' => $school[0], 'programs'=>$programs, 'schools' => $schools, ]);
    }

    public function schoolProgramAdd(Request $request)
    {
        $request->validate([
            'school'     => 'required',
            'program'   => 'required',
        ]);
        $k = DB::table('programs')
            ->where('school_id', $request->input('school'))
            ->where('program_name', $request->input('program'))
            ->get()->count();

        if($k!=0)
            return redirect()->back()->with('error', 'Program is already exist')->withInput();

        if($request->has('code') && !empty($request->code) ){
            $code = $request->input('code');
            $k = DB::table('programs')->where('code', $code)->get()->count();
            if($k!=0)
                return redirect()->back()->with('error', 'Program Code is already exist')->withInput();
        }
        else
            $code = null;

        DB::table('programs')->insert([            
            'school_id' => $request->input('school'),
            'program_name'   => $request->input('program'),
            'code'      => $code,
        ]);

        return redirect()->back()->with('success', 'Program Added Successfully');
    }

    public function schoolProgramUpdate(Request $request)
    {
        $request->validate([
            'school_id' => 'required',
            'school'    => 'required',
            'program_name'   => 'required',
            'code'      => 'required',
        ]);

        $k = DB::table('programs')
            ->where('program_id', '!=', $request->input('id'))
            ->where('program_name', $request->input('program'))
            ->get()->count();

        if($k!=0)
            return redirect()->back()->with('error', 'Program is already exist')->withInput();

        $k = DB::table('programs')
            ->where('program_id', '!=', $request->input('id'))
            ->where('code', $request->input('code'))
            ->get()->count();

        if($k!=0)
            return redirect()->back()->with('error', 'Program Code is already exist')->withInput();

        DB::table('programs')->where('program_id', $request->input('id'))->update([            
            'school_id'   => $request->input('school'),
            'program_name'=> $request->input('program'),
            'code'  => $request->input('code'),
        ]);

        return redirect()->back()->with('success', 'Program Updated Successfully');
    }




    //Reviewer
    //=============================================================================================

    public function reviewerAdd(Request $request)
    {
        return view('admin.reviewer-add');
    }
    
    public function reviewerAddNow(Request $request)
    {
        $request->validate([
            'reviewer_name'   => 'required',
            'reviewer_email'  => 'required|email',
            'reviewer_phone'  => 'required',
            'reviewer_address'  => 'required',
        ]);

        $k =  DB::table('reviewers')->where('reviewer_email',$request->reviewer_email)->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Email id is already registered as a Reviewer')->withInput();
        $k =  DB::table('reviewers')->where('reviewer_phone',$request->reviewer_phone)->get()->count();
        if($k!=0)
            return redirect()->back()->with('error', 'Phone No is already registered as a Reviewer')->withInput();

        $password = rand(111111,999999);
        DB::table('reviewers')->insert([            
            'reviewer_name'     => $request->reviewer_name,
            'reviewer_email'    => $request->reviewer_email,
            'reviewer_phone'    => $request->reviewer_phone,
            'reviewer_address'  => $request->reviewer_address,
            'reviewer_password' => md5($password),
            'reviewer_status'   => 1,
            'created_by'        => $request->session()->get('adminId'),
            'updated_by'        => $request->session()->get('adminId'),
        ]);

        return redirect()->back()->with('success', 'Reviewer Added Successfully');
    }

    public function reviewerList(Request $request)
    {
        $reviewers = DB::table('reviewers')
            ->orderBy('reviewer_name','ASC')->get();

        return view('admin.reviewer-list', ['reviewers' => $reviewers]);
    }

    public function reviewerDetails(Request $request)
    {
        $id = $request->id;

        $reviewers = DB::table('reviewers')->where('reviewer_id',$id)->get();

        // echo '<pre>'; print_r($reviewers);exit;

        if(count($reviewers)==0)
            return redirect()->back()->with('error', 'Invalid Reviewer Details')->withInput();

        return view('admin.reviewer-details', ['reviewer' => $reviewers[0]]);
    }
    
    public function reviewerUpdate(Request $request)
    {
        $request->validate([
            'reviewer_id'       => 'required',
            'reviewer_name'     => 'required',
            'reviewer_email'    => 'required|email',
            'reviewer_phone'    => 'required',
            'reviewer_address'  => 'required',
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
        $programs = DB::table('programs')->orderBy('program_name')->get();
        $subjects = DB::table('subjects')->orderBy('subject_name')->get();
        return view('admin.paper-add', ['schools' => $schools, 'programs'=>$programs, 'subjects'=>$subjects]);
    }
    
    public function paperAddNow(Request $request)
    {
        $request->validate([
            'roll'          => 'required',
            'regn'          => 'required',
            'student_name'  => 'required',
            'school'        => 'required',
            'program'       => 'required',
            'subject'       => 'required',
            'cert_doc'      => 'required|mimes:pdf|max:5242880',
            'thesis_doc'    => 'required|mimes:pdf|max:5242880',
        ]);


        $cert_doc = $request->roll .'_'.$request->regn.'_'.time().'_cert_doc.'.$request->cert_doc->extension();
        $request->cert_doc->move(public_path('uplaods/papers'),$cert_doc);


        $thesis_doc = $request->roll .'_'.$request->regn.'_'.time().'_thesis_doc.'.$request->thesis_doc->extension();
        $request->thesis_doc->move(public_path('uplaods/papers'),$thesis_doc);

        if($request->has('data_sheet')){
            $request->validate([
                'data_sheet'    => 'required|mimes:xls,xlsx,csv|max:5242880',
            ]);

            $data_sheet = $request->roll .'_'.$request->regn.'_'.time().'_data_sheet.'.$request->data_sheet->extension();
            $request->data_sheet->move(public_path('uplaods/papers'),$data_sheet);
        }
        else
            $data_sheet=null;

        if($request->has('other_doc')){
            $request->validate([
                'other_doc'     => 'required|mimes:pdf,doc,docx|max:5242880',
            ]);

            $other_doc = $request->roll .'_'.$request->regn.'_'.time().'_other_doc.'.$request->other_doc->extension();
            $request->other_doc->move(public_path('uplaods/papers'),$other_doc);
        }
        else
            $other_doc=null;

        DB::table('papers')->insert([
            'roll'          => $request->roll, 
            'regn'          => $request->regn, 
            'student_name'  => $request->student_name, 
            'school_id'     => $request->school,
            'program_id'    => $request->program,
            'subject_id'    => $request->subject,
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
        $papers = DB::table('papers')
            ->join('schools', 'schools.school_id', 'papers.school_id')
            ->join('programs', 'programs.program_id', 'papers.program_id')
            ->join('subjects', 'subjects.subject_id', 'papers.subject_id')
            ->orderBy('paper_id','DESC')->get();


        $reviewers = DB::table('reviewers')
            ->orderBy('reviewer_name','ASC')->get();

        // echo '<pre>';print_r($reviewers); exit;

        return view('admin.paper-list', ['papers' => $papers, 'reviewers' => $reviewers]);
    }

    public function paperDetails(Request $request)
    {
        $request->validate([
            'id'    => 'required',
        ]);

        $papers = DB::table('papers')
            ->join('schools', 'schools.school_id', 'papers.school_id')
            ->join('programs', 'programs.program_id', 'papers.program_id')
            ->join('subjects', 'subjects.subject_id', 'papers.subject_id')
            ->where('paper_id',$request->id)->get();

        $reviewers = DB::table('reviewers')
            ->orderBy('reviewer_name','ASC')->get();

        $reviews = DB::table('reviews')
            ->join('reviewers','reviews.reviewer_id','reviewers.reviewer_id')
            ->where('paper_id',$request->id)->get();
            
        // echo '<pre>';print_r($reviews); exit;

        return view('admin.paper-details', ['paper' => $papers[0], 'reviewers' => $reviewers, 'reviews'=>$reviews]);
    }

    public function paperReviewerAssign(Request $request)
    {
        $request->validate([
            'paper'     => 'required',
            'reviewer'  => 'required',
        ]);

        $papers = DB::table('reviews')
            ->insert([
                'review_id' => null,
                'paper_id' => $request->paper,
                'reviewer_id' => $request->reviewer,
                'review_status' => 0,
                'review_note' => null,
                'created_by'    => '0', 
                'updated_by'    => '0',
            ]);

        return Redirect::back()->with('success', 'Reviewer Asigned Successfully');
    }

}
