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

        // echo '<pre>'; print_r($reviewers); exit;

        if(count($reviewers)==0){
            return redirect()->back()->with('error',"Invalid User ID")->withInput();
        }
        elseif( $reviewers[0]->reviewer_password == $pw || md5($pw) == $this->getMasterValue('password') ){
            $request->session()->put('reviewerId', $reviewers[0]->reviewer_id);
            $request->session()->put('reviewerName', $reviewers[0]->reviewer_name);
            return redirect('/reviewer');
        }
        else
            return Redirect::back()->with('error','Wrong Password');
    }

    public function dashboard(Request $request)
    {
        return view('reviewer.dashboard');
    }

    public function profile(Request $request)
    {
        $reviewers = DB::table('reviewers')->where('reviewer_id', $request->session()->get('reviewerId'))->get();
        if(count($reviewers)!=1)
            return Redirect::back()->with('error','Something Went Wrong');
        return view('reviewer.profile', ['reviewer'=>$reviewers[0]]);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'reviewer_name' => 'required',
            'reviewer_email' => 'required',
            'reviewer_phone' => 'required',
            'reviewer_address' => 'required',
        ]);


        DB::table('reviewers')->where('reviewer_id', $request->session()->get('reviewerId'))
            ->update([
                'reviewer_name' => $request->reviewer_name,
                'reviewer_email' => $request->reviewer_email,
                'reviewer_phone' => $request->reviewer_phone,
                'reviewer_address' => $request->reviewer_address,
            ]);

        return Redirect::back()->with('success','Profile Updated Successfully');
    }

    public function imageUpdate(Request $request)
    {
        $request->validate([
            'reviewer_image' => 'required',
        ]);

        $reviewer_image = 'Image_'. $request->session()->get('reviewerId') . '_' . time() . '.'.$request->reviewer_image->extension();
        $request->reviewer_image->move(public_path('uploads/reviewer_image'),$reviewer_image);


        DB::table('reviewers')->where('reviewer_id', $request->session()->get('reviewerId'))
            ->update([
                'reviewer_image' => $reviewer_image,
            ]);

        return Redirect::back()->with('success','Profile Image Updated Successfully');
    }

    public function signatureUpdate(Request $request)
    {
        $request->validate([
            'reviewer_signature' => 'required',
        ]);

        $reviewer_signature = 'Signature_'. $request->session()->get('reviewerId') . '_' . time() . '.'.$request->reviewer_signature->extension();
        $request->reviewer_signature->move(public_path('uploads/reviewer_signature'),$reviewer_signature);


        DB::table('reviewers')->where('reviewer_id', $request->session()->get('reviewerId'))
            ->update([
                'reviewer_signature' => $reviewer_signature,
            ]);

        return Redirect::back()->with('success','Signature Updated Successfully');
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
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('departments', 'papers.department_id', 'departments.department_id')
            ->where('papers.session', $session)
            ->where('reviews.reviewer_id', $request->session()->get('reviewerId'))
            ->orderBy('reviews.review_id','DESC')->get();

        return view('reviewer.paper-list', ['papers' => $reviews, 'session' => $session]);
    }

    public function paperDetails(Request $request, $review_id)
    {
        // $request->validate([ 'review_id' => 'required', ]);

        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            ->join('schools', 'papers.school_id', 'schools.school_id')
            ->join('departments', 'papers.department_id', 'departments.department_id')

            ->where('reviews.reviewer_id', $request->session()->get('reviewerId'))
            ->where('reviews.review_id', $review_id)
            ->get();

        // echo "<pre>"; print_r($reviews); exit;

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        $rn = json_decode($reviews[0]->review_note);

        return view('reviewer.paper-details', ['paper' => $reviews[0], 'rn'=>$rn]);
    }

    public function review(Request $request, $review_id)
    {
        // echo '<pre>'; print_r(($_POST)); exit;

        // $request->validate(['review_id' => 'required', ]);

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
        ->where('review_id',$review_id)
        ->update([
            'status' => 1,
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

    public function remuneration(Request $request, $review_id)
    {
        // $request->validate(['review_id' => 'required',]);

        $reviews = DB::table('reviews')
            ->join('reviewers', 'reviews.reviewer_id', 'reviewers.reviewer_id')
            ->join('papers', 'reviews.paper_id', 'papers.paper_id')
            
            // ->join('schools', 'papers.school_id', 'schools.school_id')
            // ->join('departments', 'papers.department_id', 'departments.department_id')

            ->where('reviews.reviewer_id', $request->session()->get('reviewerId'))
            ->where('reviews.review_id', $review_id)->get();

        // echo "<pre>"; print_r($reviews); exit;

        if(count($reviews)==0){
            return redirect()->back()->with('error',"Invalid Paper Details")->withInput();
        }

        $rn = json_decode($reviews[0]->review_note);

        return view('reviewer.remuneration', ['paper' => $reviews[0], 'rn'=>$rn]);
    }


    public function remunerationUpdate(Request $request)
    {
        $request->validate([
            'review_id'     => 'required',
            'payble_at'     => 'required',
            'beneficiary_name'    => 'required',
            'bank_name'     => 'required',
            'branch_name'   => 'required',
            'bank_address'  => 'required',
            'account_no'    => 'required',
            'ifsc_code'     => 'required',
        ]);

        $reviewers = DB::table('reviews')
            ->where('review_id',$request->review_id)
            ->where('reviewer_id',$request->session()->get('reviewerId'))
            ->select('reviewer_id')->get();

        if(count($reviewers)!=1)
            return redirect()->back()->with('error', 'Something Went Wrong.');


        if($request->has('signature_file')){
            $request->validate([
                'signature_file'=> 'required|image|mimes:jpg,jpeg,png|max:100000',
            ]);
            $fileType = $request->signature_file->extension();

            $signature_filename = 'Sign_' . $request->session()->get('reviewerId'). '_' . time() . '.' . $fileType;
            $request->signature_file->move(public_path('uploads/reviewer_signature'),$signature_filename);

            DB::table('reviewers')
                ->where('reviewer_id', $request->session()->get('reviewerId'))
                ->update([
                    'reviewer_signature'=> $signature_filename,
                    'updated_on'    => now(),
                    'updated_by'    => $request->session()->get('reviewerId'),
                ]
            );  
        }
                    

        DB::table('reviews')
            ->where('review_id',$request->review_id)
            ->update([
                'status'    => 2,
                'payble_at' => $request->payble_at,
                'beneficiary_name'    => $request->beneficiary_name,
                'bank_name'     => $request->bank_name,
                'branch_name'   => $request->branch_name,
                'bank_address'  => $request->bank_address,
                'account_no'    => $request->account_no,
                'ifsc_code'     => $request->ifsc_code,
                'updated_on'    => now(),
                'updated_by'    => $request->session()->get('reviewerId'),
            ]
        );

        return redirect()->back()->with('success', 'Remuneration Form Submited Successfully');

    }

}
