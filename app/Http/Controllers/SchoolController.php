<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Redirect;
use Mail;
use App\Mail\MyMail;


class SchoolController extends Controller
{
    //Authentication
    //====================

    public function login(Request $request)
    {
        if(session()->has('schoolId')){

            return redirect('/school');
        }
        return view('edgecut.login');
    }

    public function validateLogin(Request $request)
    {
        $email  = $request->email;
        $password  = $request->password;
        $pwd = md5($password);

        $schools = DB::table('schools')
                ->select()
                ->where('school_email', $email)
                ->where('password', $pwd)
                ->get();

        // echo '<pre>'; print_r($user[0]); exit;

        if(count($schools)>0){
            $school=$schools[0];
            $request->session()->put('schoolId', $school->school_id);
            return redirect('/school');
        }
        else
            return Redirect::back()->withErrors(['Invalid Credential']);
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/school/login');
    }

    public function dashboard(Request $request)
    {
        return view('school.dashboard');
    }

    //Reviewer
    //=============================================================================================

    public function reviewerList(Request $request)
    {
        $reviewers = DB::table('reviewers')
            ->orderBy('reviewer_name','ASC')->get();

        return view('school.reviewer-list', ['reviewers' => $reviewers]);
    }


    public function reviewerDetails(Request $request)
    {
        return;
        $id = $request->id;

        $reviewers = DB::table('reviewers')
            ->where('reviewer_id',$id)
            ->orderBy('reviewer_name','ASC')->get();

        if(count($reviewers)!=1)
            return redirect('/school');

        return view('school.reviewer-details', ['reviewer' => $reviewers[0]]);
    }

    //Paper
    //=============================================================================================

    public function paperAdd(Request $request)
    {
        $schools = DB::table('schools')->where('school_id', Session::get('schoolId'))->get();
        $programs = DB::table('programs')->orderBy('program_name')->get();
        $subjects = DB::table('subjects')->orderBy('subject_name')->get();

        return view('school.paper-add', ['schools' => $schools, 'programs'=>$programs, 'subjects'=>$subjects]);
    }
    
    public function paperAddNow(Request $request)
    {
        $request->validate([
            'school'        => 'required',
            'roll'          => 'required',
            'regn'          => 'required',
            'student_name'  => 'required',
            'school'        => 'required',
            'program'       => 'required',
            'subject'       => 'required',
            'paper'         => 'required|mimes:pdf|max:5242880',
        ]);

        $filename = $request->roll .'_'.$request->regn.'_'.time().$request->paper->extension();

        $request->paper->move(public_path('uplaods/papers'),$filename);


        DB::table('papers')->insert([
            'roll'          => $request->roll, 
            'regn'          => $request->regn, 
            'student_name'  => $request->student_name, 
            'school'        => $request->school,
            'program'       => $request->program,
            'subject'       => $request->subject,
            'paper'         => $filename, 
            'created_by'    => Session::get('schoolId'), 
            'updated_by'    => Session::get('schoolId'),
        ]);


        return redirect()->back()->with('success', 'Reviewer Added Successfully');
    }

    public function paperList(Request $request)
    {
        $papers = DB::table('papers')
            ->join('schools','school','school_id')
            ->join('programs','program','program_id')
            ->join('subjects','subject','subject_id')
            ->where('schools.school_id', Session::get('schoolId'))
            ->orderBy('paper_id','DESC')->get();

        return view('school.paper-list', ['papers' => $papers]);
    }

    public function paperDetails(Request $request)
    {
        $papers = DB::table('papers')
            ->join('schools','school','school_id')
            ->join('programs','program','program_id')
            ->join('subjects','subject','subject_id')
            ->where('schools.school_id', Session::get('schoolId'))
            ->where('paper_id',$request->id)->get();

        return view('school.paper-details', ['paper' => $papers[0]]);
    }

}
