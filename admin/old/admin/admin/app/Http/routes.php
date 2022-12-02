<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

use App\Ad;
use App\Archive;
use App\Blog;
use App\Feedback;
use App\League;
use App\Notification;
use App\Prediction;
use App\Shot;
use App\Slider;
use App\Sms_subscription;
use App\Subscription;
use App\Textslider;
use App\User;

Route::group(['middleware' => ['web']], function () {

    $path = "https://www.planetpredict.com/admin/images/";
    $path1 = "https://www.Planetpredict.com/images/users/";
    $path2 = "https://www.Planetpredict.com/admin/images/";
    $localPath = "";
    // $path = "http://pachristo.com/victorpredict/administrator/images/";
    //$path1 = "http://pachristo.com/victorpredict/images/users/";
    //$path2 = "http://pachristo.com/victorpredict/administrator/images/";

    $league = League::all();

    $contactmail = '';
    $advertmail = '';
    $callno = '';
    $whatsappno = '';
    $telegramlink = '';
    $skypelink = '';
    $facebooklink = "";
    $twitterlink = "";

    View::share(['path' => $path, 'localPath' => $localPath, 'contactmail' => $contactmail,
        'advertmail' => $advertmail, 'callno' => $callno, 'whatsappno' => $whatsappno, 'telegramlink' => $telegramlink,
        'skypelink' => $skypelink, 'facebooklink' => $facebooklink, 'twitterlink' => $twitterlink]);

// partners

    Route::get('/partners', [
        'uses' => 'GeneralController@getPartners',
        'as' => 'partnersget',
        'middleware' => 'auth',
    ]);

    Route::get('/partners_del/{id?}', [
        'uses' => 'GeneralController@deletePartners',
        'as' => 'partnersdel',
        'middleware' => 'auth',
    ]);
    Route::post('/partners', [
        'uses' => 'GeneralController@postPartners',
        'as' => 'partnersget',
        'middleware' => 'auth',
    ]);

    Route::get('/', function () {
        return view('welcome');
    })->name('/');

    Route::get('/trashleague/{id}', function ($id) {
        League::where('id', $id)->delete();
    });

    Route::get('/counter/{key?}', [
        'uses' => 'GeneralController@getCounter',
        'as' => '/counter',
        'middleware' => 'auth',
    ]);

    Route::get('/home', [
        'uses' => 'GeneralController@adminHome',
        'as' => 'home',
        'middleware' => 'auth',
    ]);

    Route::get('/admins', [
        'uses' => 'GeneralController@allAdmin',
        'as' => 'admins',
        'middleware' => 'auth',
    ]);

    Route::get('/adminlogin', [
        'uses' => 'GeneralController@adminHome',
        'as' => 'home',

        'middleware' => 'auth',
    ]);

    Route::get('/dpupload', [
        'uses' => 'GeneralController@adminHome',
        'as' => 'home',
        'middleware' => 'auth',
    ]);

    Route::get('/unSubscribe/{id?}', [
        'uses' => 'UserController@getDeactivate',
        'as' => '/unSubscribe',
        'middleware' => 'auth',
    ]);

    Route::get('/smsunSubscribe/{id?}', [
        'uses' => 'SMScontroller@getDeactivate',
        'as' => '/smsunSubscribe',
        'middleware' => 'auth',
    ]);

    Route::get('/bulkmail', [
        'uses' => 'UserController@bulkMail',
        'as' => 'bulkmail',
        'middleware' => 'auth',
    ]);

    Route::get('/bulkActive', [
        'uses' => 'UserController@bulkActive',
        'as' => '/bulkActive',
        'middleware' => 'auth',
    ]);

    Route::get('/bulkExpired', [
        'uses' => 'UserController@bulkExpired',
        'as' => '/bulkExpired',
        'middleware' => 'auth',
    ]);

    Route::get('/individualMail', [
        'uses' => 'UserController@individualMail',
        'as' => '/individualMail',
        'middleware' => 'auth',
    ]);

    Route::get('/AllSms', [
        'uses' => 'SMScontroller@allsms',
        'as' => '/AllSms',
        'middleware' => 'auth',

    ]);

    Route::get('/SmsMembers', [
        'uses' => 'SMScontroller@getSmsMembers',
        'as' => '/SmsMembers',
        'middleware' => 'auth',

    ]);

    Route::get('/ActiveSmsMembers', [
        'uses' => 'SMScontroller@getActiveSmsMembers',
        'as' => '/ActiveSmsMembers',
        'middleware' => 'auth',

    ]);

    Route::get('/ExpiredSmsMembers', [
        'uses' => 'SMScontroller@getExpiredSmsMembers',
        'as' => '/ExpiredSmsMembers',
        'middleware' => 'auth',

    ]);

    Route::post('/submitSms', [
        'uses' => 'SMScontroller@sendSms',
        'as' => '/submitSms',
        'middleware' => 'auth',

    ]);
    Route::post('/sortSmsMembers', [
        'uses' => 'SMScontroller@smsmembers',
        'as' => '/sortSmsMembers',
        'middleware' => 'auth',

    ]);
    Route::get('/coverupload', function () {
        return view('/blogs');
    });

    Route::get('/logout', [
        'uses' => 'AccountController@adminLogout',
        'as' => 'logout',
    ]);

    Route::post('/adminLogin', [
        'uses' => 'AccountController@adminSignIn',
        'as' => '/adminLogin',
    ]);

    Route::get('/loginOperationOk/{id?}', [
        'uses' => 'AccountController@loginOperationOk',
        'as' => '/loginOperationOk',
    ]);

    Route::get('/dashboard', [
        'uses' => 'GeneralController@getHome',
        'as' => '/dashboard',
        'middleware' => 'auth',
    ]);

    Route::post('/loadleague', [
        'uses' => 'GeneralController@newLeague',
        'as' => 'loadleague',
    ]);

    Route::post('/loadPrediction', [
        'uses' => 'PredictionController@postNewPrediction',
        'as' => '/loadPrediction',
    ]);

    Route::get('/newBookingCode', [
        'uses' => 'PredictionController@getNewBookingCode',
        'as' => '/newBookingCode',
        'middleware' => 'auth',
    ]);

    Route::get('/bookingCodes', [
        'uses' => 'PredictionController@getBookingCode',
        'as' => '/bookingCodes',
        'middleware' => 'auth',
    ]);

    Route::get('/trashBookingCode/{id?}', [
        'uses' => 'PredictionController@getTrashBookingCode',
        'as' => '/trashBookingCode',
        'middleware' => 'auth',
    ]);

    Route::post('/newBookingCode', [
        'uses' => 'PredictionController@postNewBookingCode',
        'as' => '/newBookingCode',
        'middleware' => 'auth',
    ]);

    Route::get('/newPrediction', [
        'uses' => 'PredictionController@getNewPrediction',
        'as' => '/newPrediction',
        'middleware' => 'auth',
    ]);

    Route::get('/newVIPPrediction', [
        'uses' => 'PredictionController@getNewVIPPrediction',
        'as' => '/newVIPPrediction',
        'middleware' => 'auth',
    ]);

    Route::get('/nblog', [
        'uses' => 'BlogController@newBlog',
        'as' => 'nblog',
        'middleware' => 'auth',
    ]);

    Route::get('/newads', [
        'uses' => 'GeneralController@newAds',
        'as' => 'newads',
        'middleware' => 'auth',
    ]);

    Route::get('/deleteSponsor/{id?}', [
        'uses' => 'GeneralController@getDeleteSponsor',
        'as' => '/deleteSponsor',
        'middleware' => 'auth',
    ]);

    Route::get('/editSponsor/{id?}', [
        'uses' => 'GeneralController@getEditSponsor',
        'as' => '/editSponsor',
        'middleware' => 'auth',
    ]);

    Route::post('/postEditSponsor/{id?}', [
        'uses' => 'GeneralController@postEditSponsor',
        'as' => '/postEditSponsor',
        'middleware' => 'auth',
    ]);

    Route::get('/sponsored_ads', [
        'uses' => 'GeneralController@getSponsoredAds',
        'as' => '/sponsored_ads',
        'middleware' => 'auth',
    ]);

    Route::post('/addSponsor', [
        'uses' => 'GeneralController@postSponsoredAds',
        'as' => '/addSponsor',
        'middleware' => 'auth',
    ]);

    Route::get('/newAdwords', [
        'uses' => 'GeneralController@newAdwords',
        'as' => '/newAdwords',
        'middleware' => 'auth',
    ]);

    Route::get('/loadleague', [
        'uses' => 'GeneralController@loadLeague',
        'as' => 'loadleague',
        'middleware' => 'auth',
    ]);

    Route::get('/manageleague', [
        'uses' => 'GeneralController@manageLeague',
        'as' => 'manageleague',
        'middleware' => 'auth',
    ]);

    Route::get('/manageads', [
        'uses' => 'GeneralController@manageAds',
        'as' => 'manageads',
        'middleware' => 'auth',
    ]);

    Route::get('/predictions', [
        'uses' => 'PredictionController@getPredictions',
        'as' => '/predictions',
        'middleware' => 'auth',
    ]);

    Route::get('/tennis', [
        'uses' => 'PredictionController@getTennis',
        'as' => '/tennis',
        'middleware' => 'auth',
    ]);

    Route::get('/basketball', [
        'uses' => 'PredictionController@getBasketball',
        'as' => '/basketball',
        'middleware' => 'auth',
    ]);

    Route::get('/handball', [
        'uses' => 'PredictionController@getHandball',
        'as' => '/handball',
        'middleware' => 'auth',
    ]);

    Route::get('/ice_hockey', [
        'uses' => 'PredictionController@getIceHockey',
        'as' => '/ice_hockey',
        'middleware' => 'auth',
    ]);

    Route::get('/VIPpredictions', [
        'uses' => 'PredictionController@getVIPPredictions',
        'as' => '/VIPpredictions',
        'middleware' => 'auth',
    ]);
    //
    Route::get('/archive', [
        'uses' => 'PredictionController@archives',
        'as' => '/archive',
        'middleware' => 'auth',
    ]);

    Route::get('/testimonials', [
        'uses' => 'PredictionController@allTestimonials',
        'as' => '/testimonials',
        'middleware' => 'auth',
    ]);

    Route::get('/blogs', [
        'uses' => 'BlogController@allBlogs',
        'as' => 'blogs',
        'middleware' => 'auth',
    ]);

    Route::get('/flagged', [
        'uses' => 'GeneralController@flaggedEvents',
        'as' => 'flagged',
        'middleware' => 'auth',
    ]);

    Route::get('/disabled', [
        'uses' => 'GeneralController@disabledEvents',
        'as' => 'disabled',
        'middleware' => 'auth',
    ]);

    Route::get('/newMember', [
        'uses' => 'UserController@getNewMember',
        'as' => '/newMember',
        'middleware' => 'auth',
    ]);

    Route::post('/newMember', [
        'uses' => 'UserController@postNewMember',
        'as' => '/newMember',
        'middleware' => 'auth',
    ]);

    Route::get('/allmembers', [
        'uses' => 'UserController@allUsers',
        'as' => 'allmembers',
        'middleware' => 'auth',
    ]);

    Route::post('/searchMember', [
        'uses' => 'UserController@postSearchMember',
        'as' => '/searchMember',
        'middleware' => 'auth',
    ]);

    Route::post('/searchSmsMember', [
        'uses' => 'SMScontroller@postSearchMember',
        'as' => '/searchSmsMember',
        'middleware' => 'auth',
    ]);

    Route::get('/searchSmsMember', [
        'uses' => 'SMScontroller@getSearchMember',
        'as' => '/searchSmsMember',
        'middleware' => 'auth',
    ]);

    Route::get('/searchMember', [
        'uses' => 'UserController@getSearchMember',
        'as' => '/searchMember',
        'middleware' => 'auth',
    ]);

    Route::get('/subscribed', [
        'uses' => 'UserController@subscribedUsers',
        'as' => '/subscribed',
        'middleware' => 'auth',
    ]);

    Route::get('/expired', [
        'uses' => 'UserController@expiredUsers',
        'as' => '/expired',
        'middleware' => 'auth',
    ]);

    Route::get('/dmembers', [
        'uses' => 'UserController@disabledUsers',
        'as' => 'dmembers',
        'middleware' => 'auth',
    ]);

    Route::get('/fmembers', [
        'uses' => 'UserController@flaggedUsers',
        'as' => 'fmembers',
        'middleware' => 'auth',
    ]);

    Route::get('/slidenote', [
        'uses' => 'GeneralController@upcomingLeague',
        'as' => 'slidenote',
        'middleware' => 'auth',
    ]);

    Route::get('/notemanage', [
        'uses' => 'GeneralController@manageNotification',
        'as' => 'notemanage',
        'middleware' => 'auth',
    ]);

    Route::get('/perthreeacct', [
        'uses' => 'GeneralController@perThreeAccounts',
        'as' => 'perthreeacct',
        'middleware' => 'auth',
    ]);

    Route::get('/annual', [
        'uses' => 'GeneralController@annualAccounts',
        'as' => 'annual',
        'middleware' => 'auth',
    ]);

    Route::get('/dormant', [
        'uses' => 'GeneralController@dormantAccounts',
        'as' => 'dormant',
        'middleware' => 'auth',
    ]);

    Route::get('/systemRefresh', [
        'uses' => 'UserController@systemRefresh',
        'as' => 'systemRefresh',
        'middleware' => 'auth',
    ]);

    Route::get('/planManager', [
        'uses' => 'GeneralController@planManager',
        'as' => '/planManager',
        'middleware' => 'auth',
    ]);

    Route::get('/SmsplanManager', [
        'uses' => 'SMScontroller@planManager',
        'as' => '/SmsplanManager',
        'middleware' => 'auth',
    ]);

    Route::get('/feedbackLoader', [
        'uses' => 'GeneralController@feedbackLoader',
        'as' => '/feedbackLoader',
        'middleware' => 'auth',
    ]);

    Route::get('/sliderManager', [
        'uses' => 'GeneralController@sliderManager',
        'as' => '/sliderManager',
        'middleware' => 'auth',
    ]);

    Route::get('/shotManager', [
        'uses' => 'GeneralController@shotManager',
        'as' => '/shotManager',
        'middleware' => 'auth',
    ]);

    Route::get('/deleteImage/{id?}', [
        'uses' => 'GeneralController@getDeleteImage',
        'as' => '/deleteImage',
        'middleware' => 'auth',
    ]);

    Route::get('/getGallery', [
        'uses' => 'GeneralController@getGallery',
        'as' => '/getGallery',
        'middleware' => 'auth',
    ]);

    Route::post('/uploadGallery', [
        'uses' => 'GeneralController@postUploadGallery',
        'as' => '/uploadGallery',
        'middleware' => 'auth',
    ]);

    Route::post('/dpupload', [
        'uses' => 'GeneralController@dpUpload',
        'as' => 'dpupload',
        'middleware' => 'auth',
    ]);

    Route::post('/blogs', [
        'uses' => 'BlogController@dpImageUpload',
        'as' => 'coverupload',
        'middleware' => 'auth',
    ]);

    Route::post('/newBlog', [
        'uses' => 'BlogController@newBlogPost',
        'as' => '/newBlog',
        'middleware' => 'auth',
    ]);

    Route::post('/newAds', [
        'uses' => 'GeneralController@newAdsPost',
        'as' => '/newAds',
        'middleware' => 'auth',
    ]);

    Route::post('/newAdwords', [
        'uses' => 'GeneralController@postAdwords',
        'as' => '/newAdwords',
        'middleware' => 'auth',
    ]);

    Route::post('/sliderManager', [
        'uses' => 'GeneralController@newSlider',
        'as' => 'sliderManager',
        'middleware' => 'auth',
    ]);

    Route::post('/shotManager', [
        'uses' => 'GeneralController@newShot',
        'as' => 'shotManager',
        'middleware' => 'auth',
    ]);

    Route::post('/slidenote', [
        'uses' => 'GeneralController@newSlideNote',
        'as' => 'slidenote',
        'middleware' => 'auth',
    ]);

    //AJAX ROUTES
    Route::get('/admincontrol/{admincode?}', [
        'uses' => 'GeneralController@ajaxAdminControl',
        'as' => 'admincontrol',
        'middleware' => 'auth',
    ]);

    Route::get('/gamedetails/{gamecode?}/{datain?}', [
        'uses' => 'PredictionController@ajaxGameDetail',
        'as' => '/gamedetails',
        'middleware' => 'auth',
    ]);

    Route::get('/blogdetails/{blogcode}', [
        'uses' => 'BlogController@ajaxBlogDetail',
        'as' => 'blogdetails',
        'middleware' => 'auth',
    ]);

    Route::get('/updateprediction/{gid?}/{datain?}', [
        'uses' => 'PredictionController@ajaxGameUpdate',
        'as' => '/updateprediction',
        'middleware' => 'auth',
    ]);

    Route::get('/updateVIPprediction/{gid?}/{datain?}', [
        'uses' => 'PredictionController@ajaxVIPGameUpdate',
        'as' => '/updateVIPprediction',
        'middleware' => 'auth',
    ]);

    Route::get('/updateuserinfo/{uid}', [
        'uses' => 'UserController@ajaxUserUpdate',
        'as' => 'updateuserinfo',
        'middleware' => 'auth',
    ]);

    Route::get('/updatephonenumber/{uid}', [
        'uses' => 'SMScontroller@ajaxUserUpdate',
        'as' => 'updatephonenumber',
        'middleware' => 'auth',
    ]);

    Route::get('/userdetails/{uid}', [
        'uses' => 'UserController@ajaxUserInfo',
        'as' => 'userdetails',
        'middleware' => 'auth',
    ]);

    Route::get('/smsuserdetails/{uid}', [
        'uses' => 'SMScontroller@smsajaxUserInfo',
        'as' => '/smsuserdetails',
        'middleware' => 'auth',
    ]);

    Route::get('/upgradeuseracct/{uid}', [
        'uses' => 'UserController@upgradeAccount',
        'as' => 'upgradeuseracct',
        'middleware' => 'auth',
    ]);

    Route::get('/smsupgradeuseracct/{uid}', [
        'uses' => 'SMScontroller@upgradeAccount',
        'as' => 'smsupgradeuseracct',
        'middleware' => 'auth',
    ]);

    Route::get('/updateblog/{bid}', [
        'uses' => 'BlogController@ajaxBlogUpdate',
        'as' => 'updateblog',
        'middleware' => 'auth',
    ]);

    Route::get('/updateads/{aid}', [
        'uses' => 'GeneralController@ajaxAdsUpdate',
        'as' => 'updateads',
        'middleware' => 'auth',
    ]);

    Route::get('/addresult/{id?}', [
        'uses' => 'PredictionController@ajaxAddResult',
        'as' => '/addresult',
        'middleware' => 'auth',
    ]);

    Route::get('/ajaxusersetting/{userid}', [
        'uses' => 'GeneralController@ajaxUserSetting',
        'as' => 'usersettings',
        'middleware' => 'auth',
    ]);

    Route::get('/marktestimonial/{id}', function ($id, Prediction $prediction) {
        $game = $prediction->getPrediction($id);
        return view('ajaxfiles.marktestimonial', ['game' => $game]);
    });

    Route::get('/otherftrec/{id}', function ($id) {
        $game = Prediction::where('id', $id)->first();
        return view('ajaxfiles.otherft', ['game' => $game]);
    });

    Route::get('/planEditor/{id}', function ($id) {
        $plan = Subscription::where('id', $id)->first();
        return view('ajaxfiles.planEditor', ['plan' => $plan]);
    });
    Route::get('/smsplanEditor/{id}', function ($id) {
        $plan = Sms_subscription::where('id', $id)->first();
        return view('ajaxfiles.smsplanEditor', ['plan' => $plan]);
    });

    Route::get('/sliderLoader', function () {
        $texts = Textslider::all()->sortByDesc('id');
        return view('ajaxfiles.textRotator', ['texts' => $texts]);
    });

    Route::get('/approvedLoader', function () {
        $data1 = Feedback::where('approve', '1')->orderBy('updated_at', 'DESC')->get();
        return view('ajaxfiles.approvedFeed', ['data1' => $data1]);
    });

    Route::get('/unmarktestimonial/{id?}/{datain?}', function ($id, $datain) {
        if ($datain == 'Prediction') {
            Prediction::where('id', $id)->update(['testimonial' => '']);
        } else {
            Archive::where('id', $id)->update(['testimonial' => 0]);
        }
        return "DONE";
    });

    Route::get('/ajaxhide/{id?}/{datain?}', function ($id, $datain) {
        if ($datain == 'Prediction') {
            Prediction::where('id', $id)->update(['display' => 1]);
        } else {

            Archive::where('id', $id)->update(['display' => 1]);
        }
        return "DONE";
    })->name('/ajaxhide');

    Route::get('/ajaxunhide/{id?}/{datain?}', function ($id, $datain) {
        if ($datain == 'Prediction') {
            Prediction::where('id', $id)->update(['display' => 0]);
        } else {
            Archive::where('id', $id)->update(['display' => 0]);
        }
        return "DONE";
    })->name('/ajaxunhide');

    Route::get('/ajaxhideblog/{id}', function ($id) {
        Blog::where('id', $id)->update(['status' => 'Draft']);
        return "DONE";
    });

    Route::get('/ajaxunhideblog/{id}', function ($id) {
        Blog::where('id', $id)->update(['status' => 'Publish']);
        return "DONE";
    });

    Route::get('/ajaxhidead/{id}', function ($id) {
        Ad::where('id', $id)->update(['status' => '1']);
        return "DONE";
    });

    Route::get('/ajaxunhidead/{id}', function ($id) {
        Ad::where('id', $id)->update(['status' => '0']);
        return "DONE";
    });

    Route::get('/flaguser/{id}', function ($id) {
        User::where('id', $id)->update(['flag' => '1']);
        return "DONE";
    });

    Route::get('/unflaguser/{id}', function ($id) {
        User::where('id', $id)->update(['flag' => '0']);
        return "DONE";
    });

    Route::get('/disableuser/{id}', function ($id) {
        User::where('id', $id)->update(['status' => '1']);
        return "DONE";
    });

    Route::get('/enableuser/{id}', function ($id) {
        User::where('id', $id)->update(['status' => '0']);
        return "DONE";
    });

    Route::get('/ajaxnotedelete/{id}', function ($id) {
        $note = Notification::where('id', $id)->first();
        unlink('images/notification/' . $note->note_image);
        Notification::where('id', $id)->delete();
        return $id;
    });
//
    Route::get('/archiveGame/{id}', [
        'uses' => 'PredictionController@archiveGame',
        'as' => '/archiveGame',
    ]);

    Route::get('/unarchiveGame/{id}', [
        'uses' => 'PredictionController@unarchiveGame',
        'as' => '/archiveGame',
    ]);

    Route::get('/trashSlide/{id}', function ($id) {
        $slide = Slider::where('id', $id)->first();
        unlink('images/slider/' . $slide->path);
        Slider::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashMunch/{id}', function ($id) {
        $slide = Shot::where('id', $id)->first();
        unlink('images/munch/' . $slide->path);
        Shot::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashAdmin/{id}', function ($id) {
        \App\System::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashUser/{id}', function ($id) {
        \App\User::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashText/{id}', function ($id) {
        Textslider::where('id', $id)->delete();
        return $id;
    });

    Route::get('/trashFeed/{id}', function ($id) {
        Feedback::where('id', $id)->delete();
        return $id;
    });

    Route::get('/publishFeed/{id}', function ($id) {
        Feedback::where('id', $id)->update(['approve' => '1']);
        return $id;
    });

    Route::get('/unpublishFeed/{id}', function ($id) {
        Feedback::where('id', $id)->update(['approve' => '0']);
        return $id;
    });

    Route::post('/ajaxupdatepassword', [
        'uses' => 'GeneralController@ajaxUpdatePassword',
        'as' => 'ajaxupdatepassword',
    ]);

    Route::post('/ajaxupdatecontrol', [
        'uses' => 'GeneralController@ajaxUpdateControl',
        'as' => 'ajaxupdatecontrol',
    ]);

    Route::post('/ajaxuserinfo', [
        'uses' => 'UserController@ajaxUserInfoUpdate',
        'as' => 'ajaxuserinfo',
    ]);

    Route::post('/AddPhone', [
        'uses' => 'SMScontroller@ajaxUserInfoUpdate',
        'as' => 'AddPhone',
    ]);

    Route::post('/AddSmsPlan', [
        'uses' => 'SMScontroller@addsmsplans',
        'as' => 'AddSmsPlan',
    ]);

    // AddSmsPlan

    Route::post('/ajaxuserpassword', [
        'uses' => 'UserController@ajaxUserPasswordUpdate',
        'as' => 'ajaxuserpassword',
    ]);

    Route::post('/ajaxGameUpdate/{id?}/{dataIn?}', [
        'uses' => 'PredictionController@postGameUpdate',
        'as' => '/ajaxGameUpdate',
    ]);

    Route::post('/ajaxVIPGameUpdate/{id?}/{dataIn?}', [
        'uses' => 'PredictionController@postVIPGameUpdate',
        'as' => '/ajaxVIPGameUpdate',
    ]);

    Route::post('/ajaxBlogUpdate/{id?}/{image?}', [
        'uses' => 'BlogController@postBlogUpdate',
        'as' => '/ajaxBlogUpdate',
    ]);

    Route::post('/manageads', [
        'uses' => 'GeneralController@AdvertUpdate',
        'as' => 'manageads',
    ]);

    Route::post('/ajaxTestimonial', [
        'uses' => 'PredictionController@ajaxTestimonial',
        'as' => '/ajaxTestimonial',
    ]);

    Route::post('/ajaxotherft', [
        'uses' => 'GeneralController@ajaxOtherRec',
        'as' => 'ajaxotherft',
    ]);

    Route::post('/addResult', [
        'uses' => 'PredictionController@postAddResult',
        'as' => '/addResult',
    ]);

    Route::post('/ajaxusersetting', [
        'uses' => 'UserController@ajaxUserUpdate',
        'as' => 'updates',
    ]);

    Route::post('/acctupgrade', [
        'uses' => 'UserController@accountUpgrade',
        'as' => '/acctupgrade',
    ]);

    Route::post('/smsacctupgrade', [
        'uses' => 'SMScontroller@accountUpgrade',
        'as' => '/smsacctupgrade',
    ]);

    Route::post('/ajaxadminsetting', [
        'uses' => 'GeneralController@ajaxAdminUpdate',
        'as' => 'adminupdate',
    ]);

    Route::post('/ajaxnewadmin', [
        'uses' => 'GeneralController@ajaxNewAdmin',
        'as' => '/ajaxnewadmin',
    ]);

    Route::get('/ajaxgamedelete/{id?}/{finder?}', [
        'uses' => 'PredictionController@ajaxGameDelete',
        'as' => '/ajaxgamedelete',
    ]);

    Route::get('/ajaxblogdelete/{id?}', [
        'uses' => 'BlogController@ajaxBlogDelete',
        'as' => '/ajaxblogdelete',
    ]);

    Route::get('/adDelete/{id?}', [
        'uses' => 'GeneralController@ajaxAdsDelete',
        'as' => '/adDelete',
    ]);

    Route::post('/ajaxuserdelete', [
        'uses' => 'UserController@ajaxUserDelete',
        'as' => 'ajaxuserdelete',
    ]);

    Route::post('/demomail', [
        'uses' => 'GeneralController@sendDemo',
        'as' => 'demomail',
    ]);

    Route::post('/bulkMail', [
        'uses' => 'UserController@sendBulk',
        'as' => '/bulkMail',
    ]);

    Route::post('/bulkmailActive', [
        'uses' => 'UserController@bulkmailActive',
        'as' => 'bulkmailActive',
    ]);

    Route::post('/bulkmailExpired', [
        'uses' => 'UserController@bulkmailExpired',
        'as' => 'bulkmailExpired',
    ]);

    Route::post('/individualMail', [
        'uses' => 'UserController@individualMailer',
        'as' => 'individualMail',
    ]);

    Route::post('/planUpdater', [
        'uses' => 'GeneralController@planUpdater',
        'as' => 'planUpdater',
    ]);

    Route::post('/smsplanUpdater', [
        'uses' => 'SMScontroller@planUpdater',
        'as' => 'smsplanUpdater',
    ]);

    Route::get('/DeleteSmsPlan/{id?}', [
        'uses' => 'SMScontroller@deleteplan',
        'as' => 'DeleteSmsPlan',
    ]);
    Route::post('/newTextRotate', [
        'uses' => 'GeneralController@newTextRotate',
        'as' => '/newTextRotate',
    ]);

    Route::post('/bonusSubscribed', [
        'uses' => 'UserController@postBonusSubscribed',
        'as' => '/bonusSubscribed',
        'middleware' => 'auth',
    ]);

    Route::post('/bonusLapsed', [
        'uses' => 'UserController@postBonusLapsed',
        'as' => '/bonusLapsed',
        'middleware' => 'auth',
    ]);

    Route::post('/archiveMass', [
        'uses' => 'GeneralController@postArchiveMass',
        'as' => '/archiveMass',
        'middleware' => 'auth',
    ]);

    Route::match(['get', 'post'], '/promotions', [
        'uses' => 'PromotionController@getPromotion',
        'as' => '/promotions',
        'middleware' => 'auth',
    ]);

    Route::get('/createPromotion', function () {
        return view('createPromotion');
    })->name('/createPromotion');

    Route::get('/editPromotion/{id?}', [
        'uses' => 'PromotionController@editPromotion',
        'middleware' => 'auth',
    ])->name('/editPromotion');

    Route::get('/deletePromotion/{id?}', [
        'uses' => 'PromotionController@trashPromotion',
        'middleware' => 'auth',
    ])->name('/deletePromotion');

    Route::get('/viewProm/{id?}', [
        'uses' => 'PromotionController@viewProm',
        'middleware' => 'auth',
    ])->name('/viewProm');

    Route::get('/activeGameStat/{value?}', [
        'uses' => 'GeneralController@activeGameStatus',
        'middleware' => 'auth',
    ])->name('/activeGameStat');

});

//$end = date('d-m-Y',strtotime('+1 year'));
//echo "$end<br>";
//
//$t = strtotime('25 June 2016');
//
//$d = date('r', $t);
//$s = substr($d, 0, 3);
//echo "$s";
//
//Route::post('/ajaxeventdelete', function (){
//    if(Request::ajax()){
//        return Response::json(Request::all());
//    }
//});
