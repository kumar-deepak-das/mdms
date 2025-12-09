<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\PDFController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dream', function () { return view('dream.home');  });
// Route::get('/dream/login', function () { return view('dream.login'); });

// routes/web.php
Route::prefix('/')->group(function(){

	// Route::get('/mail-test', [MailController::class, 'sendMail'])->middleware('authenticateadmin');

	// Route::get('/', function () { return view('dream.home');  });
	// Route::get('/home', function () { return view('dream.home');  });
	
	// Route::get('login', function () { return view('dream.login');  });
	// Route::post('login', [AuthenticationController::class, 'validateLogin']);

	// Route::get('/', function () { return view('edgecut.home');  });
	// Route::get('/home', function () { return view('edgecut.home');  });
	// Route::get('/about', function () { return view('edgecut.about');  });
	// Route::get('/contact', function () { return view('edgecut.contact');  });

	Route::get('/', function () { return view('web.home');  });
	Route::get('/home', function () { return view('web.home');  });
	
	Route::get('admin-login', function () { return view('web.login-admin');  });
	Route::post('admin-login', [AdminController::class, 'validateLogin']);

	Route::get('reviewer-login', function () { return view('web.login-reviewer');  });
	Route::post('reviewer-login', [ReviewerController::class, 'validateLogin']);

});

Route::prefix('school/')->group(function(){

	Route::get('logout', [SchoolController::class, 'logout']);	
	Route::get('login', [SchoolController::class, 'login']);
	Route::post('login', [SchoolController::class, 'validateLogin']);

	Route::get('/', [SchoolController::class, 'dashboard'])->middleware('authenticateschool');
	Route::get('dashboard', [SchoolController::class, 'dashboard'])->middleware('authenticateschool');
	
	Route::get('reviewer-list', [SchoolController::class, 'reviewerList'])->middleware('authenticateschool');
	Route::get('reviewer-details', [SchoolController::class, 'reviewerDetails'])->middleware('authenticateschool');

	Route::get('paper-add', [SchoolController::class, 'paperAdd'])->middleware('authenticateschool');
	Route::post('paper-add', [SchoolController::class, 'paperAddNow'])->middleware('authenticateschool');
	Route::get('paper-list', [SchoolController::class, 'paperList'])->middleware('authenticateschool');
	Route::post('paper-update', [SchoolController::class, 'paperUpdateNow'])->middleware('authenticateschool');
	Route::get('paper-details', [SchoolController::class, 'paperDetails'])->middleware('authenticateschool');
	
});

Route::prefix('reviewer/')->group(function(){

	Route::get('logout', [ReviewerController::class, 'logout']);

	Route::get('/', [ReviewerController::class, 'paperList'])->middleware('authenticatereviewer');
	Route::get('dashboard', [ReviewerController::class, 'paperList'])->middleware('authenticatereviewer');
	Route::get('paper-list', [ReviewerController::class, 'paperList'])->middleware('authenticatereviewer');
	Route::get('paper-details/{review_id}', [ReviewerController::class, 'paperDetails'])->middleware('authenticatereviewer');
	Route::post('paper-details/{review_id}', [ReviewerController::class, 'review'])->middleware('authenticatereviewer');
	Route::get('remuneration/{review_id}', [ReviewerController::class, 'remuneration'])->middleware('authenticatereviewer');
	Route::post('remuneration/{review_id}', [ReviewerController::class, 'remunerationUpdate'])->middleware('authenticatereviewer');


	Route::get('profile', [ReviewerController::class, 'profile'])->middleware('authenticatereviewer');
	Route::post('update-profile', [ReviewerController::class, 'profileUpdate'])->middleware('authenticatereviewer');
	Route::post('update-image', [ReviewerController::class, 'imageUpdate'])->middleware('authenticatereviewer');
	Route::post('update-signature', [ReviewerController::class, 'signatureUpdate'])->middleware('authenticatereviewer');
	
});

Route::prefix('admin/')->group(function(){
	Route::get('logout', [AdminController::class, 'logout']);
	Route::get('/', [AdminController::class, 'dashboard'])->middleware('authenticateadmin');
	Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware('authenticateadmin');

	//School
	Route::get('school-add', [AdminController::class, 'schoolAdd'])->middleware('authenticateadmin');
	Route::post('school-add', [AdminController::class, 'schoolAddNow'])->middleware('authenticateadmin');
	Route::get('school-list', [AdminController::class, 'schoolList'])->middleware('authenticateadmin');
	Route::get('school-details/{school_id}', [AdminController::class, 'schoolDetails'])->middleware('authenticateadmin');
	Route::post('school-update', [AdminController::class, 'schoolUpdateNow'])->middleware('authenticateadmin');
	Route::post('school-department-add', [AdminController::class, 'schoolDepartmentAdd'])->middleware('authenticateadmin');
	Route::get('school-Departments-update', [AdminController::class, 'schoolDepartmentsUpdate'])->middleware('authenticateadmin');
	Route::post('school-password-reset', [AdminController::class, 'schoolPasswordReset'])->middleware('authenticateadmin');
	
	Route::get('get-departments', [AdminController::class, 'getDepartments'])->middleware('authenticateadmin');

	//Reviewer
	Route::get('reviewer-add', [AdminController::class, 'reviewerAdd'])->middleware('authenticateadmin');
	Route::post('reviewer-add', [AdminController::class, 'reviewerAddNow'])->middleware('authenticateadmin');
	Route::get('reviewer-list', [AdminController::class, 'reviewerList'])->middleware('authenticateadmin');
	Route::get('reviewer-details/{reviewer_id}', [AdminController::class, 'reviewerDetails'])->middleware('authenticateadmin');
	Route::post('reviewer-details/{reviewer_id}', [AdminController::class, 'reviewerUpdate'])->middleware('authenticateadmin');
	
	//Paper
	Route::get('paper-add', [AdminController::class, 'paperAdd'])->middleware('authenticateadmin');
	Route::post('paper-add', [AdminController::class, 'paperAddNow'])->middleware('authenticateadmin');
	Route::get('paper-list', [AdminController::class, 'paperList'])->middleware('authenticateadmin');
	Route::get('paper-details/{paper_id}', [AdminController::class, 'paperDetails'])->middleware('authenticateadmin');
	Route::post('paper-update', [AdminController::class, 'paperUpdateNow'])->middleware('authenticateadmin');
	Route::post('paper-reviewer-assign', [AdminController::class, 'paperReviewerAssign'])->middleware('authenticateadmin');
	Route::get('paper-review-status/{review_id}', [AdminController::class, 'paperReviewStatus'])->middleware('authenticateadmin');
	Route::get('reviewer-remuneration/{reviewer_id}', [AdminController::class, 'reviewerRemuneration'])->middleware('authenticateadmin');
	Route::get('reviewer-remuneration-download/{reviewer_id}', [AdminController::class, 'reviewerRemunerationDownload'])->middleware('authenticateadmin');
	
});