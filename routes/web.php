<?php

use App\Http\Controllers\AgeCriteriaController;
use App\Http\Controllers\Api\InquiryFormController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocContactController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ExamScheduleController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HolidayListController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicDisclosureController;
use App\Http\Controllers\SchoolActivitiesController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;


// Route::get('/home', function () {
//     return view('website.index');
// });

Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [WebController::class, 'contactUs'])->name('contact-us');
Route::get('/gallery', [WebController::class, 'gallery'])->name('gallery');
Route::get('/inquiryform', [WebController::class, 'inquiryform'])->name('inquiryform');
Route::get('/mission-vision', [WebController::class, 'missionVision'])->name('mission-vision');
Route::get('/principal-desk', [WebController::class, 'principalDesk'])->name('principal-desk');
Route::get('prospectus', [WebController::class, 'prospectus'])->name('prospectus');
Route::get('public-disclosure', [WebController::class, 'publicDisclosure'])->name('public-disclosure');
Route::get('syllabus', [WebController::class, 'syllabus'])->name('syllabus');
Route::get('timetable', [WebController::class, 'timetable'])->name('timetable');
Route::get('transfer-certificates', [WebController::class, 'transferCertificates'])->name('transfer-certificates');
Route::get('ExamSchedule', [WebController::class, 'ExamSchedule'])->name('ExamSchedule');
Route::get('holidayList', [WebController::class, 'holidayList'])->name('holidayList');
Route::get('ageCriteria', [WebController::class, 'ageCriteria'])->name('ageCriteria');
Route::get('documents', [WebController::class, 'documents'])->name('documents');
Route::get('feesStructure', [WebController::class, 'feesStructure'])->name('feesStructure');
Route::get('events', [WebController::class, 'events'])->name('events');
Route::get('awards', [WebController::class, 'awards'])->name('awards');
Route::get('management', [WebController::class, 'management'])->name('management');
Route::get('/staff', [WebController::class, 'staff'])->name('staff');
Route::get('/school-timing', [WebController::class, 'school-timing'])->name('school-timing');





Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    });
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

});



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::get('/slider-list', [HomeSliderController::class, 'index'])->name('slider-list');
    Route::get('/slider-form/{id?}', [HomeSliderController::class, 'addEdit'])->name('slider-add-edit');
    Route::post('/slider-store', [HomeSliderController::class, 'homeSliderStore'])->name('slider-store');
    Route::get('/slider-delete/{id}', [HomeSliderController::class, 'delete'])->name('slider-delete');


    Route::get('/news-list', [NewsController::class, 'newsList'])->name('news-list');
    Route::get('/news/{id}', [NewsController::class, 'newsAddEdit'])->name('news-add-edit');
    Route::post('/news-store', [NewsController::class, 'newsStore'])->name('news-store');
    Route::get('/news-delete/{id}', [NewsController::class, 'newsDelete'])->name('news-delete');

    Route::get('/public-disclosure-title-list', [PublicDisclosureController::class, 'publicDisclosureTitleList'])->name('public-disclosure-title-list');
    Route::get('/public-disclosure-title/{id}', [PublicDisclosureController::class, 'publicDisclosureTitleAddEdit'])->name('public-disclosure-title-add-edit');
    Route::post('/public-disclosure-title-store', [PublicDisclosureController::class, 'publicDisclosureTitleStore'])->name('public-disclosure-title-store');
    Route::get('/public-disclosure-title-delete/{id}', [PublicDisclosureController::class, 'publicDisclosureTitleDelete'])->name('public-disclosure-title-delete');


    Route::get('/public-disclosure-list', [PublicDisclosureController::class, 'publicDisclosureList'])->name('public-disclosure-list');
    Route::get('/public-disclosure/{slug}', [PublicDisclosureController::class, 'publicDisclosureAddEdit'])->name('public-disclosure-add-edit');
    Route::post('/public-disclosure-store', [PublicDisclosureController::class, 'publicDisclosureStore'])->name('public-disclosure-store');
    Route::get('/public-disclosure-delete/{id}', [PublicDisclosureController::class, 'publicDisclosureDelete'])->name('public-disclosure-delete');

    Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
    Route::post('/contact_store', [ContactController::class, 'contactStore'])->name('contact-store');


    Route::get('/inquiry-form-list', [InquiryFormController::class, 'list'])->name('inquiry-form-list');
    Route::get('/inquiry-form-view/{id}', [InquiryFormController::class, 'view'])->name('inquiry-form-view');
    Route::get('/inquiry-form-delete/{id}', [InquiryFormController::class, 'delete'])->name('inquiry-form-delete');


    Route::get('/gallery-list', [GalleryController::class, 'galleryList'])->name('gallery-list');
    Route::get('/gallery/{id}', [GalleryController::class, 'galleryAddEdit'])->name('gallery-add-edit');
    Route::post('/gallery-store', [GalleryController::class, 'galleryStore'])->name('gallery-store');
    Route::get('/gallery-delete/{id}', [GalleryController::class, 'galleryDelete'])->name('gallery-delete');

    Route::get('syllabus-list', [SyllabusController::class, 'syllabusList'])->name('syllabus-list');
    Route::get('syllabus-add-edit/{slug}', [SyllabusController::class, 'syllabusAddEdit'])->name('syllabus-add-edit');
    Route::post('syllabus-store', [SyllabusController::class, 'syllabusStore'])->name('syllabus-store');
    Route::get('syllabus-delete/{id}', [SyllabusController::class, 'syllabusDelete'])->name('syllabus-delete');

    Route::get('ExamSchedule-list', [ExamScheduleController::class, 'ExamScheduleList'])->name('ExamSchedule-list');
    Route::get('ExamSchedule-add-edit/{slug}', [ExamScheduleController::class, 'ExamScheduleAddEdit'])->name('ExamSchedule-add-edit');
    Route::post('ExamSchedule-store', [ExamScheduleController::class, 'ExamScheduleStore'])->name('ExamSchedule-store');
    Route::get('ExamSchedule-delete/{id}', [ExamScheduleController::class, 'ExamScheduleDelete'])->name('ExamSchedule-delete');

    Route::get('/holiday-list', [HolidayListController::class, 'HolidayList'])->name('holiday-list');
    Route::get('/holiday-add-edit/{slug}', [HolidayListController::class, 'HolidayAddEdit'])->name('holiday-add-edit');
    Route::post('/holiday-store', [HolidayListController::class, 'HolidayStore'])->name('holiday-store');
    Route::get('/holiday-delete/{id}', [HolidayListController::class, 'HolidayDelete'])->name('holiday-delete');

    Route::get('/ageCriteria-list', [AgeCriteriaController::class, 'AgeCriteriaList'])->name('ageCriteria-list');
    Route::get('/ageCriteria-add-edit/{slug}', [AgeCriteriaController::class, 'AgeCriteriaAddEdit'])->name('ageCriteria-add-edit');
    Route::post('/ageCriteria-store', [AgeCriteriaController::class, 'AgeCriteriaStore'])->name('ageCriteria-store');
    Route::get('/ageCriteria-delete/{id}', [AgeCriteriaController::class, 'AgeCriteriaDelete'])->name('ageCriteria-delete');

    Route::get('/category-list', [CategoryController::class, 'CategoryList'])->name('category-list');
    Route::get('/category-add-edit/{slug}', [CategoryController::class, 'CategoryAddEdit'])->name('category-add-edit');
    Route::post('/category-store', [CategoryController::class, 'CategoryStore'])->name('category-store');
    Route::get('/category-delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category-delete');

    Route::get('/document-list', [DocumentsController::class, 'DocumentList'])->name('document-list');
    Route::get('/document-add-edit/{slug}', [DocumentsController::class, 'DocumentAddEdit'])->name('document-add-edit');
    Route::post('/document-store', [DocumentsController::class, 'DocumentStore'])->name('document-store');
    Route::get('/document-delete/{id}', [DocumentsController::class, 'DocumentDelete'])->name('document-delete');

    Route::get('/doc-contact', [DocContactController::class, 'docContact'])->name('doc-contact');
    Route::post('/doc-contact-store', [DocContactController::class, 'docContactStore'])->name('doc-contact-store');
    Route::get('/doc-contact-store', function () {
        return redirect()->route('doc-contact');
    });

    Route::get('/event-list', [EventsController::class, 'EventList'])->name('event-list');
    Route::get('/event-add-edit/{slug}', [EventsController::class, 'EventAddEdit'])->name('event-add-edit');
    Route::post('/event-store', [EventsController::class, 'EventStore'])->name('event-store');
    Route::get('/event-delete/{id}', [EventsController::class, 'EventDelete'])->name('event-delete');


    Route::get('/award-list', [AwardsController::class, 'awardList'])->name('award-list');
    Route::get('/award-add-edit/{slug}', [AwardsController::class, 'awardAddEdit'])->name('award-add-edit');
    Route::post('/award-store', [AwardsController::class, 'awardStore'])->name('award-store');
    Route::get('/award-delete/{id}', [AwardsController::class, 'awardDelete'])->name('award-delete');

    Route::get('/management-list', [ManagementController::class, 'managementList'])->name('management-list');
    Route::get('/management-add-edit/{slug}', [ManagementController::class, 'managementAddEdit'])->name('management-add-edit');
    Route::post('/management-store', [ManagementController::class, 'managementStore'])->name('management-store');
    Route::get('/management-delete/{id}', [ManagementController::class, 'managementDelete'])->name('management-delete');


    Route::get('/school-activity-list', [SchoolActivitiesController::class, 'SchoolActivityList'])->name('school-activity-list');
    Route::get('/school-activity/{slug}', [SchoolActivitiesController::class, 'SchoolActivityAddEdit']);
    Route::post('/school-activity-store', [SchoolActivitiesController::class, 'SchoolActivityStore'])->name('school-activity-store');
    Route::get('/school-activity-delete/{id}', [SchoolActivitiesController::class, 'SchoolActivityDelete']);

    Route::get('/staff-list', [StaffController::class, 'staffList'])->name('staff-list');
    Route::get('/staff/{id}', [StaffController::class, 'staffAddEdit'])->name('staff-add-edit');
    Route::post('/staff-store', [StaffController::class, 'staffStore'])->name('staff-store');
    Route::get('/staff-delete/{id}', [StaffController::class, 'staffDelete'])->name('staff-delete');


    Route::get('/school-time-list', [FeesController::class, 'index'])->name('school-time-list');
    Route::post('/school-time-store', [FeesController::class, 'schoolTimeStore'])->name('school-time-store');
});
