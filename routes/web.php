<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Chr_Admin;
use App\Http\Controllers\Chr_User;
use App\Http\Controllers\ChatController;
use App\Http\Middleware\UserEmailMiddleware;
use Illuminate\Support\Facades\Route;


// officer
Route::get('/', function () {
    return redirect('/Homepage');
});

Route::get('/Officer-Dashboard', [Chr_Admin::class,'Officer_Dashboard'])->name('Officer-Dashboard');
Route::get('/Officer-Form-9', [Chr_Admin::class,'Officer_Form_9'])->name('/Officer-Form-9');
Route::get('/Officer-Form-10', [Chr_Admin::class,'Officer_Form_10'])->name('/Officer-Form-10');
Route::get('/Officer-User-Account', [Chr_Admin::class,'Officer_User_Account'])->name('/Officer-User-Account');
Route::get('/Officer-Endorse', [Chr_Admin::class,'Officer_Endorse'])->name('/Officer-Endorse');

Route::get('/Officer-Content', [Chr_Admin::class,'Officer_Content'])->name('/Officer-Content');
Route::post('/Content-Case', [Chr_Admin::class, 'contentcase'])->name('Content.Case');
Route::post('/Content-Book', [Chr_Admin::class, 'contentbook'])->name('Content.Book');
Route::post('/Content-Sector', [Chr_Admin::class, 'contentsector'])->name('Content.Sector');
Route::post('/Content-Forum', [Chr_Admin::class, 'contentforum'])->name('Content.Forum');
Route::post('/Content-News', [Chr_Admin::class, 'contentnews'])->name('Content.News');


Route::delete('/Content-Case/{id}', [Chr_Admin::class, 'content_case_destroy'])->name('content.case.destroy');
Route::delete('/Content-Book/{id}', [Chr_Admin::class, 'content_book_destroy'])->name('content.book.destroy');
Route::delete('/Content-Sector/{id}', [Chr_Admin::class, 'content_sector_destroy'])->name('content.sector.destroy');
Route::delete('/Content-Forum/{id}', [Chr_Admin::class, 'content_forum_destroy'])->name('content.forum.destroy');
Route::delete('/Content-News/{id}', [Chr_Admin::class, 'content_news_destroy'])->name('content.news.destroy');





Route::get('/Officer-Reports', [Chr_Admin::class,'Officer_Reports'])->name('/Officer-Reports');
Route::get('/Officer-Forum', [Chr_Admin::class,'Officer_Forum'])->name('/Officer-Forum');
Route::post('/Officer-Summary', [Chr_Admin::class, 'Officer_Summary'])->name('Officer-Summary');
Route::get('/Officer-Setting', [Chr_Admin::class,'Officer_Setting'])->name('officer.setting');
//updating officer info
Route::put('/Officer-Setting', [Chr_Admin::class, 'update'])->name('officer.update');



// admin
Route::get('/Admin-Dashboard', [Chr_Admin::class,'Admin_Dashboard'])->name('Admin-Dashboard');
Route::get('/Admin-Endorse', [Chr_Admin::class,'Admin_Endorse'])->name('Admin-Endorse');
Route::get('/Admin-Case', [Chr_Admin::class,'Admin_Case'])->name('Admin-Case');
Route::get('/Admin-Reports', [Chr_Admin::class,'Admin_Reports'])->name('/Admin-Reports');
Route::get('/Admin-Setting', [Chr_Admin::class,'Admin_Setting'])->name('/Admin-Setting');
Route::get('/Admin-Employee', [Chr_Admin::class,'Admin_Employee'])->name('/Admin-Employee');

Route::post('/generate-report', [Chr_Admin::class, 'generateReport'])->name('generateReport');
Route::post('/admincases/approve', [Chr_Admin::class, 'adminapproveCase'])->name('admincases.approve');

// lawyer
Route::get('/Lawyer-Dashboard', [Chr_Admin::class,'Lawyer_Dashboard'])->name('Lawyer-Dashboard');
Route::get('/Lawyer-Complain', [Chr_Admin::class,'Lawyer_Complain'])->name('/Lawyer-Complain');
Route::get('/Lawyer-Case', [Chr_Admin::class,'Lawyer_Cases'])->name('/Lawyer-Case');
Route::get('/Lawyer-Message', [Chr_Admin::class,'Lawyer_Message'])->name('/Lawyer-Message');
Route::get('/Lawyer-Reports', [Chr_Admin::class,'Lawyer_Reports'])->name('/Lawyer-Reports');
Route::get('/Lawyer-Setting', [Chr_Admin::class,'Lawyer_Setting'])->name('/Lawyer-Setting');

//legal Head
Route::get('/Legal-Head-Dashboard', [Chr_Admin::class,'Legal_Head_Dashboard'])->name('Legal-Head-Dashboard');
Route::get('/Legal-Head-Form', [Chr_Admin::class,'Legal_Head_Form'])->name('/Legal-Head-Form');
Route::get('/Legal-Head-Case', [Chr_Admin::class,'Legal_Head_Case'])->name('/Legal-Head-Case');
Route::get('/Legal-Head-Report', [Chr_Admin::class,'Legal_Head_Report'])->name('/Legal_Head-Report');
Route::get('/Legal-Head-Setting', [Chr_Admin::class,'Legal_Head_Setting'])->name('/Legal_Head-Setting');




