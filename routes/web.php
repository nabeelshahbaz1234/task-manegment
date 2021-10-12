<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\User\ProfileController;
// use App\Http\Controllers\Client\ClientsController;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
        
});




 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/add_project', function(){
//     return view ('dashboard/admin/add_project');
// });

Route::group(['prefix'=>'admin', 'middleware'=>['IsAdmin','auth','PreventBackHistory']],function(){
Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('view/{id}',[AdminController:: class,'view'])->name('admin.view');
Route::get('delete/{id}',[AdminController:: class,'delete'])->name('admin.delete');
// calender
Route::get('fullcalender',[FullCalenderController::class,'index'])->name('admin.calender');
Route::post('fullcalenderAjax', [FullCalenderController::class,'ajax']);
// project delete and detail
Route::get('view_project/{id}',[AdminController:: class,'view_project'])->name('admin.view_project');
Route::get('delete_project/{id}',[AdminController:: class,'delete_project'])->name('admin.delete_project');
// user detail and delte
Route::get('view_user/{id}',[AdminController:: class,'view_user'])->name('admin.view_user');
Route::get('delete_user/{id}',[AdminController:: class,'delete_user'])->name('admin.delete_user');


// Get All Projects
Route::get('add_project',[ProjectController::class,'add_project'])->name('admin.add_project');
Route::post("/add_proj",[ProjectController::class,'add_proj'])->name('admin.add_proj');
Route::get('edit_project/{id}',[ProjectController::class,'edit_project'])->name('admin.edit_project');
Route::post('update_project/{id}',[ProjectController::class,'update_project'])->name('admin.update_project');
Route::get('delete_project/{id}',[ProjectController::class,'delete_project'])->name('admin.delete_project');
Route::get('detail_project/{id}',[ProjectController::class,'detail_project'])->name('admin.detail_project');


// Get All Clients
Route::get('clients',[ClientController::class,'clients'])->name('admin.clients');
Route::post("/store",[ClientController::class,'store'])->name('admin.store');
Route::get('edit_client/{id}',[ClientController::class,'edit_client'])->name('admin.edit_client');
Route::post('update_client/{id}',[ClientController::class,'update_client'])->name('admin.update_client');
Route::get('delete_client/{id}',[ClientController::class,'delete_client'])->name('admin.delete_client');
Route::get('detail_client/{id}',[ClientController::class,'detail_client'])->name('admin.detail_client');
    //    Roles
Route::get('roles',[RoleController::class,'roles'])->name('admin.roles');
Route::post("/add_role",[RoleController::class,'add_role'])->name('admin.add_role');
Route::get('edit_role/{id}',[RoleController::class,'edit_role'])->name('admin.edit_role');
Route::Post('update_role/{id}',[RoleController::class,'update_role'])->name('admin.update_role');
Route::get('delete_role/{id}',[RoleController::class,'delete_role'])->name('admin.delete_role');
Route::get('detail_role/{id}',[RoleController::class,'detail_role'])->name('admin.detail_role');
//GET and post profile
Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
Route::post('',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
Route::get('change-password',[AdminController::class,'changePass'])->name('adminChangePassword');
Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword1');
// Get all user and post
Route::get('users',[UserController::class,'users'])->name('admin.users');
Route::post("/storeUser",[UserController::class,'storeUser'])->name('admin.storeUser');
// Route::get('edit_user',[UserController::class,'edit_user'])->name('admin.edit_user');
Route::get('edit_user/{id}',[UserController::class,'edit_user'])->name('admin.edit_user');
Route::Post('update_user/{id}',[UserController::class,'update_user'])->name('admin.update_user');
Route::get('delete_user/{id}',[UserController::class,'delete_user'])->name('admin.delete_user');
Route::get('detail_user/{id}',[UserController::class,'detail_user'])->name('admin.detail_user');

// Get and Post all task
Route::get('tasks',[TaskController::class,'tasks'])->name('admin.tasks');
Route::post("/storetask",[TaskController::class,'storetask'])->name('admin.storetask');
Route::get("edit_task/{id}",[TaskController::class,'edit_task'])->name('admin.edit_task');
Route::post("update_task/{id}",[TaskController::class,'update_task'])->name('admin.update_task');
Route::get("delete_task/{id}",[TaskController::class,'delete_task'])->name('admin.delete_task');
Route::get("delete_image/{id}",[TaskController::class,'delete_image'])->name('admin.delete_image');
Route::get("detail_task/{id}",[TaskController::class,'detail_task'])->name('admin.detail_task');
Route::post("/admin/update_status",[TaskController::class,'update_status'])->name('admin.update_status');
Route::get("/admin/complete_task",[TaskController::class,'complete_task'])->name('admin.complete_task');
Route::get("/admin/status_change/{id}",[TaskController::class,'status_change'])->name('admin.status_change');
Route::post("/store_comment",[TaskController::class,'store_comment'])->name('admin.store_comment');
Route::get("delete_comment/{id}",[TaskController::class,'delete_comment'])->name('admin.delete_comment');
Route::post("/comment_update",[TaskController::class,'Comment_update'])->name('admin.comment_update');
Route::post("admin/project_member",[TaskController::class,'project_member'])->name('admin.project_member');


});

Route::group(['prefix'=>'users', 'middleware'=>['IsUser','auth','PreventBackHistory']],function(){
    Route::get('dashboard',[ProfileController::class,'index'])->name('user.dashboard');
    // Get and Post Profile
    Route::get('userprofile',[ProfileController::class,'profile'])->name('user.userprofile');
    Route::post('UpdateInfo',[ProfileController::class,'update_info'])->name('user_UpdateInfo');
    Route::post('change_profile_picture',[ProfileController::class,'update_Picture'])->name('user_PictureUpdate');
    Route::get('change_pass',[ProfileController::class,'change_Pass'])->name('user_ChangePasswo');
    Route::post('change_passwo',[ProfileController::class,'change_Passwo'])->name('user_ChangePass');
    //   Get Clients 
    Route::get('clients',[ProfileController::class,'clients'])->name('user.clients');
    Route::get('detail_clients/{id}',[ProfileController::class,'detail_clients'])->name('user.detailclient');
    // Get and Detail of Projects
    Route::get('project',[ProfileController::class,'project'])->name('user.project');
    Route::get('detail_projects/{id}',[ProfileController::class,'detail_projects'])->name('user.detailproject');
    //  Get and Detail of task
    Route::get('task',[ProfileController::class,'task'])->name('user.tasks');
    Route::get('detail_tasks/{id}',[ProfileController::class,'detail_tasks'])->name('user.detailtask');
    Route::get('complete_task/{id}',[ProfileController::class,'complete_task'])->name('user.complete_task');
    Route::post("/store_comment",[ProfileController::class,'store_comment'])->name('user.store_comment');
    Route::get("delete_comment/{id}",[ProfileController::class,'delete_comment'])->name('user.delete_comment');
    Route::get("/user/comment_update",[TaskController::class,'Comment_update'])->name('user.comment_update');
    // Detail role
    Route::get('roles',[ProfileController::class,'roles'])->name('user.roles');
    Route::get('detail_role/{id}',[ProfileController::class,'detail_role'])->name('user.detailrole');
    Route::get('calender',[ProfileController::class,'calender'])->name('user.calender');
    });

Route::group(['prefix'=>'client', 'middleware'=>['isClient','auth','PreventBackHistory']],function(){
        Route::get('dashboard',[ClientController::class,'index'])->name('client.dashboard');
        Route::get('viewr/{id}',[ClientController:: class,'view'])->name('client.view');
        // Get and post Client Profile
        Route::get('/profile',[ClientController::class,'profile'])->name('client.profile');
        Route::post('/update_info',[ClientController::class,'update_info'])->name('client_updateinformation');
        Route::post('change_picture',[ClientController::class,'change_picture'])->name('client_picture');
        Route::get('/password',[ClientController::class,'password'])->name('client.password');
        Route::post('/update_password',[ClientController::class,'update_Password'])->name('client_updatepassword');
        Route::get('/project',[ClientController::class,'project'])->name('client.project');
        Route::get('/detail_projects/{id}',[ClientController::class,'detail_projects'])->name('client.detail_projects');
        Route::get('invoice',[ClientController::class,'invoice'])->name('client.invoice');
        // Get and Post All tasks
        Route::get('/task',[ClientController::class,'task'])->name('client.tasks');
        Route::post("/storetask",[ClientController::class,'storetask'])->name('client.storetask');
        Route::get("edit_task/{id}",[ClientController::class,'edit_task'])->name('client.edit_task');
        Route::post("update_task/{id}",[ClientController::class,'update_task'])->name('client.update_task');
        Route::get("delete/{id}",[ClientController::class,'delete_task'])->name('client.delete_task');
        Route::get("delete_image/{id}",[ClientController::class,'delete_image'])->name('client.delete_image');
        Route::get("detail_task/{id}",[ClientController::class,'detail_task'])->name('client.detail_task');
        Route::post("/store_comment",[ClientController::class,'store_comment'])->name('client.store_comment');
        Route::get("delete_comment/{id}",[ClientController::class,'delete_comment'])->name('client.delete_comment');
        Route::post("/comment_update",[ClientController::class,'Comment_update'])->name('client.comment_update');
        Route::POST("client/project_member",[ClientController::class,'project_member'])->name('client.project_member');


        });
































        
//     Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){
//     return view ('dashboard');
//     })->name('dashboard');


//     Route::get('/email/verify', function () {
//         return view('auth.verify-email');
//     })->middleware('auth')->name('verification.notice');

    
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');


// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
    