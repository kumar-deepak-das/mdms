<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ReviewerController;


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
	// Route::get('login', [ReviewerController::class, 'login']);
	// Route::post('login', [ReviewerController::class, 'validateLogin']);

	Route::get('/', [ReviewerController::class, 'dashboard'])->middleware('authenticatereviewer');
	Route::get('dashboard', [ReviewerController::class, 'dashboard'])->middleware('authenticatereviewer');
	
	Route::get('paper-list', [ReviewerController::class, 'paperList'])->middleware('authenticatereviewer');
	// Route::post('paper-update', [ReviewerController::class, 'paperUpdateNow'])->middleware('authenticatereviewer');

	Route::get('paper-details', [ReviewerController::class, 'paperDetails'])->middleware('authenticatereviewer');
	Route::post('paper-details', [ReviewerController::class, 'paperUpdate'])->middleware('authenticatereviewer');
	
});

Route::prefix('admin/')->group(function(){
	Route::get('logout', [AdminController::class, 'logout']);	
	// Route::get('login', [AdminController::class, 'login']);
	// Route::post('login', [AdminController::class, 'validateLogin']);

	Route::get('/', [AdminController::class, 'dashboard'])->middleware('authenticateadmin');
	Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware('authenticateadmin');

	Route::get('school-add', [AdminController::class, 'schoolAdd'])->middleware('authenticateadmin');
	Route::post('school-add', [AdminController::class, 'schoolAddNow'])->middleware('authenticateadmin');
	Route::get('school-list', [AdminController::class, 'schoolList'])->middleware('authenticateadmin');
	Route::post('school-update', [AdminController::class, 'schoolUpdateNow'])->middleware('authenticateadmin');
	Route::get('school-details', [AdminController::class, 'schoolDetails'])->middleware('authenticateadmin');
	Route::post('school-program-add', [AdminController::class, 'schoolProgramAdd'])->middleware('authenticateadmin');
	Route::get('school-programs-update', [AdminController::class, 'schoolProgramsUpdate'])->middleware('authenticateadmin');
	Route::post('school-password-reset', [AdminController::class, 'schoolPasswordReset'])->middleware('authenticateadmin');

	Route::get('reviewer-add', [AdminController::class, 'reviewerAdd'])->middleware('authenticateadmin');
	Route::post('reviewer-add', [AdminController::class, 'reviewerAddNow'])->middleware('authenticateadmin');
	Route::get('reviewer-list', [AdminController::class, 'reviewerList'])->middleware('authenticateadmin');
	Route::get('reviewer-details', [AdminController::class, 'reviewerDetails'])->middleware('authenticateadmin');
	Route::post('reviewer-details', [AdminController::class, 'reviewerUpdate'])->middleware('authenticateadmin');
	
	Route::get('paper-add', [AdminController::class, 'paperAdd'])->middleware('authenticateadmin');
	Route::post('paper-add', [AdminController::class, 'paperAddNow'])->middleware('authenticateadmin');
	Route::get('paper-list', [AdminController::class, 'paperList'])->middleware('authenticateadmin');
	Route::post('paper-update', [AdminController::class, 'paperUpdateNow'])->middleware('authenticateadmin');
	Route::get('paper-details', [AdminController::class, 'paperDetails'])->middleware('authenticateadmin');
	Route::post('paper-reviewer-assign', [AdminController::class, 'paperReviewerAssign'])->middleware('authenticateadmin');

	Route::get('paper-review-status', [AdminController::class, 'paperReviewStatus'])->middleware('authenticateadmin');
	
});