// login
Route::get('/Admin', [Chr_Admin::class,'Admin'])->name('Admin');
Route::post('/Admin_login', [Chr_Admin::class,'admin_login_post'])->name('admin.login.post');
Route::post('admin/logout', [Chr_Admin::class, 'admin_logout'])->name('admin.logout');


// user
Route::get('/Login', [Chr_User::class,'Login'])->name('Login');
Route::get('/Homepage', [Chr_User::class,'Homepage'])->name('Homepage');
Route::post('/User_Login', [Chr_User::class,'user_login_post'])->name('user.login.post');
Route::get('/logout', [Chr_User::class,'logout'])->name('logout');
Route::get('/Law', [Chr_User::class,'Law'])->name('Law');

Route::get('/Forum', [Chr_User::class,'Forum'])->name('Forum');
Route::get('/Complain', [Chr_User::class,'Complain'])->name('Complain');
Route::get('/AboutUs', [Chr_User::class,'AboutUs'])->name('AboutUs');
Route::get('/Complain-form', [Chr_User::class,'Complain_Form'])->name('complain-form');
Route::get('/List', [Chr_User::class,'List'])->name('List');
Route::get('/check-case-status', [Chr_User::class, 'checkCaseStatus'])->name('checkCaseStatus');
Route::post('/Chat-form', [Chr_User::class,'chat_form'])->name('chat_form');
Route::get('/Register', [Chr_User::class,'Register'])->name('Register');
Route::post('/Register-Account', [Chr_User::class,'user_register_post'])->name('register_post');
Route::post('/Case-Report', [Chr_User::class,'user_form_post'])->name('user_form_post');
Route::get('/Newsfeed', [Chr_User::class,'Newsfeed'])->name('Newsfeed');
Route::get('/newsfeed/{id}', [Chr_User::class, 'show'])->name('newsfeed.show');

Route::get('/profile/{user_id}', [Chr_User::class, 'showprofile'])->name('profile.show');
Route::put('/profile/{user_id}', [Chr_User::class, 'updateprofile'])->name('profile.update');

Route::post('/cases/approve', [Chr_Admin::class, 'approveCase'])->name('cases.approve');
Route::post('/cases/endorse', [Chr_Admin::class, 'endorseCase'])->name('cases.endorse');
Route::post('/cases/endorse/approve', [Chr_Admin::class, 'approveendorseCase'])->name('cases.approveendorse');

Route::get('/printpdf/{reference_number}', [Chr_Admin::class, 'printpdf'])->name('printpdf');

Route::post('/generate-chart', [Chr_Admin::class, 'generateChart'])->name('generate-chart');


Route::post('/save-feedback', [Chr_User::class, 'store'])->name('save-feedback');
// reset
Route::post('/send-otpauth', [Chr_User::class, 'sendOtpauth'])->name('send.otpauth');
Route::get('/Verify-Email-auth', [Chr_User::class, 'Verify_Emailauth'])->name('Verify.emailauth');
Route::post('/verify-otpauth', [Chr_User::class, 'verifyOtpauth'])->name('verify.otpauth');


Route::get('/Reset-Password', [Chr_User::class,'Reset_Password'])->name('Reset-Password');
Route::get('/Reset', [Chr_User::class,'Reset'])->name('Reset');
Route::get('/Verify-Email', [Chr_User::class,'Verify'])->name('verify.email');
Route::get('/Change', [Chr_User::class,'Change'])->name('Change');
Route::post('/send-otp', [Chr_User::class, 'sendOtp'])->name('send.otp');
Route::post('/Verify', [Chr_User::class, 'Verify'])->name('Verify');
Route::get('/Verify-Email-', [Chr_User::class, 'Verify_Email'])->name('Verify.email');
Route::post('/verify-otp', [Chr_User::class, 'verifyOtp'])->name('verify.otp');
Route::post('change-password', [Chr_User::class, 'changePassword'])->name('change.password');

Route::get('/Verify-Auth', [Chr_User::class,'Verifyauth'])->name('verify.auth');
// Route::get('Email', function () {
//     return view('layout.email');
// });

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/Officer-Message', [Chr_Admin::class,'Officer_Message'])->name('/Officer-Message');
//     Route::get('/Lawyer-Message', [Chr_Admin::class,'Lawyer_Message'])->name('/Lawyer-Message');
//     Route::post('/admin/messages', [Chr_Admin::class, 'sendMessage']);
// });
Route::middleware([UserEmailMiddleware::class])->group(function () {
    Route::get('/Officer-Message', [Chr_Admin::class,'Officer_Message'])->name('/Officer-Message');
    Route::get('/Lawyer-Message', [Chr_Admin::class,'Lawyer_Message'])->name('/Lawyer-Message');
    Route::post('/admin/messages', [Chr_Admin::class, 'sendMessage'])->name('admin.message.send');


    Route::get('/Officer-Messages', [Chr_Admin::class,'Officer_Messages'])->name('/Officer-Messages');
});

Route::middleware([UserEmailMiddleware::class])->group(function () {
    Route::get('/Message', [Chr_User::class, 'Message'])->name('Message');
    Route::post('/user/messages', [Chr_User::class, 'sendMessage'])->name('messages.send');
    Route::get('/fetch-messages', [Chr_User::class, 'fetchMessages'])->name('fetch.messages');

    Route::get('/User-Messages', [Chr_User::class,'Message_Messages'])->name('/User-Messages');
});

// Download reference pdf
Route::get('download-reference-pdf', [Chr_User::class, 'downloadReferencePdf'])->name('downloadReferencePdf');






