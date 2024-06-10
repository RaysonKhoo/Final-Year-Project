<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PdfController;


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
Route::middleware(['guest'])->group(function(){
    Route::view('/', 'front_page/index');
    Route::get('/login', [AuthController::class,'index'])->name('auth');
    Route::post('/login',[AuthController::class, 'login']);
    Route::get('/registration', [AuthController::class,'create'])->name('register');
    Route::post('/registration',[AuthController::class, 'register']);
    Route::get('/verify/{verify_key}',[AuthController::class,'verify']);
    Route::get('/forgotpassword',[AuthController::class,'forgotpasswordview'])->name('password.request');
    Route::post('/forgotpassword',[AuthController::class,'forgotpasswordrequest'])->name('password.email');
    Route::get('/resetpassword/{token}',[AuthController::class,'forgotpasswordreset'])->name('password.reset');
    Route::post('/resetpassword',[AuthController::class,'passwordresetsave'])->name('password.update');
});
Route::middleware(['auth'])->group(function(){
    Route::redirect('/home','/user');
    Route::get('/staff',[StaffController::class, 'index'])->name('staff')->middleware('UserAccess:staff');
    Route::get('/api/parcels', [StaffController::class, 'getParcels'])->middleware('UserAccess:staff');
    Route::get('/api/parcels/arrived', [StaffController::class, 'getParcelsArrived'])->middleware('UserAccess:staff');
    Route::get('/api/parcels/user', [UserController::class, 'getParcelsUser'])->middleware('UserAccess:user');
    Route::get('/api/parcels/arrived/user', [UserController::class, 'getParcelsArrivedUser'])->middleware('UserAccess:user');
    Route::get('/user',[UserController::class, 'index'])->name('user')->middleware('UserAccess:user');
    Route::get('/userlist',[StaffController::class, 'userlist'])->name('userlist')->middleware('UserAccess:staff');
    Route::get('/usereditprofile',[UserController::class, 'edit_profile'])->name('edit_profile')->middleware('UserAccess:user');
    Route::put('/usereditprofile',[UserController::class, 'update_profile'])->name('update_profile')->middleware('UserAccess:user');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::delete('Userdeleted/{id}', [StaffController::class, 'deleted'])->middleware('UserAccess:staff');
    Route::get('/api/parcels', [StaffController::class, 'getParcels']);

    /*Feedback */
    Route::get('/feedbackform',[FeedbackController::class, 'Feedbackform'])->name('Feedbackform')->middleware('UserAccess:user');
    Route::post('/feedbackform',[FeedbackController::class, 'Feedbackstore'])->name('Feedback.store')->middleware('UserAccess:user');
    Route::get('/feedbacklist',[FeedbackController::class, 'Feedbacklist'])->name('Feedback.list')->middleware('UserAccess:user');
    Route::get('/Feedbackedit/{id}',[FeedbackController::class, 'edit'])->middleware('UserAccess:user');
    Route::put('/FeedbackUpdate/{id}', [FeedbackController::class, 'update'])->name('Feedback.update')->middleware('UserAccess:user');
    Route::delete('Feedbackdeleted/{id}', [FeedbackController::class, 'deleted'])->middleware('UserAccess:user');
    Route::get('/feedbackListStaff',[FeedbackController::class,'Feedbackliststaff'])->name('Feedbackstaff.list')->middleware('UserAccess:staff');
    Route::post('/feedbackreply/{id}',[FeedbackController::class, 'Feedbackreply'])->name('Feedback.reply')->middleware('UserAccess:staff');

    /*Announcement*/
    Route::get('/AnnoucementForm',[AnnouncementController::class, 'AddAnnouncement'])->name('Annoucenment')->middleware('UserAccess:staff');
    Route::post('/AnnoucementStore',[AnnouncementController::class, 'storeAnnouncement'])->name('announcement.store')->middleware('UserAccess:staff');
    Route::get('/Annoucementlist',[AnnouncementController::class, 'AnnouncementList'])->name('announcement.post')->middleware('UserAccess:staff');
    Route::get('/Announcementedit/{id}',[AnnouncementController::class, 'edit'])->middleware('UserAccess:staff');
    Route::put('/AnnouncementUpdate/{id}', [AnnouncementController::class, 'update'])->middleware('UserAccess:staff');
    Route::delete('announcementsdeleted/{id}', [AnnouncementController::class, 'deleted'])->middleware('UserAccess:staff');

    /*Parcel*/
    Route::get('/Addparcel',[ParcelController::class, 'Addparcel'])->name('AddParcel')->middleware('UserAccess:staff');
    Route::post('/scan', [ScanController::class,'processScan'])->name('scan');
    Route::post('/ParcelStore',[ParcelController::class, 'storeParcel'])->name('store.parcel')->middleware('UserAccess:staff');
    Route::get('/createParcel',[ParcelController::class, 'parcelform'])->name('add.Parcel')->middleware('UserAccess:staff');
    Route::post('/ParcelSave',[ParcelController::class, 'saveParcel'])->name('save.parcel')->middleware('UserAccess:staff');
    Route::get('/UserParcellist',[ParcelController::class, 'ParcelList'])->name('Userparcel.list')->middleware('UserAccess:staff');
    Route::delete('Parceldeleted/{id}', [ParcelController::class, 'deleted'])->middleware('UserAccess:staff');
    Route::get('/Parceledit/{id}',[ParcelController::class, 'edit'])->middleware('UserAccess:staff');
    Route::get('/ParcelList',[ParcelController::class, 'UserParcelList'])->name('parcel.list')->middleware('UserAccess:user');
    Route::post('/ParcelReceived/{id}', [ParcelController::class, 'confirmReceived'])->name('store.collect.date');
    Route::post('/timeSelection/{id}', [ParcelController::class, 'timeSelection']);
    Route::get('/track-parcel', [ParcelController::class, 'getParcelHistory'])->name('track.parcel');

    /*Notification*/
    Route::get('/markasread', [NotificationController::class,'markAsRead'])->name('MarkAsRead');
    Route::get('/clearall', [NotificationController::class,'clearAll'])->name('ClearAll');
    Route::post('/reselectdatetime/{id}', [NotificationController::class, 'ReselectDateTimeSelection']);



    /*Review and Rating*/
    Route::get('/reviewRating', [ReviewController::class, 'View'])->name('review.list');
    Route::get('/CreateReviewRating', [ReviewController::class, 'create'])->name('create.review')->middleware('UserAccess:user');
    Route::post('/StoreRating/{id}', [ReviewController::class, 'store'])->name('store.review')->middleware('UserAccess:user');
    Route::get('/myReview',[ReviewController::class, 'myReview'])->name('edit.review')->middleware('UserAccess:user');
    Route::put('/updateReview/{id}',[ReviewController::class, 'updateReview'])->name('update.review')->middleware('UserAccess:user');
    Route::delete('Reviewdeleted/{id}', [ReviewController::class, 'deleted'])->middleware('UserAccess:user');

    /*StaffReport*/
    Route::get('/userlistReport',[ReportController::class, 'userlistReport'])->name('userlist.report')->middleware('UserAccess:staff');
    Route::get('/parcellistReport',[ReportController::class, 'ParcelListReport'])->name('parcellist.report')->middleware('UserAccess:staff');
    Route::get('/parcelCollectedlistReport',[ReportController::class, 'ParcelCollectedListReport'])->name('parcelCollectedlist.report')->middleware('UserAccess:staff');
    Route::get('/feedbacklistReport',[ReportController::class, 'FeedbackListReport'])->name('Feedbacklist.report')->middleware('UserAccess:staff');
    Route::get('/reviewReport',[ReportController::class, 'ReviewListReport'])->name('Reviewlist.report')->middleware('UserAccess:staff');
    /*UserReport*/
    Route::get('/UserparcellistReport',[ReportController::class, 'UserParcelListReport'])->name('Userparcellist.report')->middleware('UserAccess:user');
    Route::get('/UserparcelCollectedlistReport',[ReportController::class, 'UserParcelCollectedListReport'])->name('UserparcelCollectedlist.report')->middleware('UserAccess:user');
    Route::get('/UserfeedbacklistReport',[ReportController::class, 'UserFeedbackListReport'])->name('UserFeedbacklist.report')->middleware('UserAccess:user');
    Route::get('/UserreviewReport',[ReportController::class, 'UserReviewListReport'])->name('UserReviewlist.report')->middleware('UserAccess:user');
    /*PDF*/
    Route::get('/userlistReportpdf',[PdfController::class, 'generatePDF'])->name('userlist.pdf');
    Route::post('/parcellistReportpdf',[PdfController::class, 'generateParcelPDF'])->name('parcellist.pdf');
    Route::post('/parcelcollectedlistReportpdf',[PdfController::class, 'generateParcelCollectedPDF'])->name('parcelCollectedllist.pdf');
    Route::post('/feedbacklistReportpdf',[PdfController::class, 'generateFeedbackPDF'])->name('feedbackllist.pdf');
    Route::post('/ReviewlistReportpdf',[PdfController::class, 'generateReviewPDF'])->name('reviewllist.pdf');




});
