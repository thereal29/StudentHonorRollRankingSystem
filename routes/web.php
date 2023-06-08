<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/register', function () {
//     return view('auth.register');
// });
Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//route for admin
// Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');
// });

// //route for adviser
// Route::group(['prefix' => 'adviser','middleware'=>['auth','adviser']], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'adviser'])->name('home');
// });

// //route for grade 10 students
// Route::group(['prefix' => 'grade10','middleware'=>['auth','grade10']], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'grade10'])->name('home');
// });

// //route for grade 12 students
// Route::group(['prefix' => 'grade12','middleware'=>['auth','grade12']], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'grade12'])->name('home');
// });

//route for admin
// Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
//     Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
// });

// //route for executive
// Route::group(['prefix' => 'adviser','middleware'=>['auth','adviser']], function () {
//     Route::get('dashboard', 'DashboardController@adviser')->name('adviser.dashboard');
// });

// //route for user
// Route::group(['prefix' => 'grade10','middleware'=>['auth','grade10']], function () {
//     Route::get('dashboard', 'DashboardController@grade10')->name('grade10.dashboard');
// });
// Route::group(['prefix' => 'grade12','middleware'=>['auth','grade12']], function () {
//     Route::get('dashboard', 'DashboardController@grade12')->name('grade12.dashboard');
// });



//Admin Route
Route::middleware(['auth', 'user-role:admin'])->group(function()
{
    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/admin/profile', 'App\Http\Controllers\Admin\ProfileController@index')->name('admin.profile');
    Route::get('/admin/academicrecord', 'App\Http\Controllers\Admin\RecordController@maincontent')->name('admin.academic_record');
    Route::get('/admin/report', 'App\Http\Controllers\Admin\ReportController@maincontent')->name('admin.honor_roll_reports');
    Route::get('/admin/evaluation', 'App\Http\Controllers\Admin\EvaluationController@maincontent')->name('admin.evaluation_setting');
    Route::get('/admin/userlist', 'App\Http\Controllers\Admin\UserController@maincontent')->name('admin.users_list');
    Route::get('/admin/logs', 'App\Http\Controllers\Admin\LogsController@maincontent')->name('admin.users_logs');
    Route::get('/admin/maintenance', 'App\Http\Controllers\Admin\MaintenanceController@maincontent')->name('admin.maintenance');
});

//Adviser Route
Route::middleware(['auth', 'user-role:faculty'])->group(function()
{
    Route::get('/faculty/dashboard', [HomeController::class, 'faculty'])->name('adviser.dashboard');
    Route::get('/faculty/profile', 'App\Http\Controllers\ProfileController@faculty')->name('adviser.profile');
    Route::get('/faculty/academicrecord', 'App\Http\Controllers\Adviser\RecordController@maincontent')->name('adviser.academic_record');
    Route::get('/faculty/advisory', 'App\Http\Controllers\Adviser\AdvisoryController@maincontent')->name('adviser.student_advisory');
    Route::get('/faculty/report', 'App\Http\Controllers\Adviser\ReportController@maincontent')->name('adviser.honor_roll_reports');
});

//Grade 10 Route
Route::middleware(['auth', 'user-role:user1'])->group(function()
{
    Route::get('/user1/dashboard', [HomeController::class, 'user1'])->name('grade10student.dashboard');
    Route::get('/user1/profile', 'App\Http\Controllers\ProfileController@user1')->name('grade10student.profile');
    Route::get('/user1/honorrollranking', 'App\Http\Controllers\Grade10Student\RankingController@maincontent')->name('grade10student.honor_roll_ranking');
    Route::get('/user1/cocurricularactivities', 'App\Http\Controllers\Grade10Student\ActivityController@maincontent')->name('grade10student.co_curricular_activities');
    Route::get('/user1/peerevaluation', 'App\Http\Controllers\Grade10Student\EvaluationController@maincontent')->name('grade10student.peer_evaluation');
});

//Grade 12 Route
Route::middleware(['auth', 'user-role:user2'])->group(function()
{
    Route::get('/user2/dashboard', [HomeController::class, 'user2'])->name('grade12student.dashboard');
    Route::get('/user2/profile', 'App\Http\Controllers\ProfileController@user2')->name('grade12student.profile');
    Route::get('/user2/honorrollranking', 'App\Http\Controllers\Grade12Student\RankingController@maincontent')->name('grade12student.honor_roll_ranking');
});
//Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
