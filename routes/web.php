<?php

use App\Exports\DataExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\Individuals\UserController;
use App\Http\Controllers\Individuals\ClientController;
use App\Http\Controllers\Individuals\ApprovalController;
use App\Http\Controllers\Sp\SpApprovalController;
use App\Http\Controllers\Sp\CaseapplyController;
use App\Http\Controllers\SpController;
use App\Http\Controllers\ClientloginController;
use App\Http\Controllers\Clients\Client_CaseController;
use App\Http\Controllers\Clients\IndexController as ClientsIndexController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\commom\ChangePswController;
use App\Http\Controllers\commom\CasePartiaControllerl;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\IndividualController;
use App\Http\Controllers\Individuals\ExportExcelController;
use App\Http\Controllers\Individuals\ExportXlsController;
use App\Http\Controllers\Individuals\IndexController as IndividualsIndexController;
use App\Http\Controllers\Individuals\IndividualsController;
use App\Http\Controllers\Individuals\SpController as IndividualsSpController;
use App\Http\Controllers\Sp\IndexController;

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


Route::get('/individual/login', [IndividualController::class, 'login'])->name('backend_login');
Route::post('/individual/doLogin', [IndividualController::class, 'doLogin']);
//Route::get('/individual/captcha', [IndividualController::class, 'captcha']);


Route::get('/captcha', [CaptchaController::class, 'index']);

Route::get('/sp/login', [SpController::class, 'login'])->name('staff_login');
Route::post('/sp/doLogin', [SpController::class, 'doLogin']);


Route::get('clients/login', [ClientloginController::class, 'login']);
Route::post('clients/doLogin', [ClientloginController::class, 'doLogin']);



Route::get('/test-db', [LoanController::class, 'db'])->name('db');
Route::any('/store', [LoanController::class, 'store'])->name('store');
Route::any('mail/send', [MailController::class, 'sendMail']);
Route::get('/page', [ClientsController::class, 'page']);
Route::get('/form2', [LoanController::class, 'form'])->name('form');
Route::get('/form', [ClientsController::class, 'clients']);
Route::resource('case', CaseController::class);
Route::group(['middleware' => 'isLogin'], function () {
    Route::group(['prefix' => 'individual',], function () {
        Route::get('loan_template', [ImageUploadController::class, 'imageUpload'])->name('image.upload');
        Route::post('loan_template', [ImageUploadController::class, 'imageUploadPost'])->name('image.upload.post');
        Route::get('list', [IndividualController::class, 'list'])->name('backend_list');
        Route::get('case', [IndividualController::class, 'case'])->name('backend_case');
        Route::get('caseExcel/{caseExcel}', [ExportExcelController::class, 'caseExcel'])->name('caseExcel.show');
        Route::get('getAllid/{getAllid}', [ExportExcelController::class, 'getAllid'])->name('getAllid.show');
        Route::get('clientExcel/{clientExcel}', [ExportExcelController::class, 'clientExcel'])->name('clientExcel.show');
        Route::get('userlist', [IndividualController::class, 'userlist'])->name('backend_userlist');
        Route::get('clientlist', [IndividualController::class, 'clientlist'])->name('backend_clientlist');
        Route::get('approval', [IndividualController::class, 'approval'])->name('backend_approval');
        Route::get('splist', [IndividualController::class, 'splist'])->name('backend_splist');
        Route::get('getcase/{Getcase}', [IndividualsController::class, 'Getcase']);
        Route::get('splist1', [IndividualsSpController::class, 'splist'])->name('SpController_delete');
        Route::delete('spdelete/{spdelete}', [IndividualsSpController::class, 'delete'])->name('SpController_splist');
        Route::PUT('spcreate/{spcreate}', [IndividualsSpController::class, 'create'])->name('SpController_splist');
        Route::get('spshow/{spshow}', [IndividualsSpController::class, 'show'])->name('SpController_spshow');
        Route::post('spstatus', [IndividualsSpController::class, 'status'])->name('SpController_spstatus');
        Route::post('clientImport', [ExportExcelController::class, 'import'])->name('clientexcel.upload.post');
        Route::post('caseImport', [ExportExcelController::class, 'Spcaseimport'])->name('caseexcel.upload.post');
        Route::post('individualcaseImport', [ExportExcelController::class, 'Individualcaseimport'])->name('individualcaseImport.upload.post');
        Route::get('logout', [IndividualController::class, 'logout']);
        Route::any('changepsw',[ChangePswController::class,'index']);
        Route::post('editCaseLoanDetail/{id}',[CasePartiaControllerl::class, 'editCaseLoanDetail']);
    });

    Route::group(['prefix' => 'sp',], function () {
        Route::get('list', [SpController::class, 'list'])->name('staff_list');
        Route::get('caseapply', [SpController::class, 'caseapply'])->name('staff_caseapply');
        Route::get('approval', [SpController::class, 'approval'])->name('staff_approval');
        Route::get('spapproval', [SpController::class, 'spapproval'])->name('staff_spapproval');
        Route::post('cancel/{cancel}', [IndexController::class, 'cancel'])->name('staff_cancel');
        Route::get('logout', [SpController::class, 'logout']);
        Route::any('changepsw',[ChangePswController::class,'index']);
        Route::post('editCaseLoanDetail/{id}',[CasePartiaControllerl::class, 'editCaseLoanDetail']);
    });

    Route::group(['prefix' => 'clients',], function () {
        Route::get('case', [ClientsController::class, 'case'])->name('client_case');
        Route::get('details', [ClientsController::class, 'details'])->name('client_details');
        Route::get('profile', [ClientsController::class, 'profile'])->name('client_profile');
        Route::get('GetFile/{GetFile}', [ClientsIndexController::class, 'GetFile'])->name('client_GetFile');
        Route::delete('delupload/{delupload}', [ClientsIndexController::class, 'delupload'])->name('client_delupload');
        Route::post('Clientcaseimport', [ExportExcelController::class, 'Clientcaseimport'])->name('Clientcaseimport.upload');
        Route::match(['get','post'],'changepsw',[ChangePswController::class,'index']);
        Route::get('logout', [ClientloginController::class, 'logout']);
    });

    Route::get('sp/getFileUrl/{getFileUrl}', [IndexController::class, 'getFileUrl'])->name('getFileUrl');
    Route::resource('Individuals/user', UserController::class);
    Route::resource('Clients/Client_Case', Client_CaseController::class);
    Route::resource('Clients/Profile', ProfileController::class);
    Route::resource('Individuals/client', ClientController::class);
    Route::resource('Individuals/approval', ApprovalController::class);
    Route::resource('Sp/spapproval', SpApprovalController::class);
    Route::get('individual/exportLog/{exportLog}', [IndividualsIndexController::class, 'exportLog']);

});


Route::any('donate-form', [DonateController::class, 'index']);
Route::any('save-form', [DonateController::class, 'store']);
Route::any('/ajax-checkemailormpbile', [AjaxController::class, 'checkemailormpbile'])->name('checkemailormpbile');
