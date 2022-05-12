<?php

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


// Route::get('/filter-word', function () {
//     $filterwords = \App\Model\FilterWord::select('word')->get();

//     $array_word = array();
//     foreach ($filterwords  as $key => $value) {
//     	//echo $value['word'];
//     	array_push($array_word, $value['word']);
//     }

//     $words = array('SEO', 'Search', 'Engine', 'Optimization'); 

//     dd($array_word, $words);
// });

 




Route::get('/', 'SiteController@index')->name('index');

Route::get('/404', function () {
    return abort(404);
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('/test', 'SiteController@liveSiteTest');

Route::get('/greetingmsg/{uid}', 'MsgController@greeting');

Route::get('/sendsms', 'SiteController@sendsms');


Route::get('/bad/{uid}', 'SiteController@livesitebad')->name('site.bad');  // test

// live site
Route::get('/site/{uid}', 'SiteController@livesite')->name('site');

Route::get('/new-site/{uid}', 'SiteController@newlivesite')->name('site');

//Route::get('/site2/{uid}', 'SiteController@livesiteNew')->name('site2');
Route::post('/live-site-login', 'SiteController@livesitelogin')->name('live.site.login');

// live schedule
Route::get('/online_schedule/{uid}', 'ScheduleController@shedulenow')->name('schedule');
//Route::get('/online_schedule2/{uid}', 'ScheduleController@shedulenow2')->name('schedule2');

Route::get('/online_schedule_test', 'ScheduleTest@shedule_test')->name('schedule.test');


//live payment 
Route::get('/payment/{uid}', 'PaymentController@payment')->name('payment');

//live send file 
Route::get('/send_file/{uid}', 'SendFileController@send_file')->name('send_file');

//live greeting 
Route::get('/greeting/{uid}', 'GreetingController@greeting')->name('greeting');
// add-greeting-form-data
Route::post('/add-greeting-form-data', 'GreetingController@addGreetingData');

//live google_map 
Route::get('/google_map/{uid}', 'GoogleMapController@google_map')->name('google_map');

//live test_message 
Route::get('/test_message/{uid}', 'MessageController@test_message')->name('test_message');

//live test_message 
Route::get('/rules_regulation/{uid}', 'RulesRegulationController@rules_regulation')->name('rules_regulation');

Route::get('/quote/{uid}', 'GetAQuoteController@getaQuote');
Route::post('/quote', 'GetAQuoteController@addQuoteData');

Route::get('/customform/{uid}', 'CustomFormController@customFormWithUid');
Route::post('/add-custom-form-data', 'CustomFormController@customForm');

//live test_message 
Route::get('/client_get_code/{uid}', 'ClientGetCodeController@client_get_code')->name('client_get_code');
Route::post('/send-live-site-url-for-client-login', 'ClientGetCodeController@sendLiveUrl')->name('send.live.url');
//Route::get('/live-site-token-varify/{live_site_token}', 'ClientGetCodeController@liveSiteToken')->name('live.site.token');

//all business show
Route::get('/business_info', 'BusinessController@business_info')->name('business_info');




// add-share-document-form-data
Route::post('/add-share-document-form-data', 'SendFileController@addShareDocumentFile');




Route::post('/upload-business-image', 'BusinessController@uploadbusinessimage');

Route::get('/view-your-widget/{uid}', 'ViewYourWidgetController@viewYourWidget');

Route::get('/widget-in-your-website/{uid}', 'ViewYourWidgetController@widget_in_your_website');

Route::get('/mysite', 'ViewYourWidgetController@mysite')->name('mysite');

// email send
Route::get('/sendemail', 'EmailSendController@emailSend');



//Route::get('/message-show', 'MessageController@messageShow')->name('message.show');
//Route::post('/message-send', 'MessageController@messageSend')->name('message.send');

Route::get('/message-show', 'MessageController@messageShow');
Route::post('/message-send', 'MessageController@messageSend');

//Route::post('/sendformdata', 'UniqueController@sendformData');




/*new widget route start*/

// new booking...
Route::get('/online_newschedule/{uid}', 'ScheduleController@newshedulenow')->name('newschedule');
Route::get('/online_newschedule_box/{uid}', 'ScheduleController@online_newschedule_box')->name('newschedule_box');
Route::get('/booking/{nickname}', 'ScheduleController@booking')->name('admin.booking');

// add-booking-form-data
Route::post('/add-booking-form-data', 'Booking\BookingController@booking')->name('booking');

Route::get('/schedule-confirm-by-client/{inbox_uid}', 'App\ScheduleController@rescheduleConfirmByClient')->name('reschedule.confrim');

//new send file 
Route::get('/new_send_file/{uid}', 'SendFileController@new_send_file')->name('new_send_file');
Route::post('/add-new-share-document-form-data', 'SendFileController@addNewShareDoc')->name('add.new.share.doc');

//new greeting 
Route::get('/new-greeting/{uid}', 'GreetingController@new_greeting')->name('new_greeting');
Route::post('/add-new-greeting-form-data', 'GreetingController@addNewGreetingData');

//new quote
Route::get('/new-quote/{uid}', 'GetAQuoteController@new_getaQuote')->name('new_get_quote');
Route::post('/new-quote', 'GetAQuoteController@newAddQuoteData');

// google_map 
Route::get('/new-google-map/{uid}', 'GoogleMapController@new_google_map')->name('new_google_map');

Route::get('/client_get_newcode/{uid}', 'ClientGetCodeController@client_get_newcode')->name('client_get_newcode');

// google_map 
Route::get('/chatnow/{uid}', 'ChatNowController@new_chat_now')->name('new_chat');

Route::get('/reschedule/{buid}/{inboxuid}', 'ScheduleController@newReschedule')->name('new.reschedule');
Route::post('/reschedule', 'ScheduleController@saveReschedule')->name('save.reschedule');

/*new widget route end*/

//open tok route
Route::get('/chat-opentok-call', 'OpentokController@chatOpentokView');
Route::post('/cancel-call-status', 'OpentokController@cancelCallStatus');
Route::post('/call-status-accepted', 'OpentokController@callStatsAccepted')->name('call.accepted');
Route::post('/call-status-called', 'OpentokController@callStatsCalled')->name('call.called');

Route::post('/call-ringing-status', 'OpentokController@callRingingStatus')->name('call.status.ringing');



//new template
Route::get('/template-schedule/{uid}', 'ScheduleController@templateOne')->name('templateOne');




Route::get('/test-page', 'SiteController@testPage');



//custom form for strata
Route::get('/global-form/{uid}/{form_uid}', 'CustomFormController@strataCustomFormWithUid');
Route::post('/add-strata-form-data', 'CustomFormController@strataCustomForm');

//staff info route
Route::get('/booking/{nickname}/staff/{staff_uid}', 'StaffController@staffInfo');


Route::get('/event-test', function (Request $request) {
    //return response()->json($request->all());
    
    return "Event has been sent!";
});