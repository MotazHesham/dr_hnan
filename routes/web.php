<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

// Comments
Route::post('comments/media', 'CommentsController@storeMedia')->name('comments.storeMedia');
Route::post('comments/ckmedia', 'CommentsController@storeCKEditorImages')->name('comments.storeCKEditorImages');
Route::post('comments/store','CommentsController@store')->name('comments.store');


Route::post('form-sections/form', 'Admin\FormSectionController@form')->name('form-sections.form');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth','staff']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Consultants
    Route::delete('consultants/destroy', 'ConsultantsController@massDestroy')->name('consultants.massDestroy');
    Route::post('consultants/update_statuses', 'ConsultantsController@update_statuses')->name('consultants.update_statuses');
    Route::post('consultants/media', 'ConsultantsController@storeMedia')->name('consultants.storeMedia');
    Route::post('consultants/ckmedia', 'ConsultantsController@storeCKEditorImages')->name('consultants.storeCKEditorImages');
    Route::resource('consultants', 'ConsultantsController');

    // Partners
    Route::delete('partners/destroy', 'PartnersController@massDestroy')->name('partners.massDestroy'); 
    Route::post('partners/media', 'PartnersController@storeMedia')->name('partners.storeMedia');
    Route::post('partners/ckmedia', 'PartnersController@storeCKEditorImages')->name('partners.storeCKEditorImages');
    Route::resource('partners', 'PartnersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Courses
    Route::delete('courses/destroy', 'CoursesController@massDestroy')->name('courses.massDestroy');
    Route::post('courses/media', 'CoursesController@storeMedia')->name('courses.storeMedia');
    Route::post('courses/ckmedia', 'CoursesController@storeCKEditorImages')->name('courses.storeCKEditorImages');
    Route::resource('courses', 'CoursesController');

    // News
    Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
    Route::post('newss/media', 'NewsController@storeMedia')->name('newss.storeMedia');
    Route::post('newss/ckmedia', 'NewsController@storeCKEditorImages')->name('newss.storeCKEditorImages');
    Route::resource('newss', 'NewsController');

    // Joining
    Route::post('joinings/update_is_sent_email', 'JoiningController@update_is_sent_email')->name('joinings.update_is_sent_email');
    Route::delete('joinings/destroy', 'JoiningController@massDestroy')->name('joinings.massDestroy');
    Route::post('joinings/media', 'JoiningController@storeMedia')->name('joinings.storeMedia');
    Route::post('joinings/ckmedia', 'JoiningController@storeCKEditorImages')->name('joinings.storeCKEditorImages');
    Route::resource('joinings', 'JoiningController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Quotation
    Route::post('quotations/update_is_sent_email', 'QuotationController@update_is_sent_email')->name('quotations.update_is_sent_email');
    Route::delete('quotations/destroy', 'QuotationController@massDestroy')->name('quotations.massDestroy');
    Route::resource('quotations', 'QuotationController');

    // Articles
    Route::delete('articles/destroy', 'ArticlesController@massDestroy')->name('articles.massDestroy');
    Route::post('articles/media', 'ArticlesController@storeMedia')->name('articles.storeMedia');
    Route::post('articles/ckmedia', 'ArticlesController@storeCKEditorImages')->name('articles.storeCKEditorImages');
    Route::resource('articles', 'ArticlesController');

    // Book
    Route::delete('books/destroy', 'BookController@massDestroy')->name('books.massDestroy');
    Route::post('books/media', 'BookController@storeMedia')->name('books.storeMedia');
    Route::post('books/ckmedia', 'BookController@storeCKEditorImages')->name('books.storeCKEditorImages');
    Route::resource('books', 'BookController');

    // Samples
    Route::delete('samples/destroy', 'SamplesController@massDestroy')->name('samples.massDestroy');
    Route::post('samples/media', 'SamplesController@storeMedia')->name('samples.storeMedia');
    Route::post('samples/ckmedia', 'SamplesController@storeCKEditorImages')->name('samples.storeCKEditorImages');
    Route::resource('samples', 'SamplesController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Request Service
    Route::post('request-services/update_stages', 'RequestServiceController@update_stages')->name('request-services.update_stages');
    Route::get('request-services/update_status/{id}/{status}', 'RequestServiceController@update_status')->name('request-services.update_status');
    Route::delete('request-services/destroy', 'RequestServiceController@massDestroy')->name('request-services.massDestroy');
    Route::post('request-services/media', 'RequestServiceController@storeMedia')->name('request-services.storeMedia');
    Route::post('request-services/ckmedia', 'RequestServiceController@storeCKEditorImages')->name('request-services.storeCKEditorImages');
    Route::resource('request-services', 'RequestServiceController');

    // Clients
    Route::delete('clients/destroy', 'ClientsController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientsController');

    // About Us
    Route::post('about-uss/media', 'AboutUsController@storeMedia')->name('about-uss.storeMedia');
    Route::post('about-uss/ckmedia', 'AboutUsController@storeCKEditorImages')->name('about-uss.storeCKEditorImages');
    Route::resource('about-uss', 'AboutUsController', ['except' => ['create', 'store', 'show', 'destroy']]);

    // Form Section
    Route::delete('form-sections/destroy', 'FormSectionController@massDestroy')->name('form-sections.massDestroy');
    Route::post('form-sections/editAjax', 'FormSectionController@editAjax')->name('form-sections.editAjax');
    Route::resource('form-sections', 'FormSectionController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
