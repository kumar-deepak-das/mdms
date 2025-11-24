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

    public function logout(Request $request)
    {
        Session::flush();
        return redirect('/reviewer-login');
    }

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
        $pw = $request->password;

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

    public function dashboard(Request $request)
    {
        return view('reviewer.dashboard');
    }


    //Paper
    //=============================================================================================

    public function paperList(Request $request)
    {
        if($request->has('session') && !empty($request->session))
            $session = $request->session;
        else
            $session = config('app.sessions')[0];
        
        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('subjects', 'papers.subject_id', 'subjects.subject_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('programs', 'papers.program_id', 'programs.program_id')
            ->where('papers.session', $session)
            ->where('reviews.reviewer_id', $request->session()->get('reviewerId'))
            ->orderBy('reviews.review_id','DESC')->get();

        return view('reviewer.paper-list', ['papers' => $reviews, 'session' => $session]);
    }

    public function paperDetails(Request $request)
    {
        $request->validate([
            'review_id' => 'required',
        ]);

        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('subjects', 'papers.subject_id', 'subjects.subject_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('programs', 'papers.program_id', 'programs.program_id')

            ->where('reviews.reviewer_id', $request->session()->get('reviewerId'))
            ->where('reviews.review_id', $request->review_id)
            ->get();

        // echo "<pre>"; print_r($reviews); exit;

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        $rn = json_decode($reviews[0]->review_note);

        return view('reviewer.paper-details', ['paper' => $reviews[0], 'rn'=>$rn]);
    }

    public function paperUpdate(Request $request)
    {
        // echo '<pre>'; print_r(($_POST)); exit;

        $request->validate([
            'reviewId' => 'required',
        ]);

        $reqData = request()->all();

        // echo '<pre>'; print_r($reqData); exit; 

        $reqData['review_date'] = now();

        $review_note = json_encode($reqData);

        if(isset($request->save))
            $review_status = $request->save;
        else if(isset($request->review))
            if($request->accept=='reject')
                $review_status = -1;
            elseif($request->accept=='modification')
                $review_status = 1;
            elseif($request->accept=='accept')
                $review_status = 2;
            else
                return redirect()->back()->with('error', 'Something Went Wrong.');
        else
            return redirect()->back()->with('error', 'Something Went Wrong.');
        

        DB::table('reviews')
        ->where('review_id',$request->reviewId)
        ->update([
            'review_status' => $review_status,
            'review_note'   => $review_note, 
            'updated_on'    => now(),
            'updated_by'    => $request->session()->get('reviewerId'),
        ]);

        if(isset($request->save))
            return redirect()->back()->with('success', 'Thesis Paper Saved Successfully');
        else if(isset($request->review))
            return redirect()->back()->with('success', 'Thesis Paper Reviewed Successfully');
        else
            return redirect()->back()->with('error', 'Something Went Wrong.');
    }

}
