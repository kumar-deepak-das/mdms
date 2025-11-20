<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Redirect;
use Mail;
use App\Mail\MyMail;


class ReviewerController extends Controller
{
    //Authentication
    //====================

    public function login(Request $request)
    {
        if(session()->has('reviewerId')){

            return redirect('/reviewer');
        }
        return view('reviewer.login');
    }

    public function validateLogin(Request $request)
    {
        $id  = $request->userid;
        $pw = md5($request->password);

        $reviewers = DB::table('reviewers')
            ->where('reviewer_email', $id)
            ->orWhere('reviewer_phone', $id)
            // ->where('reviewer_password',$pw)
            ->get();

        // echo '<pre>'; print_r($user[0]); exit;

        if(count($reviewers)==0){
            return redirect()->back()->with('error',"Invalid User ID")->withInput();
        }
        elseif( $reviewers[0]->reviewer_password == $pw || $pw == $this->getMasterValue('password') ){
            $request->session()->put('reviewerId', $reviewers[0]->reviewer_id);
            return redirect('/reviewer');
        }
        else
            return Redirect::back()->with('error','Wrong Password');
    }

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/reviewer-login');
    }

    public function dashboard(Request $request)
    {
        return view('reviewer.dashboard');
    }


    //Paper
    //=============================================================================================

    public function paperList(Request $request)
    {
        $papers = DB::table('papers')
            ->join('reviews', 'papers.paper_id', 'reviews.paper_id')
            ->where('reviews.reviewer_id', $request->session()->get('reviewerId'))
            ->orderBy('papers.paper_id','DESC')->get();

        return view('reviewer.paper-list', ['papers' => $papers]);
    }

    public function paperDetails(Request $request)
    {

        $papers = DB::table('papers')
            ->join('schools', 'schools.school_id', 'papers.school_id')
            ->join('programs', 'programs.program_id', 'papers.program_id')
            ->join('subjects', 'subjects.subject_id', 'papers.subject_id')
            ->join('reviews', 'reviews.paper_id', 'papers.paper_id')
            // ->where('reviews.reviewer_id', $request->session()->get('reviewer_id'))
            ->orderBy('papers.paper_id','DESC')->get();

        echo "<pre>"; print_r($papers); exit;

        return view('reviewer.paper-details', ['paper' => $papers]);
    }

}
